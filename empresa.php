<?php 
require 'conf/confconexion.php';
$empres= mysqli_query($objConexion,"select * from tb_configuracion");
$resu=mysqli_fetch_array($empres);
$imagen=$resu['logo'];
$icon=$resu['icono'];
$nombree=$resu['nombre'];
$dirrecion= $resu['direccion'];
$correo=$resu['correo'];
$telefono=$resu['telefono'];
$iva=$resu['iva'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Empresa | <?php echo $nombree ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/<?php echo $icon?>">
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
                            <h4>Gestion Empresa</h4>
                        
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel</a></li>
                            <li class="breadcrumb-item active"><a href="empresa.php">Emprresa</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Datos empresa</h4>

                              
                            </div>
                            <div class="card-body">
                                <form action="" method="post" id="empresa">
                                <div class="row">
                              <div class="form-group col-sm-6">

                              <label for="">nombre</label>
                             <input type="text" class="form-control"  name="nombre"placeholder="ingrese el nombre " value="<?php echo $nombree ?>">
                              </div>

                                        <div class="form-group col-sm-6">

                                <label for="">Telefono</label>
                                <input type="number" class="form-control" placeholder="ingrese el teleno " name="telefono" value="<?php echo $telefono ?>">
                                </div>
                                </div>
                                <div class="row">
                              <div class="form-group col-sm-4">

                              <label for="">direccion</label>
                             <input type="text" class="form-control"  name="direccion"placeholder="ingrese la dirrecion " value="<?php echo $dirrecion  ?>">
                              </div>

                                        <div class="form-group col-sm-4">

                                <label for="">Correo</label>
                                <input type="email" class="form-control" placeholder="ingrese el correo " value="<?php echo $correo ?>" name="correo">
                                </div>
                                <div class="form-group col-sm-4">

<label for="">impuesto</label>
<input type="number" class="form-control" placeholder="ingrese el iva " name="iva" value="<?php echo $iva ?>">
</div>
                                </div>
                                <div class="row">
  <div class="form-group col-sm-6">
    <label for="imagen">imagen</label>
    <div class="container mt-5">
      <div class="card" style="width: 200px;">
       
         
        
          <img id="preview-img" src="img/<?php echo $imagen ?>" class="card-img-top" alt="Vista previa de imagen">
     
        <div class="card-body">
          <h5 class="card-title">Subir imagen</h5>
          <label for="image-upload-img" class="btn btn-primary">Seleccionar imagen</label>
          <input type="file" name="Logo" id="image-upload-img" class="d-none" onchange="previewImg(event)">
        </div>
      </div>
    </div>
  </div>
  <div class="form-group col-sm-6">
    <label for="icono">icono</label>
    <div class="container mt-5">
      <div class="card" style="width: 200px;">
        
          
       
          <img id="preview" src="img/<?php echo $icon ?>" class="card-img-top" alt="Vista previa de imagen">
       
        <div class="card-body">
          <h5 class="card-title">Subir imagen</h5>
          <label for="image-upload-icon" class="btn btn-primary">Seleccionar imagen</label>
          <input type="file" name="Imagen" id="image-upload-icon" class="d-none" onchange="ojo(event);">
        </div>
      </div>
    </div>
  </div>
</div>
<button type="submit"  id="empresa"class="btn btn-primary ">guardar datos</button>

</form>

                            </div>
                        </div>
                    </div>
              
                </div>
              
                

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<div id="mensaje"></div>

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
    <script>


function previewImg(even) {
      var reader = new FileReader();
      reader.onload = function() {
        var preview = document.getElementById('preview-img');
        preview.src = reader.result;
      };
      reader.readAsDataURL(even.target.files[0]);
    }


    function ojo(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var preview = document.getElementById('preview');
        preview.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }


    $(document).ready(function(){
    // capturar el valor del id que se recibe
  
     $('#empresa').bind("submit", function (){
        var data = $(this).serialize(); 
        //alert(123);
       $.ajax({
           type: 'Post',
           url:'ajax/actualizar_empresa.php',

            data:new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,
           success: function (data){
               $("#mensaje").html(data);
            //    listar('ajax/listar_Candidato.php');
           }
       }); 
       return false;
    });
});

</script>

</body>

</html>
