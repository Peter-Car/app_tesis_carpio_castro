<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();

$idrolUsuario=$_SESSION['idRolUsuario_S'];
$sql = "SELECT * FROM tb_usuario;";
$result = mysqli_query($objConexion, $sql);
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
      
            
        //  if($idrolUsuario==1){

     
        
        ?>
       
        <div class="table-responsive">
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr >
                <th>ID</th>
                <th>Nombre</th>
                  <th>Usuario</th>
                <th>Correo</th>
                <th>Fecha</th>
                 <th>Tipo_usuario</th>
                <th>Estado</th>
                <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                 <th>Usuario</th>
                <th>Correo</th>
                <th>Fecha</th>
                 <th>Tipo_usuario</th>
                <th>Estado</th>
                <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = mysqli_fetch_array($result)) { 
                                            
                                            if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = ' badge badge-success';
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = " badge badge-warning";    
                                                    }
                                                     
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
							<td><?php echo $fila['id_usuario']; ?></td>
							<td><?php echo $fila['nombre']; ?></td>
                                <td><?php echo $fila['cedula']; ?></td>
							<td><?php echo $fila['correo']; ?></td>
                                                        <td><?php echo $fila['fecha']; ?></td>
                                                         <?php
                                                              $idcanton=$fila['id_tipo_usuario'];
                                                             $sqlCanton="select * from tb_tipo_usuario where id_tipo_usuario=$idcanton;";
                                                                $resultCanton= mysqli_query($objConexion, $sqlCanton);
                                                                    $CantonArray= mysqli_fetch_array($resultCanton);
                                                                    $NombreCanton=$CantonArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $NombreCanton?></td>
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							<td> <button  class='btn btn-info btnEditarUser' title='Editar Usuario' onclick="editarUsuario(<?php echo $fila['id_usuario']?>);" ><i class="icon-pencil"></i></button>
                            <button class='btn btn-danger btnEliminar' title='Eliminar Usuario' onclick="eliminarUsuario(<?php echo $fila['id_usuario']?>);" ><i class="icon-trash"></i></button>
                                                       
                                                            <button class='btn btn-primary' title='Cambiar Clave' onclick="cambiarclave(<?php echo $fila['id_usuario']?>)"><i class="icon-key"></i></button>
                                                        </td>
							<!--<td> </td>-->
                      
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
    </div>
         
<?php 
    // }
?>
      
      
    </body>
</html>
