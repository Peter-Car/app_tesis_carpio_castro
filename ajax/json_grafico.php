<?php
// connect to database
require '../conf/confconexion.php';

// Do Prepared Query
$query = mysqli_query($objConexion, "SELECT pr.descripcion AS nombre , SUM(vd.cantidad) AS cantidad FROM tb_productos pr, detalle_venta vd
WHERE pr.id_productos = vd.id_productos GROUP BY descripcion;");
// Do a quick fetchall on the results
$list = array();
while ($list=mysqli_fetch_array($query)){
	$data[] = array('nombre' => $list['nombre'], 'cantidad' => $list['cantidad']);
}
// return the result in json
echo json_encode($data);
?>