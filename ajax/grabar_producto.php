<?php

require '../conf/confconexion.php';
 $id=$_POST['IdUsuario'];
 $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
 $desci=$_POST['descripcion_txt'];
 $categori=$_POST['categoria_txt'];

$stock=$_POST['stock_txt'];

  $compra=$_POST['talla_txt'];

 $venta=$_POST['venta_txt'];

  $codido=$_POST['color_txt'];
 $fecha=date('Y-m-d h:i:s');



//insert
if($id==0){
    $sql="insert into tb_productos(color,descripcion,stock,talla,precioventa,id_categorias,fecha_registro) values('$codido','$desci','$stock','$compra','$venta','$categori','$fecha');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_productos where id_productos=$id_p";
    }else{
  
        if($id>0){
        $sql="update tb_productos set descripcion='$desci', id_categorias='$categori', talla='$compra',precioventa='$venta',stock='$stock',color='$codido' where id_productos=$id";
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
