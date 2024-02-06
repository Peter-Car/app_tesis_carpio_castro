<?php 
require './conf/confconexion.php';

$mepres= mysqli_query($objConexion,"select * from tb_configuracion");
$resul= mysqli_fetch_array($mepres);
 $nombre=$resul['nombre'];
 $icon=$resul['icono'];
 $logo =$resul['logo'];
