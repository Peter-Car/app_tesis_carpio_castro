<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Registrar Prenda";
     $color='#404d55';
}
if($id>0){
     $color='#828690';
    $titulo="Editar Prenda";
    $sql="select * from tb_productos where id_productos=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $descripcion=$usuarioA['descripcion'];
             $codigo=$usuarioA['color'];
              $talla=$usuarioA['talla'];
               $venta=$usuarioA['precioventa'];
                $stock=$usuarioA['stock'];
                 $categorias=$usuarioA['id_categorias'];
               
              
            
     
          
             
           
             
          
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_estudiante').bind("submit", function (){
          var data = $(this).serialize(); 
        //alert(123);
       $.ajax({
           type: 'Post',
           url:'ajax/grabar_producto.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_producto.php');
           }
       }); 
       return false;
    });
});

 


</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background:<?php echo$color ?>;">
                
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='icon-pencil'></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante" >
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">Nombre</label>
                       
                        <input id="Nombres" name="descripcion_txt" class="form-control" value="<?php echo $descripcion; ?>" required placeholder="ingresa la descripcion "/>
                        </div>
                    </div>
                     <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Jornada" class="col-control-label font-weight-bold Negrita">Categoria</label>
                     
                         <select class="form-control" id="jornadas" name="categoria_txt" required>
                               <option value="">Selecionar......................</option>
                            <?php
                                $sql_jornadas="select * from tb_categorias;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['descripcion'];
                                    $idJornadas=$jornadasA['id_categorias'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$categorias){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                    </div> 
                    <div class="row">
                   <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">stock</label>
                       
                        <input id="fecha" type="number" name="stock_txt" class="form-control" value="<?php echo $stock; ?>" required placeholder="ingresa la cantidad" />
                        </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Talla</label>
                       
                        <input id="fecha" type="text" name="talla_txt" class="form-control" value="<?php echo $talla; ?>" required placeholder="talla"/>
                        </div>
                    </div>
                        </div>
                    <div class="row">
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">precio venta</label>
                       
                        <input id="fecha" type="text" name="venta_txt" class="form-control" value="<?php echo $venta; ?>" required placeholder="precio de venta " />
                        </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">color</label>
                       
                        <input id="fecha" type="text" name="color_txt" class="form-control" value="<?php echo $codigo; ?>" required placeholder="color " />
                        </div>
                    </div>
                        </div>
                  
    
                  
                   
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info" id="guardar_estudiante"><i class="icon-"></i> Guardar prenda</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>


