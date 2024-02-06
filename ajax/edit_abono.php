<?php

require '../conf/confconexion.php';
 $valor=$_POST['valor'];
 $id_p=$_POST['id'];

 if($id_p>0){

   $sql="UPDATE ventas SET abono='$valor' WHERE id_factura=$id_p";
 }
 
 $result =mysqli_query($objConexion,$sql);

 if($result){
     echo "<script>
     Swal.fire(
           'Actulizado !',
           'Actualizado existosamente .',
           'success'
         )
     </script>";
 }