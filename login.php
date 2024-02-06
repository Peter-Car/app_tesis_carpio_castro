
<?php
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();
require "./ajax/viiew_empresa.php";
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login |  <?php echo $nombre ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/<?php echo $icon; ?>">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="h-100">
<style>
/* CSS personalizado para el botón minimalista */
.btn-minimalist {
    background-color: transparent;
    border: 1px solid #fff;
    color: #fff;
    transition: transform 0.2s, background-color 0.2s; /* Agregamos una transición de color de fondo */
}

.btn-minimalist:hover {
    transform: scale(1.1);
    background-color: #fff; /* Cambia el fondo al pasar el cursor */
    color: #000; /* Cambia el color de texto al pasar el cursor */
    border-color: #000; /* Cambia el color del borde al pasar el cursor */
}

</style>

    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center ">
                <div class="col-md-4 ">
                    <div class="authincation-content bg-black">
                    <div class="row no-gutters">
    <div class="col-xl-12">
        <div class="auth-form bg-dark text-white"> <!-- Agregamos la clase bg-dark para el fondo negro y text-white para el texto blanco -->
            <!-- <h4 class="text-center mb-4">Inicio sesion</h4> -->
            <div class="text-center">
                <img src="img/<?php echo $logo ?>" class="img-fluid" height="50px" width="150px" alt="" srcset="">
            </div>
            <br>
            <div id="mensaje"></div>
            <form method="post" id="envia_login">
                <div class="form-group">
                    <label><strong ><i class="fas fa fa-users"></i> Usuario</strong></label>
                    <input type="text" class="form-control" name="usuario_p" placeholder="ingrese su usuario" required>
                </div>
                <div class="form-group">
                    <label><strong><i class="fas fa fa-key"></i> Contraseña</strong></label>
                    <input type="password" name="clave_p" class="form-control " placeholder="contraseña" required>
                </div>
                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <div class="form-group">
                        <div class="form-check ml-2">
                            <!-- <input class="form-check-input" type="checkbox" id="basic_checkbox_1"> -->
                            <!-- <label class="form-check-label" for="basic_checkbox_1">Remember me</label> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <a href="page-forgot-password.html">Forgot Password?</a> -->
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" id="envia_login" class="btn btn-primary btn-block btn-minimalist">  <i class="fas fa fa-sign-in"></i> Iniciar sesión</button>
                </div>

            </form>
            <div class="new-account mt-3">
                <!-- <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p> -->
            </div>
        </div>
    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    <script>
 $(document).ready(function(){
  $('#envia_login').bind("submit", function (){
    Swal.fire({
      title: 'Verificando usuario....',
      icon: 'question',
      html: 'en uno<b></b> milisegundos.',
      timer: 3000,
      timerProgressBar: true,
      showConfirmButton: false,
      didOpen: () => {
        Swal.showLoading();
        const b = Swal.getHtmlContainer().querySelector('b');
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft();
        }, 100);
      },
      willClose: () => {
        clearInterval(timerInterval);

        // Realizar la solicitud AJAX después de cerrar el mensaje de carga
        $.ajax({
          type: 'POST',
          url: 'ajax/verificalogin.php',
          data: $(this).serialize(),
          success: function (data){
            if(data == 1){
              window.location = 'index.php';
            }else{
              $('#mensaje').html(data);
            }
          }
        });
      }
    });

    return false;
  });
});
</script>
</body>

</html>