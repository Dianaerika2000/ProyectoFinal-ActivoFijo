<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ACTIVO FIJO - INMUEBLE</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('UsuarioTemplate/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYG5g2aJ9TjMlbYk7E_VuFYKSvHC1Ee6Y&libraries=places" type="text/javascript"></script>

    <!-- Custom styles for this template-->
    <link href="{{ asset('UsuarioTemplate/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('UsuarioTemplate/vendor/bootstrap/scss/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('UsuarioTemplate/vendor/bootstrap/scss/bootstrap.css') }}" rel="stylesheet" type="text/css">
    {{-- toy aumentando este enlace --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/css/bootstrap.min.css" title="main">
    {{-- <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/superhero/bootstrap.min.css" title="main"> --}}
    {{-- importando los icono de fontawesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- <ul class="sidebar-nav" id="sidebar-nav"> --}}
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.menu')}}">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{asset('UsuarioTemplate/img/logoChico.png')}}">
                   
                </div>
                {{-- <div class="sidebar-brand-text mx-3">U.A.G.R.M</div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.menu') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Menu</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestiones
            </div>

            <!-- Nav Item - Pages Collapse Menu para yn menu colapse -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                   aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Adm. de Personal</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MODULO 1:</h6>

                            <a class="collapse-item" href="{{ route('admin.usuarios') }}">
                                <i class="fas fa-users"></i><span> Gestionar Usuarios</span>
                            </a>

                            <a class="collapse-item" href="{{ route('admin.responsable') }}">
                                <i class="fas fa-user"></i><span> Gestionar Responsables</span>
                            </a>

                            <a class="collapse-item" href="{{ route('admin.responsable') }}">
                                <i class="fas fa-unlock"></i><span> Gestionar Roles</span>
                            </a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Adm. de Inmuebles</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MODULO 2:</h6>

                            <a class="collapse-item" href="{{ route('admin.inmueble') }}">
                                <i class="fas fa-school" > </i>
                                <span> Gestionar Inmuebles</span></a>

                            <a class="collapse-item" href="{{ route('admin.grupo') }}">
                                <i class="fas fa-fw fa-tools"> </i>
                                <span> Gestionar Grupos</span></a>

                            <a class="collapse-item" href="{{ route('admin.estado') }}">
                                <i class="fas fa-book"></i>
                                <span> Gestionar Estados</span></a>

                            <a class="collapse-item" href="{{ route('admin.direccion') }}">
                                <i class="fas fa-file-invoice-dollar"></i>
                                <span> Gestionar Direcciones</span></a>

                            <a class="collapse-item" href="{{ route('admin.fotografia') }}">
                                <i class="fas fa-book"></i>
                                <span> Gestionar Fotografías</span></a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                   aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Adm. de Informes y reportes</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MODULO 3:</h6>

                        <a class="collapse-item" href="{{ route('admin.reevaluo') }}">
                            <i class="fas fa-book"></i>
                            <span> Gestionar Revaluos</span></a>


                        <a class="collapse-item" href="{{ route('admin.informe') }}">
                            <i class="fas fa-book"></i>
                            <span> Gestionar Informes</span></a>

                        <a class="collapse-item" href="{{ route('admin.informe') }}">
                            <i class="fas fa-book"></i>
                            <span> Reportes</span></a>
                    </div>
                </div>
            </li>


            <div class="darken-100"></div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#themes-nav"
                    aria-expanded="true" aria-controls="themes-nav">
                    <i class="bi bi-chevron-down ms-auto"></i>
                    <span>Color de fondo</span>
                </a>

                <ul id="themes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="css">
                            <i class="bi bi-circle"></i><span style="color: rgb(221, 228, 235)">Css</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="cosmo">
                            <i class="bi bi-circle"></i><span style="color: rgb(143, 192, 233)">Cosmo</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="lux">
                            <i class="bi bi-circle"></i><span style="color: rgb(121, 122, 122)">Lux</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="cyborg">
                            <i class="bi bi-circle"></i><span style="color: rgb(7, 7, 7)">Cyborg</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="darkly">
                            <i class="bi bi-circle"></i><span style="color: rgb(30, 30, 31)">Darkly</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item change-style-menu-item" href="#" rel="superhero">
                            <i class="bi bi-circle"></i><span style="color: rgb(47, 49, 51)">Superhero</span>
                        </a>
                    </li>
                </ul>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#themes-nav2">
                    <i class="bi bi-chevron-down ms-auto"></i>
                    <span>Apariencia texto</span>
                </a>
            </li>
            <ul id="themes-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <button class="btn btn-success" onclick="return textResizer(20);">
                        <i class="fas fa-child text-muted"></i> <span >Niños</span>
                    </button>
                </li>
                <li>
                     <button class="btn btn-warning" onclick="return textResizer2(20);">
                        <i class="fas fa-child text-muted"></i> <span >Jovenes</span>
                    </button>
                </li>
                <li>
                     <button class="btn btn-secondary" onclick="return textResizer3(20);">
                        <i class="fas fa-child text-muted"></i> <span >Adultos</span>
                    </button>
                </li>
            </ul>
            </li>

            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->
          {{--   <aside id="rightsidebar" class="right-sidebar">
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Temas</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                        <ul class="demo-choose-skin">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </aside> --}}
            <!-- #END# Right Sidebar -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- End of Sidebar -->


        </ul>

        <!-- End Icons Nav -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                   {{--  <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>            

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow" onmouseover="ver(1)" onmouseout="ocultar(1)">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nombre }}
                                    {{ auth()->user()->apellido }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('UsuarioTemplate/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" id="div1"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{route('admin.usuario.edit',auth()->user()->id)}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{auth()->user()->nombre}} {{auth()->user()->apellido}}
                                </a>
                                {{---------------------------------------------------}}

                                <a class="dropdown-item" href="{{route('admin.usuario.edit',auth()->user()->id)}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                {{---------------------------------------------------}}
{{--                                 <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ajustes
                                </a> --}}
                                {{-- <a class="dropdown-item" href="{{route('admin.usuarios')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('admin.logout') }}" method="POST"  onclick="return alertCerrarSeccion();">
                                    {{ csrf_field() }}
                                    <button class="dropdown-item" {{-- data-toggle="modal" data-target="#logoutModal" --}}>
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        cerrar sesion
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">
                            @yield('header') {{-- para poder mostrarlo aqui, todo lo que esta en el index.php --}}
                        </h1>

                       {{--  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
                    </div>
                    @yield('content')


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto ">
                        <span>Copyright &copy; ACTIVO-FIJO INMUEBLES UAGRM 2022</span>
                        <div class="version">
                            <b>Version: </b> 1.0.5
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('UsuarioTemplate/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('UsuarioTemplate/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('UsuarioTemplate/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('UsuarioTemplate/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('UsuarioTemplate/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('UsuarioTemplate/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('UsuarioTemplate/js/demo/chart-pie-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('UsuarioTemplate/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('UsuarioTemplate/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('UsuarioTemplate/js/demo/datatables-demo.js') }}"></script>

    {{-- As reference, here are our primary CDN links. --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

 {{-- para agregar el modal de eliminar --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script> --}}
    <script>
        function supports_html5_storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        var supports_storage = supports_html5_storage();

        function set_theme(theme) {
            $('link[title="main"]').attr('href', theme);
            if (supports_storage) {
                localStorage.theme = theme;
            }
        }
        $(document).ready(function() {
            $("#selector").change(function() {
                /*  $("body").toggleClass("bg-primary"); */
                alert("has presinado el buton");
            });
        });
        jQuery(function($) {
            $('body').on('click', '.change-style-menu-item', function() {
                var theme_name = $(this).attr('rel');
                var theme = "//cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/" + theme_name +
                    "/bootstrap.min.css";
                set_theme(theme);
            });
        });
        jQuery(function($) {
            $('body').on('click', '.change-style-menu-item2', function() {
                var texto_size = $(this).attr('rel');
                if (texto_size == 'sketchy') {
                    $("body").toggleClass("bg-primary");
                    $("body").toggleClass("text-success");
                    $("body").toggleClass("text-lg");
                    $(".navbar-nav").toggleClass("bg-primary");
                }
            });
        });
        if (supports_storage) {
            var theme = localStorage.theme;
            if (theme) {
                set_theme(theme);
            }
        } else {
            /* Don't annoy user with options that don't persist */
            $('#theme-dropdown').hide();
        }
    </script>

</body>
<script>
/*funcion para cambiar el tamaño de los texto*/
        function textResizer(num){
        var font=parseInt(num);
        $("body,table").toggleClass("text-success");
        $("body,table").toggleClass("text-lg");
        $("body,table").toggleClass("table-danger");
        $("form").toggleClass("bg bg-success");
        $("input,select").toggleClass("text-warning");
       /* document.getElementsByTagName('div').style.fontSize=font+"px";*/
       
        }

        function textResizer2(num){
        var font=parseInt(num);
        $("body,table").toggleClass("fs-1 text");
         $("body,table,form,input,select").toggleClass("font-italic");
       /* document.getElementsByTagName('div').style.fontSize=font+"px";*/
       
        }

        function textResizer3(num){
        var font=parseInt(num);
        $("body,table,form,input,select").toggleClass("font-weight-bold");
       /* document.getElementsByTagName('div').style.fontSize=font+"px";*/
       
        }
            function alertCerrarSeccion(){
        return confirm(
            ["desea cerrar sesión?"],
       )
    }

   /*  {{-- script para hover login --}} */
    function ver(n) {
        document.getElementById("div" + n).style.display = "block";
    }

    function ocultar(n) {
        document.getElementById("div" + n).style.display = "none";
    }
</script>



</html>
