<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();
  $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];
//$idrolUsuar=$_SESSION['idRolUsuari'];

    $sql = "SELECT * FROM tb_clientes;"; 
    $result = mysqli_query($objConexion, $sql);
 
//  if($idrolUsuario==2){
//     $sql = "SELECT * FROM tb_estudiantes where cedula=$cedulaUsuar;"; 
//     $result = mysqli_query($objConexion, $sql);
   
//  }

//     $sql = "SELECT nombres_apellidos,cedula,correo,telefono,id_carreras,id_cursos,id_paralelos,id_jornadas,direccion,estado
//FROM tb_estudiantes WHERE cedula=$idrolUsuar"; 
//    
//
//echo $idrolUsuar;

// $result = mysqli_query($objConexion, $sql);

 


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

   
            <!--<div class="dataTables_scroll">-->
            
            <div class="table-responsive">
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%" >
        <thead class="thead-dark">
            <tr >
               <th >ID</th>
                <th >Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
            
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        
        
         <tbody>
					<?php 
                                        
                                       while ($fila = mysqli_fetch_array($result)){
                                                  
                                         
                                            
                                        if($fila['estado'] == '1'){
                                            $estado = "ACTIVO";
                                               $class = ' badge badge-success';
                                       }elseif ($fila['estado'] == '0') {
   

                                               $estado = "INACTIVO";
                                                 $class = " badge badge-warning";    
                                               }
                                                
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
                                                    <td><?php echo $fila['id_clientes']?></td>
							<td><?php echo $fila['nombres_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['cedula']; ?></td>
                                                        <td><?php echo $fila['telefono']; ?></td>
                                                        <td><?php echo $fila['correo']; ?></td>
                                                      
                                               
                                      
                                                         <td><?php echo $fila['direccion']; ?></td>
                                                        <!--<td><?php echo $fila['fecha_registro']; ?></td>-->
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							
                                                        <td> <?php 
                                                        // if($idrolUsuario==1||$idrolUsuario==2){
                                                            
                                                       
                                                        ?>
                                                         <button  class='btn btn-info' title='Editar Cliente' onclick="editarCliente(<?php echo $fila['id_clientes']?>)"><i class="icon-pencil"></i></button>
                                                            <?php 
                                                        //    }
                                                           if($idrolUsuario==1){
                                                               
                                                          
                                                            ?>
                                                            <button  class='btn btn-danger' title='Eliminar Cliente' onclick="eliminarCliente(<?php echo $fila['id_clientes']?>)"><i class="icon-trash"></i></button>
                                                       <?php 
                                                    
                                                    }
                                                    ?>
                                                                 
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php  
                                             
                                      }
                                          ?>
				</tbody>
                                <tfoot>
            <tr>
                 <th >ID</th>
                <th>Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
               
               
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
<!--                <th>Salary</th>-->
            </tr>
        </tfoot>
        
    </table>
            </div>  
       
        
        
    </body>
</html>


