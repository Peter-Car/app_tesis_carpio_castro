<?php
require "./ajax/viiew_empresa.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ventas | <?php echo $nombre ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/<?php echo $icon; ?>">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
    
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include "header.php"; ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include "menu.php";?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Gestion ventas </h4>
                        
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel</a></li>
                            <li class="breadcrumb-item active"><a href="product.php">ventas</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header bg-primary text-center">
                                <h4 class="text-center " style="color: #fff;">Detalles ventas y cliente </h4>

                             
                            </div>
                            <div class="card-body">
                            <form action="" method="post" id="datos_factura">  
                                 <div class="row">
                                    
                                    <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">cliente</label>
                        
                        <select class="cliente form-control" name="cliente" id="id_cliente" required>
						<option value="">Selecciona el cliente</option>
					</select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">telefono</label>
                        
                            <input   id="telefono" readonly name="telefono" class="form-control"  name="Nombres_Apellidos_txt"  value="" required placeholder="telefono"/>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">Correo</label>
                        
                            <input type="email"   id="email" readonly name="email" class="form-control"  name="Nombres_Apellidos_txt"  value="" required placeholder="correo" />
                        </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">direccion</label>
                        
                            <input  type="text" id="direccion" readonly name="direccion" class="form-control"  name="Nombres_Apellidos_txt"  value="" required placeholder="direccion"  />
                        </div>
                    </div>
                    <!-- <h4><strong>Teléfono: </strong><span id="telefono"></span></h4> -->
<!--                
                <div class="col-lg-6 col-md-6 col-sm-6">
            
                    <h4><strong>Fecha: </strong> <?php echo date("d/m/Y");?></h4>
				
                  
                </div> -->
           
                          
                            <br>

                            </div> 
                         
                            <div class="row">
                            <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">vendedor</label>
                        
                           <select name="vendedor" class="form-control"  id="id_vendedor">
                               <option value="<?php echo $idUsuario ?>"><?php echo $nombre ?></option>
                           </select>
                        </div>


                        </div>
                        <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">fecha venta</label>
                        
                          <input type="datetime" name="fecha" id="fecha" class="form-control" readonly value="<?php echo date('Y-m-d h:i:s') ?>">
                        </div>


                        </div>
                        <div class="col-lg-3">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">tipo venta</label>
                        
                           <select name="pagos" class="form-control"  id="condiciones">
                               <option value="1">Vendido</option>
                               <option value="2">Alquilado</option>
                           </select>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <label for=""></label>
                        <div class="form-group">
                        <button type="submit" class="btn btn-info" id="datos_factura"><i class="fa fa-print"></i> Guardar venta </button>
                    </div>    
                </div>
                    </div>
                  
         
                    </form>
                    <br>
                    <div class="card-header bg-primary">
                    <h4 class="text-center" style="color: #fff;">Detalles de prenda </h4>
                    </div>
                    <br>
                    <div class="row">
                <div class="col-3">
            <div class="form-group">
                <label for="">nombre Prenda</label>
                <select class="producto form-control" name="producto" id="id_producto" required>
						<option value="">Selecciona el prenda</option>
					</select>
            </div>
                </div>
                <div class="col-3">
            <div class="form-group">
                <label for="">Talla</label>
                <input type="text " id="talla" class="form-control" placeholder="talla" readonly>
            </div>
                </div>
                <div class="col-3">
            <div class="form-group">
                <label for="">Cantidad</label>
                <input type="text " class="form-control" id="cantidad" placeholder="0">
            </div>
                </div>
                <div class="col-3">
            <div class="form-group">
                <label for="">stock</label>
                <input type="text " id="stock" class="form-control" id="cantidad" placeholder="stock" readonly>
            </div>
                </div>
                <div class="col-3">
            <div class="form-group">
                <label for="">Precio</label>
                <input type="text " class="form-control" id="precio" placeholder="precio">
            </div>
                </div>
                <div class="col-3" style="display: none;" id="campoOcultoContainer">
            <div class="form-group">
                <label for="">Fecha DeVolucion</label>
                <input type="date" class="form-control" id="fecha_de" placeholder="fecha">
            </div>
                </div>
                <div class="col-3">
         
           <br>

             <button class="btn btn-primary" onclick="agregar();">Agregar prenda</button>
            
                </div>
                    </div>
            
                            </div>
                            <div class="col-12">
                            <div id="respuesta"> </div>
                            </div>
                        </div>
                    </div>
              
                </div>
              
                

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<div id="show"></div>

        <!--**********************************
            Footer start
        ***********************************-->
    <?php include "footer.php" ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="./js/plugins-init/datatables.init.js"></script>


    <!-- Vectormap -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="./vendor/select2/js/select2.full.min.js"></script>
    <script src="./js/plugins-init/select2-init.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    <script src="js/VentanaCentrada.js"></script>
    <!-- <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script> -->
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script>
$(document).ready(function() {
    $("#condiciones").change(function() {
      if ($(this).val() === "2") {
        $("#campoOcultoContainer").show();
      } else {
        $("#campoOcultoContainer").hide();
      }
    });
  });



$(document).ready(function() {
    $( ".cliente" ).select2({        
    ajax: {
        url: "ajax/clientes_json.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
}).on('change', function (e){
		var email = $('.cliente').select2('data')[0].email;
		var telefono = $('.cliente').select2('data')[0].telefono;
		var direccion = $('.cliente').select2('data')[0].direccion;
		$('#email').val(email);
		$('#telefono').val(telefono);
		$('#direccion').val(direccion);
})
});


$(document).ready(function() {
    $( ".producto" ).select2({        
    ajax: {
        url: "ajax/productos_json.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
}).on('change', function (e){
		var stock = $('.producto').select2('data')[0].stock;
		var talla = $('.producto').select2('data')[0].talla;
		var precioventa = $('.producto').select2('data')[0].precioventa;
		$('#stock').val(stock);
		$('#talla').val(talla);
		$('#precio').val(precioventa);
      
})
});

	function mostrar_items(){
		var parametros={"action":"ajax"};
		$.ajax({
			url:'ajax/items.php',
			data: parametros,
			 beforeSend: function(objeto){
			 $('.items').html('Cargando...');
		  },
			success:function(data){
				$(".items").html(data).fadeIn('slow');
		}
		})
	}
	



function agregar ()
		{
            var id=$('#id_producto').val();
			var precio_venta=$('#precio').val();
			var cantidad=$('#cantidad').val();
            var stock =$('#stock').val()
			//Inicia validacio
			//Fin validacion
			if(stock<=0){
                Swal.fire({
  icon: 'error',
  title: 'Stock en 0 por favor avastecer',
  text: 'Stock en 0',
  footer: ''
})
            }else{

          

			$.ajax({
        type: "POST",
        url: "ajax/agregar_venta.php",
        data: {
           id:id,
           precio_venta:precio_venta,
           cantidad:cantidad

        },
		 beforeSend: function(objeto){
			$("#respuesta").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#respuesta").html(datos);
		}
			});
		}
    }
		
	function eliminar (id)
		{
			
	$.ajax({
        type: "GET",
        url: "ajax/agregar_venta.php",
        data: {id:id
        },
		 beforeSend: function(objeto){
			$("#respuesta").html("Mensaje: Cargando...");
		  },
        success: function(data){
		$("#respuesta").html(data);
		}
			});

		}
    

        $("#datos_factura").submit(function(){
		  var id_cliente = $("#id_cliente").val();
		  var id_vendedor = $("#id_vendedor").val();
		  var condiciones = $("#condiciones").val();
          var abono = $("#descuento_input").val();
		  var fechade=$("#fecha_de").val();
		  if (id_cliente==""){
			  alert("Debes seleccionar un cliente");
			  $("#nombre_cliente").focus();
			  return false;
		  }
          VentanaCentrada('./pdf1/factura.php?id_cliente='+id_cliente+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones+'&abono='+abono+'&fecha='+fechade,'Factura','','1024','768','true');
	 	});

</script>

</body>

</html>
