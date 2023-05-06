<?php

session_start();

?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LOGIN - GESTION DE AUDITORIAS</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-fondo-login">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center ">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5 ">
          <div class="card-body p-0 ">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image texto"><img src="img/Gadsi.jpeg" width="140" hspace="16" height="60" vspace="16" />
				  <div class="row">
				  	<b>(Gestión de Auditoria de los Sistemas de Información).</b>
				  </div>
                </div>
              <div class="col-lg-6">
                <div class="p-5">

                  <div class="text-center">
                    <h1 class="h4 text-900 mb-4 bienvenido"><b>BIENVENIDO</b></h1>
                  </div>
					
                  <form class="user" action="backend/validar.php" method="post">

                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="correo" placeholder="Ingrese Correo">
                    </div>
			
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="clave" name="clave" placeholder="Clave">
                    </div>
					  
					          <hr>  
                    <button type="submit"  class="btn btn-primary btn-user btn-block" >Ingresar</button>
					           
                    <?php include("backend/utilitarios/vlogin.php"); //mostrar mensaje usuario no existe?>
           
                  </form>
                  <hr>
					
                 <!-- <div class="text-center">
                    <a class="small" href="forgot-password.html">Olvidaste la Contraseña?</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script>
  <script src="js/sb-admin-2.js"></script> -->
</body>

</html>
