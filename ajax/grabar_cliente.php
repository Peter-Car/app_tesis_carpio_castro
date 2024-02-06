<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Apellidos_txt'];
$Cedula=$_POST['Cedula_txt'];
$Telefono=$_POST['Telefono_txt'];
$Correo=$_POST['Correo_txt'];


$Direccion=$_POST['Direccion_txt'];
$Fecha_registro=date('Y-m-d');
$Estado=$_POST['Estado_txt'];

if($id==0){
$sqles="SELECT * FROM tb_clientes where cedula ='$Cedula' limit 1";
$res=mysqli_query($objConexion,$sqles);
if(mysqli_num_rows($res)>0){
    echo "<div class='alert alert-danger' rol='alert'>El Cliente ya esta registrado</div>";
    return;
}else{


//insert
if($id==0){
   
    
    $sql="insert into tb_clientes(nombres_apellidos,cedula,telefono,correo,direccion,fecha_registro,estado) values('$NombresApellidos','$Cedula','$Telefono','$Correo','$Direccion','$Fecha_registro','$Estado');";
}
}
}
if($mensaje=='eliminar'){
        $sql="delete from tb_clientes where id_clientes=$id_p";
    }else{
    if($id>0){
        $sql="update tb_clientes set nombres_apellidos='$NombresApellidos', cedula='$Cedula',correo='$Correo',telefono='$Telefono',direccion='$Direccion',fecha_registro='$Fecha_registro',estado='$Estado' where id_clientes=$id";
    }
}
//ejecuto
$result=mysqli_query($objConexion,$sql);
if($result){
    if($mensaje=='eliminar'){
       ?> 
<script>
Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    }else{
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
