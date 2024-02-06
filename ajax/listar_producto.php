<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_productos;";
$result = mysqli_query($objConexion, $sql);
session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
?>
<html>
    <head>
        <meta charset="UTF-8">
      

    </head>
    
    <script>
   $(document).ready(function() {    
    $('#tablaListar').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
    </script>
    <body>
         <?php 
             if($idrolUsuario==1 ||$idrolUsuario==2){
         ?>
     
     <div class="table-responsive">
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">       
        

        <thead class="thead-dark">
            <tr>
               
            <th>ID</th>
            <th>Color</th>
                <th>Descripcion</th>
                 <th>Talla</th>
                  <th>Stock</th>
               
                    <th>precio venta</th>
                     <th>Categoria</th>
                      <th>fecha</th>
                   
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              
            <th>ID</th>
            <th>Color</th>
                <th>Descripcion</th>
                 <th>Talla</th>
                  <th>Stock</th>
               
                    <th>precio venta</th>
                     <th>Categoria</th>
                      <th>fecha</th>
                   
                       <th>Opc</th>
                
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = mysqli_fetch_array($result)) { 
                                            
                                                                 
                                        if($fila['stock']>=20){
                                            
                                               $class = ' badge badge-success';
                                       }elseif ($fila['stock']<=10) {
   

                                              
                                                 $class = " badge badge-danger";    
                                               }   else{
                                                $class = " badge badge-warning"; 
                                               }    
                                            
                                            
                                            ?>
                                                       
						<tr>
							
							<td><?php echo $fila['id_productos']; ?></td>
                            <td><?php echo $fila['color']; ?></td>
                                                        <td><?php echo $fila['descripcion']; ?></td>
                                                     
                                                        
                                                        <td><?php echo $fila['talla']; ?></td>
                                                        <td><span class="label label-<?php echo $class; ?>"><?php echo $fila['stock']; ?></span></td>
                                                       
                                                      
                                                        <td><?php echo $fila['precioventa']; ?></td>
                                                     
                                                        <?php 
                                                        $idjornada=$fila['id_categorias'];
                                                        $sql_jornada="select * from tb_categorias where id_categorias=$idjornada";
                                                        $resulta= mysqli_query($objConexion, $sql_jornada);
                                                        $jornadd= mysqli_fetch_array($resulta);
                                                        $nombrejornada=$jornadd['descripcion'];
                                                        ?>
                                                        <td><?php echo   $nombrejornada; ?></td>
                                                        <td><?php echo $fila['fecha_registro']; ?></td>
                                                        
                                                        <td> <button  class='btn btn-info' title='Editar Prenda' onclick="editarCurso(<?php echo $fila['id_productos']?>)"><i class="icon-pencil"></i></button>
                                                           <?php 
                                                           if($idrolUsuario==1){
                                                           ?>
                                                            <button  class='btn btn-danger' title='Eliminar Prenda' onclick="eliminarCurso(<?php echo $fila['id_productos']?>)"><i class="fas fa fa-solid fa-trash"></i></button>
                                                       <?php
                                                    } ?>
                                                                    
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
    </div>
      <?php }?>   
    </body>
</html>




