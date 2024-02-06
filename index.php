
<?php
//validación de que la sesión esté activa
$alert = '';
   session_start();
if(!empty($_SESSION['activa'])){
        header('location: header.php');
   }   

require "./ajax/viiew_empresa.php";
require_once "conf/confconexion.php";
$usuario = mysqli_query($objConexion,"select count(*) as cantidad from tb_usuario");
$nu=mysqli_fetch_array($usuario);
$nuusuario=$nu['cantidad'];

$producto = mysqli_query($objConexion,"select count(*) as cantidad from tb_productos");
$pro=mysqli_fetch_array($producto);
$nuproducto=$pro['cantidad'];


$cliente = mysqli_query($objConexion,"select count(*) as cantidad from tb_clientes");
$cli=mysqli_fetch_array($cliente);
$nucliente=$cli['cantidad'];

$ventas = mysqli_query($objConexion,"select count(*) as cantidad from ventas");
$ven=mysqli_fetch_array($ventas);
$nuventas=$ven['cantidad'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Inicio | <?php echo $nombre ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/<?php echo $icon; ?>">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
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
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"> <i class="fas fa fa-user"></i> Usuarios </div>
                                    <div class="stat-digit"> <i class=""></i><?php echo $nuusuario ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"> <i
                                class="fas fa fa-truck"></i> Prendas</div>
                                    <div class="stat-digit"> <i class=""></i><?php echo $nuproducto ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"><i class="fas fa fa-users"></i> Cliente</div>
                                    <div class="stat-digit"> <i class=""></i> <?php echo $nucliente ?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"> <i
                                class="fas fa fa-shopping-cart"></i> ventas</div>
                                    <div class="stat-digit"> <i class=""></i><?php echo $nuventas?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> <i class="fas fa fa-chart-line"></i> Prendas mas vendidas</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-8">
                                        <canvas id="votos"></canva>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                </div>
                <div class="row">
                  
                    
                 
             
                </div>
                <div class="row">
                   
                  
                   
                   
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


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


    <script src="./js/dashboard/dashboard-1.js"></script>
<script>


$(document).ready(function() {
    listar('ajax/json_grafico.php');
});

function listar(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(datos) {
            // Procesar los datos recibidos
            const nombres = datos.map(function(dato) {
                return dato.nombre;
            });

            const cantidades = datos.map(function(dato) {
                return dato.cantidad;
            });

            // Actualizar el gráfico con los datos procesados
            const ctx = document.getElementById('votos');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: nombres, // Utilizar los nombres como etiquetas en el eje x
                    datasets: [{
                        label: 'Cantidad',
                        data: cantidades, // Utilizar las cantidades como datos en el eje y
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}



</script>
</body>

</html>