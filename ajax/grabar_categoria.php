<?php

require '../conf/confconexion.php';
 $id=$_POST['Idcategorias'];
  $id_hora=$_POST['hora_txt'];
  $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];

  $descrip=$_POST['descripcion_txt'];
   $estado=$_POST['Estado_txt'];
  


//insert
if($id==0){
  $sql="insert into tb_categorias(descripcion,estado) values('$descrip','$estado');";
}
if($mensaje=='eliminar'){
      $sql="delete from tb_categorias where id_categorias=$id_p";
  }else{
  if($id>0){
      $sql="update tb_categorias set descripcion='$descrip',estado='$estado' where id_categorias=$id";
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
