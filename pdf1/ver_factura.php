<?php

	# Incluyendo librerias necesarias #
	require "./code128.php";
	include("../conf/confconexion.php");
	$id_factura= intval($_GET['id_factura']);
	$sql_count=mysqli_query($objConexion,"select * from ventas where id_factura='".$id_factura."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Factura no encontrada')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_factura=mysqli_query($objConexion,"select * from ventas where id_factura='".$id_factura."'");
	$rw_factura=mysqli_fetch_array($sql_factura);
	$numero_factura=$rw_factura['numero_factura'];
	$id_cliente=$rw_factura['id_clientes'];
	$id_vendedor=$rw_factura['id_usuario'];
	$fecha_factura=$rw_factura['fecha_factura'];
	$condiciones=$rw_factura['condiciones'];
	$codigo_venta=$rw_factura['codigo_venta'];	

	$pdf = new PDF_Code128('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$query = mysqli_query($objConexion,"select * from tb_configuracion");
	$datos =mysqli_fetch_array($query);
	$logo =$datos['logo'];
	$pdf->Image('../img/'.$logo,147,20,55,30,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Arial','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper($datos['nombre'])),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RUC: 0000000000"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Direccion:".$datos['direccion']),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Teléfono:".$datos['telefono']),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,utf8_decode("Email:".$datos['correo']),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("d/m/Y", strtotime($fecha_factura))." ".date("h:s A")),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("Factura Nro.")),0,0,'C');

	$pdf->Ln(7);
	$sql_user=mysqli_query($objConexion,"select * from tb_usuario where id_usuario='$id_vendedor'");
	$rw_user=mysqli_fetch_array($sql_user);
	 $rw_user['nombre'];
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(18,7,utf8_decode("Vendedor :"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,utf8_decode($rw_user['nombre']),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(29,7,utf8_decode(strtoupper($numero_factura)),0,0,'C');

	$pdf->Ln(10);
	if ($condiciones==1){
		$estdo ="pagado";
	}
	elseif ($condiciones==2){
		$estdo ="pendiente";
	}
	$query=mysqli_query($objConexion,'select *from tb_configuracion');
	$iva=mysqli_fetch_array($query);
	 $sql_cliente=mysqli_query($objConexion,"select * from tb_clientes where id_clientes='$id_cliente'");
	$rw_cliente=mysqli_fetch_array($sql_cliente);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,utf8_decode("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($rw_cliente['nombres_apellidos']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Doc: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode("CD:".$rw_cliente['cedula']),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($rw_cliente['telefono']),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,utf8_decode("Dir:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($rw_cliente['direccion']),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Cell(30,7,utf8_decode("Forma de pago: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(40,7,utf8_decode($estdo),0,0,'L');
	$pdf->SetTextColor(39,39,51);


	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('Arial','',9);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(90,8,utf8_decode("Descripción"),1,0,'C',true);
	$pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
	$pdf->Cell(35,8,utf8_decode("Precio"),1,0,'C',true);
	// $pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(41,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);

	$nums=1;
$sumador_total=0;
$sql=mysqli_query($objConexion, "select * from tb_productos, detalle_venta, ventas where tb_productos.id_productos=detalle_venta.id_productos and detalle_venta.numero_factura=ventas.numero_factura and ventas.id_factura='".$id_factura."'");

while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["id_productos"];
	$codigo_producto=$row['codigo'];
	$cantidad=$row['cantidad'];
	$nombre_producto=$row['descripcion'];
	
	$precio_venta=$row['precio_venta'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(90,7,utf8_decode($nombre_producto),'L',0,'C');
	$pdf->Cell(15,7,utf8_decode($cantidad),'L',0,'C');
	$pdf->Cell(35,7,utf8_decode("$".$precio_venta_f." USD"),'L',0,'C');
	// $pdf->Cell(19,7,utf8_decode("$0.00 USD"),'L',0,'C');
	$pdf->Cell(41,7,utf8_decode("$".$precio_total_f." USD"),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/
		
	
		
		$nums++;
		}

		$subtotal=number_format($sumador_total,2,'.','');
		$total_iva=($subtotal *  $iva['iva'])/100;
		$total_iva=number_format($total_iva,2,'.','');
		$total_factura=$subtotal+$total_iva;

	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("+ $".number_format($subtotal,2)." USD"),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("IVA". ($iva['iva']."%")),'',0,'C');
	$pdf->Cell(34,7,utf8_decode("+ $".number_format($total_iva,2)." USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(15,7,utf8_decode(''),'',0,'C');


	$pdf->Cell(32,7,utf8_decode("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("$".number_format($total_factura,2)."USD"),'T',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("TOTAL PAGADO"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$100.00 USD"),'',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("CAMBIO"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$30.00 USD"),'',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("USTED AHORRA"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$0.00 USD"),'',0,'C');

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);


	# Codigo de barras #
	$pdf->SetFillColor(39,39,51);
	$pdf->SetDrawColor(23,83,201);
	$pdf->Code128(72,$pdf->GetY(),$codigo_venta,70,20);
	$pdf->SetXY(12,$pdf->GetY()+21);
	$pdf->SetFont('Arial','',12);
	$pdf->MultiCell(0,5,utf8_decode($codigo_venta),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I","Factura_Nro_".$numero_factura.".pdf",true);