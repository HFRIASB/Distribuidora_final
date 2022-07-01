<?php
session_start();
if(!isset($_SESSION['S_IDUSUARIO'])){
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="plantilla/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="plantilla/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="plantilla/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="plantilla/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="plantilla/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <link rel="stylesheet" href="Plantilla/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/b-html5-2.0.1/r-2.2.9/sl-1.3.3/datatables.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

 
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                 <br>
                <br>
                <a class="brand-link" href="index.php">
                
                <img src="plantilla/assets/img/logotipo.png">
                
                </a>
                <br>
                <br>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                   
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="plantilla/assets/img/admin-avatar.png" />
                            <span></span><label for="" id="usu_sidebar"></label><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" onclick="cargar_contenido('contenido_principal','usuario/vista_profile.php')"><i class="fa fa-user"></i>Perfil</a>
                            <!--<a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>-->
                            <!-- <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a>-->
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="../controlador/usuario/controlador_cerrar_session.php"><i class="fa fa-power-off"></i>Salir</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="plantilla/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><label for="" id="usu_sidebar"></label></div><small id="rol_sidebar"></small>
                    </div>
                </div>
                    
                <ul class="side-menu metismenu"><!-- END HEADER-->
                    <li>
                        <a href="index.php"><i class="sidebar-item-icon ti-stats-up"></i>
                            <span class="nav-label">Dashboard</span><i class="fa fa-angle-left arrow"></i></a>
                            
                           <!-- <ul class="nav-2-level collapse in" aria-expanded="false" style="">
                                 <li>
                                    <a href="colors.html">Clientes</a>
                                </li>
                            
                            </ul>-->
                     </li>
                   
                     <?php if($_SESSION['S_ROL']=='1'){ ?>
                        <li class="heading">MENU ADMINISTRADOR</li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','rol/vista_mantenimiento_rol.php');"><i class="sidebar-item-icon ti-menu-alt"></i>
                                <span class="nav-label">Rol</span><i class="fa fa-angle-left arrow"></i></a>
                        
                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','persona/vista_mantenimiento_persona.php');"><i class="sidebar-item-icon ti-id-badge"></i>
                                <span class="nav-label">Persona</span><i class="fa fa-angle-left arrow"></i></a>
                        
                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','usuario/vista_mantenimiento_usuario.php');"><i class="sidebar-item-icon fa fa-users"></i>
                                <span class="nav-label">Usuario</span><i class="fa fa-angle-left arrow"></i></a>
                        
                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','categoria/vista_mantenimiento_categoria.php');"><i class="sidebar-item-icon fa fa-cubes"></i>
                                <span class="nav-label">Categoria</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','unidadmedida/vista_mantenimiento_unidadmedida.php');"><i class="sidebar-item-icon ti-ruler"></i>
                                <span class="nav-label">Unidad de Medida</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','producto/vista_mantenimiento_producto.php');"><i class="sidebar-item-icon ti-shopping-cart"></i>
                                <span class="nav-label">Productos</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','cliente/vista_mantenimiento_cliente.php');"><i class="sidebar-item-icon ti-id-badge"></i>
                                <span class="nav-label">Cliente</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','proveedor/vista_mantenimiento_proveedor.php');"><i class="sidebar-item-icon ti-id-badge"></i>
                                <span class="nav-label">Proveedor</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','ingreso/vista_mantenimiento_ingreso.php');"><i class="sidebar-item-icon ti-import"></i>
                                <span class="nav-label">Ingreso</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','venta/vista_mantenimiento_venta.php');"><i class="sidebar-item-icon ti-money"></i>
                                <span class="nav-label">Ventas</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                    <?php } ?>
                    <?php if($_SESSION['S_ROL']=='2'){ ?>
                        <li class="heading">MENU VENDEDOR</li>        
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','cliente/vista_mantenimiento_cliente.php');"><i class="sidebar-item-icon ti-id-badge"></i>
                                <span class="nav-label">Cliente</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>
                        <li>
                            <a href="javascript:cargar_contenido('contenido_principal','venta/vista_mantenimiento_venta.php');"><i class="sidebar-item-icon ti-money"></i>
                                <span class="nav-label">Ventas</span><i class="fa fa-angle-left arrow"></i></a>

                        </li>

                    <?php } ?>

                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <input type="text" value="<?php echo $_SESSION['S_IDUSUARIO'];?>"id="txt_codigo_principal" hidden>
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">
                <div id="contenido_principal">
                    <div class="row">
                        <!-- DASH FECHA INI-->
                        <div class="col-5">
                            <label for=""><b>Fecha Inicio</b></label>
                            <input type="date" id="txt_finicio_d" class="form-control"><br>
                        </div>
                        <div class="col-5">
                            <label for=""><b>Fecha Fin</b></label>
                            <input type="date" id="txt_ffin_d" class="form-control"><br>
                        </div>    
                        <div class="col-2">
                            <label for="">&nbsp;</label><br>
                            <button class="btn btn-success" style="width:100%" onclick="TraerWidgets()"><i class="fa fa-search"></i>Buscar</button><br>
                        </div> 
                        <!-- DASH FECHA FIN-->

                    </div>
                    
                    <div class="row" id="div_widget">
                    
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ibox">
                                <canvas id="myChartVentaTop5"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ibox">
                                <canvas id="myChartIngresoTop5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
                <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN THEME CONFIG PANEL-->
    <div class="theme-config">
        <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
        <div class="theme-config-box">
            <div class="text-center font-18 m-b-20">SETTINGS</div>
            <div class="font-strong">LAYOUT OPTIONS</div>
            <div class="check-list m-b-20 m-t-10">
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedNavbar" type="checkbox" checked>
                    <span class="input-span"></span>Fixed navbar</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input id="_fixedlayout" type="checkbox">
                    <span class="input-span"></span>Fixed layout</label>
                <label class="ui-checkbox ui-checkbox-gray">
                    <input class="js-sidebar-toggler" type="checkbox">
                    <span class="input-span"></span>Collapse sidebar</label>
            </div>
            <div class="font-strong">LAYOUT STYLE</div>
            <div class="m-t-10">
                <label class="ui-radio ui-radio-gray m-r-10">
                    <input type="radio" name="layout-style" value="" checked="">
                    <span class="input-span"></span>Fluid</label>
                <label class="ui-radio ui-radio-gray">
                    <input type="radio" name="layout-style" value="1">
                    <span class="input-span"></span>Boxed</label>
            </div>
            <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
            <div class="d-flex m-b-20">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
                    <label>
                        <input type="radio" name="setting-theme" value="default" checked="">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-white"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
                    <label>
                        <input type="radio" name="setting-theme" value="blue">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
                    <label>
                        <input type="radio" name="setting-theme" value="green">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
                    <label>
                        <input type="radio" name="setting-theme" value="purple">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
                    <label>
                        <input type="radio" name="setting-theme" value="orange">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
                    <label>
                        <input type="radio" name="setting-theme" value="pink">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-ebony"></div>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
                    <label>
                        <input type="radio" name="setting-theme" value="white">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
                    <label>
                        <input type="radio" name="setting-theme" value="blue-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-blue"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
                    <label>
                        <input type="radio" name="setting-theme" value="green-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-green"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
                    <label>
                        <input type="radio" name="setting-theme" value="purple-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-purple"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
                    <label>
                        <input type="radio" name="setting-theme" value="orange-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-orange"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
                <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
                    <label>
                        <input type="radio" name="setting-theme" value="pink-light">
                        <span class="color-check-icon"><i class="fa fa-check"></i></span>
                        <div class="color bg-pink"></div>
                        <div class="color-small bg-silver-100"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- END THEME CONFIG PANEL-->
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS-->
    <script src="plantilla/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="plantilla/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="plantilla/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="plantilla/assets/js/app.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
   

    <script src="plantilla/sweetalert2/sweetalert2.js" type="text/javascript"></script>
    <script src="plantilla/select2/select2.min.js" type="text/javascript"></script>
    <script src="../js/console_usuario.js" type="text/javascript"></script>

    
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.0.1/b-html5-2.0.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        TraerDatosUsuario();
        function cargar_contenido(contenedor,contenido){
            $("#"+contenedor).load(contenido);
        }

        var idioma_espanol = {
            select: {
                rows: "%d fila seleccionada"
            },
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ning&uacute;n dato disponible en esta tabla",
            "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
            "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "<b>No se encontraron datos</b>",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

        function sololetras(e) {
            key = e.keyCode || e.which;

            teclado = String.fromCharCode(key).toLowerCase();

            letras = "qwertyuiopasdfghjklñzxcvbnm ";

            especiales = "8-37-38-46-164";

            teclado_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true;
                    break;
                }
            }

            if (letras.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
        }


        function soloNumeros(e) {
            tecla = (document.all) ? e.keyCode : e.which;
            if (tecla == 8) {
                return true;
            }
            // Patron de entrada, en este caso solo acepta numeros
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }

        function filterFloat(evt,input){
            var key = window.Event ? evt.which : evt.keyCode;
            var chark = String.fromCharCode(key);
            var tempValue = input.value+chark;
            if(key >= 48 && key <= 57){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
            }else{
                if(key == 8 || key == 13 || key == 0) {
                    return true;
                }else if(key == 46){
                        if(filter(tempValue)=== false){
                            return false;
                        }else{
                            return true;
                        }
                }else{
                    return false;
                }
            }
        }
        function filter(__val__){
            var preg = /^([0-9]+\.?[0-9]{0,2})$/;
            if(preg.test(__val__) === true){
                return true;
            }else{
                return false;
            }
        }
        
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            var f = new Date();
            var anio = f.getFullYear();
            var mes = f.getMonth()+1;
            var d = f.getDate();
            if(d<10){
                d='0'+d;
            }
            if(mes<10){
                mes='0'+mes;
            }
            document.getElementById('txt_finicio_d').value=anio+"-"+mes+"-"+d;
            document.getElementById('txt_ffin_d').value=anio+"-"+mes+"-"+d;
            TraerWidgets();
        });

    </script>
</body>

</html>