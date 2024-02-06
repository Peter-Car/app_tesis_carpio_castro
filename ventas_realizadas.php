
<?php
require "./ajax/viiew_empresa.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ventas Realiza | <?php echo $nombre ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/<?php echo $icon; ?>">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
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
                            <h4>Gestion ventas</h4>
                        
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel</a></li>
                            <li class="breadcrumb-item active"><a href="ventas.php">ventas</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nuevo Cliente</h4>

                                <a class="btn btn-primary" href="ventas.php" ><i class="icon-plus"></i> Agregar venta</a>
                            </div>
                            <div class="card-body">
                               <div id="resultados"></div>
                               <div id="presentarTabla"></div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="./vendor/sweetalert2/dist/sweetalert2.min.js"></script> -->
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="js/VentanaCentrada.js"></script>
    <script>
$(document).ready(function(){
    listar('ajax/listar_venta.php');
    //prueba();
});
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}


function editAbono(id){
 Swal.fire({
    title: 'Ingresa el total de abono ',
    input: 'text', // Tipo de campo de entrada
    inputPlaceholder: 'Escribe un valor',
    showCancelButton: true,
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Aceptar',
    inputValidator: (value) => {
      if (!value) {
        return 'Debes ingresar una valor';
      }
    }
  }).then((result) => {
    if (result.isConfirmed) {
      // Valor ingresado por el usuario
      const inputValue = result.value;

      // Realiza una solicitud AJAX para enviar el valor
      $.ajax({
        type: 'POST',
        url: 'ajax/edit_abono.php', // Reemplaza con tu URL de destino
        data: { valor: inputValue,
              id:id
        },
        success: function(response) {
          // Maneja la respuesta de la solicitud AJAX aquí
        //   Swal.fire(`Ingresaste: ${inputValue} (Respuesta del servidor: ${response})`);
        $('#resultados').html(response);
          listar('ajax/listar_venta.php');
        },
        error: function() {
          Swal.fire('Ocurrió un error al enviar el valor');
        }
      });
    }
  });





}
function eliminar(id){
  
  Swal.fire({
    title: '¿Está seguro eliminar esta venta ?',
    text: " se borrara definivamente  "+id,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type:'POST',
        url:'ajax/graba_venta.php',
        data:{
          id_p:id,
          mensaje:'eliminar'
        },
        success: function(data){
          $('#resultados').html(data);
          listar('ajax/listar_venta.php');
        }
      });
    }
  });
}
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}


function ticket(id_tiket){
    VentanaCentrada('./pdf1/ticket.php?id_factura='+id_tiket,'Factura','','1024','768','true');
}






</script>

</body>

</html>