<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestión de Auditorías</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- <link href="css/jquery.ui.css" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <link rel="stylesheet" href="css/jquery-ui.min.css">

  <link rel="stylesheet" type="text/css" href="js/simpleGantt/frappe_theme.css"/>
  <!--<link rel="stylesheet" href="css/gra/schwartz.css">-->
	
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="js/sb-admin-2.min.js"></script>

  <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript" src="js/simpleGantt/moment.min.js"></script>
  <script type="text/javascript" src="js/simpleGantt/snap.svg-min.js"></script>
  <script type="text/javascript" src="js/simpleGantt/frappe-gantt.min.js?v=2.1"></script>


</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!----------- Sidebar, MENU DE LA IZQUIERDA, PARA MODIFICAR, Y COLORES -------->


    
	                 <!-- bg-gradient-success-->
    <ul class="navbar-nav bg-verde sidebar sidebar-dark accordion font-weight-bold " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="sistema.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GADSI</div>
      </a>
		
      <!-- Divider -->
      <hr class="sidebar-divider my-0 mb-3">
		
 


	  <div class="user-panel">
        <div class="text-left image">
           <img src="img/profiles/f1.png" class="rounded-circle" alt="user image" class="offline" width="70"></td>
			<span class="ml-2 mr-2 d-none d-lg-inline text-white">Administrador</span>
			
			<div class="text-center">
			<!--<a href="#"> -->
				<a class="text-white my-0"><i class="fa fa-circle text-success text-right"></i> Online</a>
				<!-- </a>	-->
			</div>
        </div>
      </div>
		
		
      <!-- Divider -->
      <hr class="sidebar-divider my-1">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active font-weight-bold ">
        <a class="nav-link" href="sistema.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tablero</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menú
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog font-weight-bold"></i>
          <span>Usuarios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Usuarios </h6>



                <!-----------------EN ESTA AREA SE MODIFICO EL ACCESO A LA PAG USUARIO------------  -->


            <a class="collapse-item" href="sistema.php?pag=usu">Agregar Usuarios</a>
            <!--<a class="collapse-item" href="sistema.php?pag=verusu">Ver Usuarios</a>-->
			       <!--<a class="collapse-item" href="sistema.php?pag=per">Permisos</a>-->
            <!-- <a class="collapse-item" href="cards.php">Cards</a> -->
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Iniciar Auditoría</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones de Registro:</h6>



          <!--------------------------EN ESTA AREA SE MODIFICARON LOS ACCESOS A LAS PAGINAS------------  -->



			<a class="collapse-item" href="sistema.php?pag=emp">1.Empresas</a>
			<a class="collapse-item" href="sistema.php?pag=audi">2.Auditorías</a>
			<a class="collapse-item" href="sistema.php?pag=act">3.Activos</a>
			<a class="collapse-item" href="sistema.php?pag=ame">4.Amenazas</a>
            <!--<a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a> -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Complementos
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Informes</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Documentación:</h6>
			 <a class="collapse-item fa fa-archive" href="sistema.php?pag=my"> Mis Archivos</a>
			 <!--<a class="collapse-item fa fa-globe" href="sistema.php?pag=sha"> Compartidos conmigo</a>-->
			 <a class="collapse-item fa fa-folder" href="sistema.php?pag=fol"> Nueva Carpeta</a>
			 <a class="collapse-item fa fa-upload" href="sistema.php?pag=fil"> Nuevo Archivo</a>
       <a class="collapse-item fa fa-upload" href="sistema.php?pag=fia"> Informe de Auditoría</a>
            
          </div>
        </div>
      </li> 
		
		
		<!-- se pueden colocar cosas aca -->
		
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRiesgos" aria-expanded="true" aria-controls="collapseRiesgos">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Riesgos</span>
        </a>
        <div id="collapseRiesgos" class="collapse" aria-labelledby="headingRiesgos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">RIESGOS:</h6>



          <!--------------------------EN ESTA AREA SE MODIFICARON LOS ACCESOS A LAS PAGINAS------------  -->


			<a class="collapse-item" href="sistema.php?pag=nri">Nivel de Riesgo</a>
      <a class="collapse-item" href="sistema.php?pag=sch">Escenario de Schwartz</a>
	
          </div>
        </div>
      </li>
		
	<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseControles" aria-expanded="true" aria-controls="collapseControles">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Controles</span>
        </a>
        <div id="collapseControles" class="collapse" aria-labelledby="headingControles" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">CONTROLES:</h6>



          <!--------------------------EN ESTA AREA SE MODIFICARON LOS ACCESOS A LAS PAGINAS------------  -->


			  <a class="collapse-item" href="sistema.php?pag=con">Definición de Controles</a>
			  <a class="collapse-item" href="sistema.php?pag=econ">Evaluación de Controles</a>
	
          </div>
        </div>
      </li>		

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <!--<li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>-->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) BOTON PARA OCULTAR EL MENU IZQUIERDO-->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

		
		
    </ul> <!-- Cierre menu izquierdo-->
    

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar BARRA DE ARRIBA                    bg-white -->
        <nav class="navbar navbar-expand navbar-light bg-verde2 topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
			

			
			
          <!-- BUSCADOR DE ARRIBA-->
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto ">

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

    

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">

              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-900 small">
				<?php 

					if(isset($_SESSION['bienvenido'])){
						echo("<h6>");
						echo($_SESSION['bienvenido']);
						echo ("</h6>");
						//unset($_SESSION['bienvenido']); // para borrar el mensaje y que solo se muestre una vez
					}

				?>
				  </span>
                <img class="img-profile rounded-circle" src="img/profiles/f1.png">
              </a>
				
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="sistema.php?pag=perfil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <!--<a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Configuracion
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Actividad
                </a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
		