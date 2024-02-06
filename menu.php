<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa fa-table"></i><span class="nav-text">Dashboard</span></a>
                        <ul aria-expanded="false">
                            <li><a href="index.php">Dashboard </a></li>
                            <!-- <li><a href="./index2.html">Dashboard 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Usuario & Cliente</li>
                    <?php 
                    if(  $idrolUsuario==1){
                    ?>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Usuarios</span></a>
                        <ul aria-expanded="false">
                            <li><a href="usuario.php">Usuario</a></li>
                           
                             
                            </li>
                           
                            <!-- <li><a href="./app-calender.html">Calendar</a></li> -->
                        </ul>
                    </li>
                    <?php }?>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa fa-user"></i><span class="nav-text">Clientes</span></a>
                        <ul aria-expanded="false">
                        <li><a href="cliente.php" >cliente</a>
                           
                        </ul>
                    </li>
                    <li class="nav-label">Components</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa fa-truck"></i><span class="nav-text">Prendas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="product.php">Prendas</a></li>
                          

                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas  fa fa-tags"></i><span class="nav-text">categoria</span></a>
                        <ul aria-expanded="false">
                            <li><a href="category.php">categorias</a></li>
                       
                        </ul>
                    </li>
                    <li><a href="ventas.php" aria-expanded="false"><i class="fas fa fa-shopping-cart"></i><span
                                class="nav-text">ventas</span></a></li>
                    <li class="nav-label">Forms</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">ventas realizadas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="ventas_realizadas.php">ventas realizadas</a></li>
                            <li><a href="ventas_rango.php">ventas fechas</a></li>
                            <!-- <li><a href="./form-editor-summernote.html">Summernote</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li> -->
                        </ul>
                    </li>
                    <?php 
                    if($idrolUsuario==1){
                    ?>
                    <li class="nav-label">empresa</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">empresa</span></a>
                        <ul aria-expanded="false">
                            <li><a href="empresa.php">empresa</a></li>
                      
                        </ul>
                    </li>
                    <?php }?>
<!-- 
                    <li class="nav-label">Extra</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>


        </div>