<?php
require '../conf/confconexion.php';
 $id=1;
$id_p=$_POST['id_p'];
 $NombresApellidos=$_POST['nombre'];
 $telefono=$_POST['telefono'];
 $direccion=$_POST['direccion'];
 $correo=$_POST['correo'];
$iva=$_POST['iva'];


 $logo=$_FILES['Logo']['name'];
 $imagen=$_FILES['Imagen']['name'];
$ruta=$_FILES['Logo']['tmp_name'];
$ruta2=$_FILES['Imagen']['tmp_name'];


$logo1=$_FILES["Logo"]["size"];
$imagen1=$_FILES["Imagen"]["size"];
if($logo1> 1048576|| $imagen1> 1048576){
    echo "<div class='alert alert-danger' rol='alert'>la imagen  es muy grande debe ser menor o igual a 1M </div>"; 
}else{
    if(!empty($_FILES['Logo']['tmp_name']) && file_exists($_FILES['Logo']['tmp_name']) ||!empty($_FILES['Imagen']['tmp_name']) && file_exists($_FILES['Imagen']['tmp_name']) ) {
     
        $destino='../img/'.$logo;
        $destino2='../img/'.$imagen;
     
      
        if ($ruta != null) {
            copy($ruta, $destino);
        }
        
        if ($ruta2 != null) {
            copy($ruta2, $destino2);
        }
        
   
       
   
    }



    if($id>0){
        if($imagen=="" && $logo==""){
            $sql="update tb_configuracion set nombre='$NombresApellidos', telefono='$telefono',direccion='$direccion',correo='$correo',iva='$iva'  where id_configuracion=$id";
 
        }elseif($imagen==""){
            $sql="update tb_configuracion set nombre='$NombresApellidos', telefono='$telefono',direccion='$direccion',correo='$correo',logo='$logo',iva='$iva'  where id_configuracion=$id";
        }elseif($logo=="") {
            $sql="update tb_configuracion set nombre='$NombresApellidos', telefono='$telefono',direccion='$direccion',correo='$correo', icono='$imagen',iva='$iva' where id_configuracion=$id";
        }else{
            $sql="update tb_configuracion set nombre='$NombresApellidos', telefono='$telefono',direccion='$direccion',correo='$correo',logo='$logo',icono='$imagen',iva='$iva'  where id_configuracion=$id"; 
        }
        
    }

//ejecuto
$result=mysqli_query($objConexion,$sql);
if($result){
 ?>

    <script>
Swal.fire(
      'Actulizado!',
      'Registro Actualizado Correctamente.',
      'success'
    )
</script>
    <?php 
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
}