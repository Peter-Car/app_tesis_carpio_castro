<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";
	include("../conf/confconexion.php");
	$sql_count=mysqli_query($objConexion,"select * from tmp ");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la factura')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$id_cliente=intval($_GET['id_cliente']);
	$id_vendedor=intval($_GET['id_vendedor']);
	$abono=$_GET['abono'];
	$fechapa=$_GET['fecha'];
	$condiciones=mysqli_real_escape_string($objConexion,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($objConexion, "select LAST_INSERT_ID(numero_factura) as last from ventas order by id_factura desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_factura=$rw['last']+1;	

	$codigo_venta="CODVE".$numero_factura;
	$pdf = new PDF_Code128('P','mm',array(80,258));
    $pdf->SetMargins(4,10,4);
    $pdf->AddPage();
    
	# Logo de la empresa formato png #
	$query = mysqli_query($objConexion,"select * from tb_configuracion");
	$datos =mysqli_fetch_array($query);
	$logo =$datos['logo'];
	$pdf->Image('../img/'.$logo, 30, 3, 25, 20,'PNG');
    $pdf->Ln(15);
	$pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(0,0,0);
    $pdf->MultiCell(0,5,utf8_decode(strtoupper($datos['nombre'])),0,'C',false);
    $pdf->SetFont('Arial','',9);
    $pdf->MultiCell(0,5,utf8_decode("RUC: 0000000000"),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Direccion:".$datos['direccion']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$datos['telefono']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Email: ".$datos['correo']),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,utf8_decode("Fecha: ".date("d/m/Y", strtotime(date('d-m-Y')))." ".date("h:s A")),0,'C',false);

	$sql_user=mysqli_query($objConexion,"select * from tb_usuario where id_usuario='$id_vendedor'");
	$rw_user=mysqli_fetch_array($sql_user);
	 $rw_user['nombre'];
	 $pdf->MultiCell(0,5,utf8_decode("Vendedor:". $rw_user['nombre']),0,'C',false);
	 $pdf->SetFont('Arial','B',10);
	 $pdf->MultiCell(0,5,utf8_decode(strtoupper("Ticket Nro: ".$numero_factura)),0,'C',false);
	 $pdf->SetFont('Arial','',9);
 
	 $pdf->Ln(1);
	 $pdf->Cell(0,5,utf8_decode("------------------------------------------------------"),0,0,'C');
	 $pdf->Ln(5);
 
	if ($condiciones==1){
		$fechapa =date('00:00:00');
	}
	
	
	$query=mysqli_query($objConexion,'select *from tb_configuracion');
	$iva=mysqli_fetch_array($query);
	 $sql_cliente=mysqli_query($objConexion,"select * from tb_clientes where id_clientes='$id_cliente'");
	$rw_cliente=mysqli_fetch_array($sql_cliente);

	$pdf->MultiCell(0,5,utf8_decode("Cliente: ".$rw_cliente['nombres_apellidos']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Cedula:".$rw_cliente['cedula']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Teléfono: ".$rw_cliente['telefono']),0,'C',false);
    $pdf->MultiCell(0,5,utf8_decode("Dirección: ".$rw_cliente['direccion']),0,'C',false);

    $pdf->Ln(1);
    $pdf->Cell(0,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);

    # Tabla de productos #
    $pdf->Cell(15,5,utf8_decode("Nomb."),0,0,'C');
    $pdf->Cell(10,5,utf8_decode("Cant."),0,0,'C');
    $pdf->Cell(19,5,utf8_decode("Precio"),0,0,'C');
    
    $pdf->Cell(28,5,utf8_decode("Total"),0,0,'C');

    $pdf->Ln(3);
    $pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
    $pdf->Ln(3);
	session_start();
	$session_id=session_id();
	$nums=1;
	$sumador_total=0;
	$sql=mysqli_query($objConexion, "select * from tb_productos, tmp where tb_productos.id_productos=tmp.id_productos and tmp.id_session='$session_id'");
	while ($row=mysqli_fetch_array($sql))
		{
		$id_tmp=$row["id_tmp"];
		$id_producto=$row["id_productos"];
		$codigo_producto=$row['codigo'];
		$cantidad=$row['cantidad_tmp'];
		$nombre_producto=$row['descripcion'];
		
		$precio_venta=$row['precio_tmp'];
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=$precio_venta_r*$cantidad;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador
	
	
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(19,4,utf8_decode($nombre_producto),0,0,'C');
    $pdf->Cell(10,4,utf8_decode($cantidad),0,0,'C');
    $pdf->Cell(19,4,utf8_decode("$".$precio_venta_f." USD"),0,0,'C');
    
    $pdf->Cell(28,4,utf8_decode("$".$precio_total_f." USD"),0,0,'C');
    $pdf->Ln(4);
            
	/*----------  Fin Detalles de la tabla  ----------*/
		
	
	
		//Insert en la tabla detalle_cotizacion
		$insert_detail=mysqli_query($objConexion, "INSERT INTO detalle_venta(numero_factura,id_productos,cantidad,precio_venta) VALUES ('$numero_factura','$id_producto','$cantidad','$precio_venta_r')");
		
		$nums++;
		}

		$pdf->Ln(7);
		/*----------  Fin Detalles de la tabla  ----------*/
	
	
	
		$pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
	
			$pdf->Ln(5);
			$subtotal=number_format($sumador_total,2,'.','');
			$total_iva=($subtotal *  $iva['iva'])/100;
			$total_iva=number_format($total_iva,2,'.','');
			$total_factura=$subtotal+$total_iva;

			$debe= $total_factura-$abono;
	
		# Impuestos & totales #
		$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		$pdf->Cell(22,5,utf8_decode("SUBTOTAL"),0,0,'C');
		$pdf->Cell(32,5,utf8_decode("+ $".number_format($subtotal,2)." USD"),0,0,'C');
	
		$pdf->Ln(5);
	
		$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		$pdf->Cell(22,5,utf8_decode("IVA ".($iva['iva']."%")),0,0,'C');
		$pdf->Cell(32,5,utf8_decode("+ $".number_format($total_iva,2)." USD"),0,0,'C');
	
		$pdf->Ln(5);
	
		$pdf->Cell(72,5,utf8_decode("-------------------------------------------------------------------"),0,0,'C');
	
		$pdf->Ln(5);
	
		$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		$pdf->Cell(22,5,utf8_decode("TOTAL A PAGAR"),0,0,'C');
		$pdf->Cell(32,5,utf8_decode("$".number_format($total_factura,2)."USD"),0,0,'C');
	
		$pdf->Ln(5);
		
		$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		$pdf->Cell(22,5,utf8_decode("ABONO"),0,0,'C');
		$pdf->Cell(32,5,utf8_decode("$ ".number_format($abono,2)."USD"),0,0,'C');
	
		$pdf->Ln(5);
	
		$pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		$pdf->Cell(22,5,utf8_decode("BEDE TOTAL"),0,0,'C');
		$pdf->Cell(32,5,utf8_decode("$ ".number_format($debe,2)."USD"),0,0,'C');
	
		// $pdf->Ln(5);
	
		// $pdf->Cell(18,5,utf8_decode(""),0,0,'C');
		// $pdf->Cell(22,5,utf8_decode("USTED AHORRA"),0,0,'C');
		// $pdf->Cell(32,5,utf8_decode("$0.00 USD"),0,0,'C');
	
		$pdf->Ln(10);
	
		// $pdf->MultiCell(0,5,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar este ticket ***"),0,'C',false);
	
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(0,7,utf8_decode("Gracias por su compra"),'',0,'C');
	
		$pdf->Ln(9);
	
	
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($objConexion,"INSERT INTO ventas (numero_factura,fecha_factura,id_clientes,id_usuario,condiciones,total_venta,estado_factura,codigo_venta,abono,fechadevolucion)VALUES ('$numero_factura','$date','$id_cliente','$id_vendedor','$condiciones','$total_factura','1','$codigo_venta','$abono','$fechapa')");
$delete=mysqli_query($objConexion,"DELETE FROM tmp WHERE tmp.id_session='$session_id'");

	# Codigo de barras #


	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_".$numero_factura.".pdf",true);