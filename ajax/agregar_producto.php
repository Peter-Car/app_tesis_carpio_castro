<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
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
	$condiciones=mysqli_real_escape_string($objConexion,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($objConexion, "select LAST_INSERT_ID(numero_factura) as last from ventas order by id_factura desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_factura=$rw['last']+1;	

	$codigo_venta="CODVE".$numero_factura;



	if ($condiciones==1){
		$estdo ="pagado";
	}
	elseif ($condiciones==2){
		$estdo ="pendiente";
	}
	$query=mysqli_query($objConexion,'select *from tb_configuracion');
	$iva=mysqli_fetch_array($query);

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

	
	
		//Insert en la tabla detalle_cotizacion
		$insert_detail=mysqli_query($objConexion, "INSERT INTO detalle_venta(numero_factura,id_productos,cantidad,precio_venta) VALUES ('$numero_factura','$id_producto','$cantidad','$precio_venta_r')");
		
		$nums++;
		}
        $subtotal=number_format($sumador_total,2,'.','');
		$total_iva=($subtotal *  $iva['iva'])/100;
		$total_iva=number_format($total_iva,2,'.','');
		$total_factura=$subtotal+$total_iva;

	
$date=date("Y-m-d H:i:s");
$insert=mysqli_query($objConexion,"INSERT INTO ventas (numero_factura,fecha_factura,id_clientes,id_usuario,condiciones,total_venta,estado_factura,codigo_venta)VALUES ('$numero_factura','$date','$id_cliente','$id_vendedor','$condiciones','$total_factura','1','$codigo_venta')");
$delete=mysqli_query($objConexion,"DELETE FROM tmp WHERE tmp.id_session='$session_id'");


