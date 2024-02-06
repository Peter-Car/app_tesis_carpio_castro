<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();

$idrolUsuario=$_SESSION['idRolUsuario_S'];
$sql = "SELECT * FROM ventas;";
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
      
            
         
        
        ?>
       
        <div class="table-responsive">
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead class="thead-dark">
            <tr >
                <th>N#Factura</th>
                <th>Fecha Factura</th>
             
                <th>Cliente</th>
                <th>Vendedor</th>
                 <th>Estado</th>
                 <th>Condicion</th>
                <th>Total ventas</th>
                <th>Abono pago </th>
                <th>Fecha entrega</th>
                <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
            <th>N#Factura</th>
                <th>Fecha Factura</th>
                 
                <th>Cliente</th>
                <th>Vendedor</th>
                 <th>Estado</th>
                 <th>Condicion</th>
                <th>Total ventas</th>
                <th>Abono pago </th>
                <th>Fecha entrega</th>
                <th>Opciones</th>
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = mysqli_fetch_array($result)) { 
                                            
                                            if($fila['total_venta'] == $fila['abono'] ){
                                                 $estado = "Pagado";
                                                    $class = ' badge badge-success';
                                            }else {
        
    
                                                    $estado = "Pendiente";
                                                      $class = " badge badge-warning";    
                                                    }
                                                     
                                                    if($fila['condiciones'] == '1' ){
                                                        $cond = "VENDIDO";
                                                           $clas = ' badge badge-info';
                                                   }else {
               
           
                                                           $cond = "ALQUILADO";
                                                             $clas = " badge badge-primary";    
                                                           }
                                            
                                            
                                            ?>
                                                       
						<tr>
							<td><?php echo $fila['id_factura']; ?></td>
							<td><?php echo $fila['fecha_factura']; ?></td>
                            <?php 
                            $id_cliente=$fila['id_clientes'];
                            $sqlCanton="select * from tb_clientes where id_clientes=$id_cliente;";
                            $resultCanton= mysqli_query($objConexion, $sqlCanton);
                                $CantonArray= mysqli_fetch_array($resultCanton);
                                $Nombre=$CantonArray['nombres_apellidos'];
                            ?>
                                <td><?php echo $Nombre; ?></td>
                              <?php 
                              $id_vendedor=$fila['id_usuario'];
                              $sqlCanto="select * from tb_usuario where id_usuario=$id_vendedor;";
                              $resultCanto= mysqli_query($objConexion, $sqlCanto);
                                  $CantoArray= mysqli_fetch_array($resultCanto);
                                  $Nombrevendor=$CantoArray['nombre'];
                              ?>

							<td><?php echo $Nombrevendor ?></td>
                            <td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
                            <td><span class="label label-<?php echo $clas; ?>"><?php echo $cond?></span></td>
                                                        <td><?php echo $fila['total_venta']; ?></td>
                                                        <td><?php echo $fila['abono']; ?></td>
                                                        <td><?php echo $fila['fechadevolucion']; ?></td>
                                                       
						
							<td> 
                            <?php 
                            if($idrolUsuario==1){
                            ?>    
                            <button  class='btn btn-danger ' title='eliminar' onclick="eliminar(<?php echo $fila['numero_factura']?>);"><i class="fas fa fa-solid fa-trash"></i></button>
                            <?php 
                            }
                            ?>
                            <button class='btn btn-primary ' title='imprimir' onclick="editAbono(<?php echo $fila['id_factura']?>);"><i class="icon-plus"></i></button>
                            <button class='btn btn-info ' title='ticket  ' onclick="ticket(<?php echo $fila['id_factura']?>);"><i class="fas fa  fa-print"></i></button>                     
                                                           
                                                        </td>
							<!--<td> </td>-->
                      
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
    </div>
         

      
      
    </body>
</html>





