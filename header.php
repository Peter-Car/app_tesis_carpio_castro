
         <?php 
     
       
     session_start();
         $idUsuario=$_SESSION['idusuario_S'];
         $nombre= $_SESSION['nombreUsuario_S'];
         require 'conf/confconexion.php';
          $idrolUsuario=$_SESSION['idRolUsuario_S'];
          if($idUsuario==''){
              //echo "Usted no ha iniciado sesión correctamente";
             header('Location: login.php');
             exit();  
           
         }
           
         $venta= mysqli_query($objConexion,"SELECT tb_clientes.nombres_apellidos,ventas.id_factura,ventas.fechadevolucion,ventas.total_venta,ventas.abono FROM ventas,tb_clientes
         WHERE ventas.id_clientes= tb_clientes.id_clientes; ");
    
$fechaactual=date('Y-m-d');

           
      ?> 
            <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <?php 
                $conf=mysqli_query($objConexion,"select * from tb_configuracion");
                $logo=mysqli_fetch_array($conf);
                ?>
                <img class="logo-abbr" src="./img/<?php echo $logo['icono'] ?>" alt="">
                <img class="logo-compact" src="./img/<?php echo $logo['icono'] ?>" alt="">
                <img class="brand-title" src="./img/<?php echo $logo['logo'] ?>" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    
                                <ul class="list-unstyled">
                                    <?php foreach($venta as $fila){
                                     if($fila['total_venta']!=$fila['abono'] && $fila['fechadevolucion']==$fechaactual){
                                    ?>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a target="_blank" href="pdf1/ticket.php?id_factura=<?php echo $fila['id_factura'] ?>">
                                                    <p><strong><?php  echo $fila['nombres_apellidos'];?></strong> no ah entregado <strong></strong> 
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time"><?php echo $fila['fechadevolucion']; ?> </span>
                                        </li>
                                        <?php
                                     }
                                    } ?>
                                       
                                       
                                       
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="salir.php" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>