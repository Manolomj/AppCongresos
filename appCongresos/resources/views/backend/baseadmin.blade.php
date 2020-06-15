<!DOCTYPE html>
<html lang="en">

<head>
	<base href="{{ url('backend/assets') }}/">
	{{-- 
	<base href="{{ url() }}/"> 
	--}}
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WebCongress - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="img/favicon.png" rel="icon">
  
  <style type="text/css">
    li .page-item:marker{
      display:none !important;
    }
  </style>
  <!--CSS datatables-->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" type="text/css" />-->
  <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" type="text/css" />-->
  <!--<link rel="stylesheet" href="" type="text/css" />-->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon rotate-n-15" style="color: #149ddd;">
          <!--<i class="fab fa-connectdevelop"></i>-->
          <i class="fas fa-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="margin-left: 7px !important;">Admin Area</div>
      </a>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ request()->routeIs('admin') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
          <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
          <i class="fab fa-houzz"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" style="margin: 0px 1rem 2rem;">

      <!-- Heading -->
      <div class="sidebar-heading">
        Panel de administración
      </div>

      {{--
      <!--USUARIOS AJAX-->
      <li class="nav-item {{ request()->routeIs('ajaxallUsers') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/ajaxallUsers') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Usuarios</span></a>
      </li>
      --}}
      
      <!--VISUALIZACIOND E USUARIOS NORMAL-->
      <li class="nav-item {{ request()->routeIs('allUsers') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/allUsers') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Usuarios</span></a>
      </li>
      
      
      {{--
      <li class="nav-item {{ request()->routeIs('aa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="far fa-fw fa-user"></i>
          <span>Suscriptores</span></a>
      </li>
      
      <li class="nav-item {{ request()->routeIs('aa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>Ponentes</span></a>
      </li>
      
      
      <li class="nav-item {{ request()->routeIs('aa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Comite</span></a>
      </li>
      --}}
      
      
      



      <!-- Nav Item - Utilities Collapse Menu -->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">-->
      <!--    <i class="fas fa-fw fa-wrench"></i>-->
      <!--    <span>Utilities</span>-->
      <!--  </a>-->
      <!--  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Custom Utilities:</h6>-->
      <!--      <a class="collapse-item" href="utilities-color.html">Colors</a>-->
      <!--      <a class="collapse-item" href="utilities-border.html">Borders</a>-->
      <!--      <a class="collapse-item" href="utilities-animation.html">Animations</a>-->
      <!--      <a class="collapse-item" href="utilities-other.html">Other</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
{{--
      <!-- Divider -->
      <hr class="sidebar-divider" style="margin: 1rem 1rem 2rem;">

      <!-- Heading -->
      <div class="sidebar-heading">
        Ponencias
      </div>
--}}
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ request()->routeIs('allPonencias') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/allPonencias') }}">
          <i class="fas fa-fw fa-bookmark"></i>
          <span>Ponencias</span></a>
      </li>
      
      <li class="nav-item {{ request()->routeIs('allPagos') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/allPagos') }}">
          <i class="fas fa-fw fa-euro-sign"></i>
          <span>Pagos</span></a>
      </li>
      
      
      
      
      <!-- Nav Item - Pages Collapse Menu -->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">-->
      <!--    <i class="fas fa-fw fa-folder"></i>-->
      <!--    <span>Ponencias</span>-->
      <!--  </a>-->
      <!--  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Administración</h6>-->
      <!--        <a class="collapse-item" href="login.html">Ver todas</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->

      <!-- Nav Item - Pages Collapse Menu -->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagos" aria-expanded="true" aria-controls="collapsePagos">-->
      <!--    <i class="fas fa-fw fa-folder"></i>-->
      <!--    <span>Pagos</span>-->
      <!--  </a>-->
      <!--  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
            <!--<h6 class="collapse-header">Administración</h6>-->
      <!--        <a class="collapse-item" href="login.html">Administración</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
      
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" style="margin: 16px 1rem 0px;">
      
      
      <li class="nav-item {{ request()->routeIs('aa') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="fas fa-share fa-flip-horizontal	"></i>
          <span>Volver a frontend</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

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

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <!--<li class="nav-item dropdown no-arrow mx-1">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-bell fa-fw"></i>-->
                <!-- Counter - Alerts -->
            <!--    <span class="badge badge-danger badge-counter">3+</span>-->
            <!--  </a>-->
              <!-- Dropdown - Alerts -->
            <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">-->
            <!--    <h6 class="dropdown-header">-->
            <!--      Alerts Center-->
            <!--    </h6>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-primary">-->
            <!--          <i class="fas fa-file-alt text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 12, 2019</div>-->
            <!--        <span class="font-weight-bold">A new monthly report is ready to download!</span>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-success">-->
            <!--          <i class="fas fa-donate text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 7, 2019</div>-->
            <!--        $290.29 has been deposited into your account!-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-warning">-->
            <!--          <i class="fas fa-exclamation-triangle text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 2, 2019</div>-->
            <!--        Spending Alert: We've noticed unusually high spending for your account.-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
            <!--  </div>-->
            <!--</li>-->

            <!-- Nav Item - Messages -->
            <!--<li class="nav-item dropdown no-arrow mx-1">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-envelope fa-fw"></i>-->
                <!-- Counter - Messages -->
            <!--    <span class="badge badge-danger badge-counter">7</span>-->
            <!--  </a>-->
              <!-- Dropdown - Messages -->
            <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">-->
            <!--    <h6 class="dropdown-header">-->
            <!--      Message Center-->
            <!--    </h6>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">-->
            <!--        <div class="status-indicator bg-success"></div>-->
            <!--      </div>-->
            <!--      <div class="font-weight-bold">-->
            <!--        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>-->
            <!--        <div class="small text-gray-500">Emily Fowler · 58m</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">-->
            <!--        <div class="status-indicator"></div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>-->
            <!--        <div class="small text-gray-500">Jae Chun · 1d</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">-->
            <!--        <div class="status-indicator bg-warning"></div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>-->
            <!--        <div class="small text-gray-500">Morgan Alvarez · 2d</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">-->
            <!--        <div class="status-indicator bg-success"></div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>-->
            <!--        <div class="small text-gray-500">Chicken the Dog · 2w</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>-->
            <!--  </div>-->
            <!--</li>-->

            <div class="topbar-divider d-none d-sm-block"></div>

{{--
        <!--<div class="profile">-->
        <!--  <img src="assets/img/profile-img.png" alt="" class="img-fluid rounded-circle">-->
        <!--  <h1 class="text-light">-->
        <!--    <a href="index.html">-->
        <!--      {{ Auth::user()->name }}-->
        <!--    </a>-->
        <!--  </h1>-->
        <!--</div>-->
    --}}  

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="img/profile-img.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        
        
        

        
        
        
        
        @yield('content')
        
        
        
        
        
        
        
        
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy; Copyright <strong><span style="color:#149ddd !important;">WebCongress</span></strong><br><br>Designed by <a href="#" style="color:#149ddd !important;">MJ designers</a></span>
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
          <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de querer salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecciona "Salir" si desea cerrar sesión.<br>En caso contrario haga click en "Cancelar".</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          
          @auth
            <form action="{{url('logout')}}" method="post" style="margin-bottom:0px!important;">
                @csrf
                <button type="submit" class="btn btn-primary">Salir</button>
            </form>
          @endauth
          
        </div>
      </div>
    </div>
  </div>


  <!--SCRIPT DATATABLES-->
  <!--<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>-->
  <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>-->
  <!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  
  <!--Mensaje de alerta-->
  <script src="{{url('frontback/borrarMensaje.js')}}"></script>


<script>
  $(document).on('click', 'button[type="button"]', function(event) {
       
      let id = this.id;
      
      let separador = '_separador_';
      
      let textoseparado = id.split(separador);
      
      let fraseSplit = textoseparado[1] + ' ' + textoseparado[2] + ' ' + textoseparado[3] + '' + textoseparado[4];
      
      let accionUsuario = textoseparado[0];
      
      let name_user = textoseparado[1];
      
      let id_user = textoseparado[4];
      id_user = id_user.toString();
      
      let type_user = textoseparado[5];
      
      let rutaEliminar = '{{ url("destroyUser") }}';
      let urlEliminar = rutaEliminar + '/' + id_user;
      
      let rutaEditar = '{{ url("editUser") }}';
      let urlEditar = rutaEditar + '/' + id_user;
      
      
      
      // Si es eliminar
      if(accionUsuario === 'eliminar'){
        
        $('#form').attr("action", urlEliminar);
        
        $('#aquivamifrase').text('Has seleccionado ha ' + fraseSplit);
        
      }else if(accionUsuario === 'editar'){
        
        $('#formEdit').attr("action", urlEditar);
        
        $('#aquivamifrase2').text('Has seleccionado ha ' + fraseSplit);
        
        $('#idusuv').attr('value', id_user);
        $('#idusu').attr('value', id_user);
        
        $('#nameusu').attr('value', name_user);
        
        // $('#typeusu').attr('value', type_user);
        $('#typeusu').val(type_user);
        
      }else if(accionUsuario === 'ponencia'){
        
        let accionPonencia = textoseparado[1];
        
        let id_ponencia = textoseparado[2];
        id_ponencia = id_ponencia.toString();
        
        let id_user_ponencia = textoseparado[3];
        id_user_ponencia = id_user_ponencia.toString();
        
        let tittle_ponencia = textoseparado[4];
        
        let url_ponencia = textoseparado[5];
        
        let fecha_ponencia = textoseparado[6];
        
        
        let rutaEliminarPonencia = '{{ url("destroyPonencia") }}';
        let urlEliminarPonencia = rutaEliminarPonencia + '/' + id_ponencia;
        
        let rutaEditarPonencia = '{{ url("editPonencia") }}';
        let urlEditarPonencia = rutaEditarPonencia + '/' + id_ponencia;
        
        
        let fraseEliminate = 'Has seleccionado la ponencia "' + tittle_ponencia  + '" con id: ' + id_ponencia;
        
        $('#aquivamifrasePEliminate').text(fraseEliminate);
        
        if(accionPonencia == 'eliminarPonencia'){
          
          $('#formPonenciasEliminate').attr("action", urlEliminarPonencia);
          
        }else if(accionPonencia == 'editarPonencia'){
          
          $('#formPonenciasEditate').attr("action", urlEditarPonencia);

          $('#idponv').attr('value', id_ponencia);
          $('#idpon').attr('value', id_ponencia);
          $('#idponusu').attr('value', id_user_ponencia);
          $('#namepon').attr('value', tittle_ponencia);
          $('#urlpon').attr('value', url_ponencia);
          $('#fechapon').attr('value', fecha_ponencia);
        }
        
      }else if(accionUsuario === 'pago'){
        
        
        let nameusu = textoseparado[1];
        
        let idusu = textoseparado[2];
        idusu = idusu.toString();
        
        let tipousu = textoseparado[3];
        
        let pagousu = textoseparado[4];
        
        
        let frasePago = 'Has seleccionado al usuario "' + nameusu  + '" con id: ' + idusu + '<br>(1 = Pagado,  0 = No pagado)';
        
        $('#aquivamifrasePago').html(frasePago);
        
        $('#pagousu').attr('value', pagousu);
        
        $('#idusu').attr('value', idusu);
        
        // let rutaEditarPago = '{{ url("editPago") }}';
        // let urlEditarPago = rutaEditarPago + '/' + idusu;
        
        // $('#formPago').attr("action", urlEditarPago);
      } 
      
      
    });
</script>

{{--


      let atributeHref = "{{ action('UsersController@destroyUser',";
      // let atributeHref = '{{ action('UsersController@destroyUser',' + id_user + ') }}';
      // let atributeHref = '{{ action('UsersController@destroyUser',' + id_user + ') }}';
      //     // let desf = {{ + dest + }};
  <!--<script>-->
  <!--  $(document).ready( function () {-->
  <!--    $('#users').DataTable();-->
  <!--    searching: true;-->
  <!--  } );-->
  <!--</script>-->
--}}

@yield('script')

</body>

</html>