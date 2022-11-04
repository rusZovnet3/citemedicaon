<?php
    session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Citas Médicas | Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/css/skins/_all-skins.min.css">


  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->

</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->

  <?php

      # Begin Session Logueado
      if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {

         /*Begin - Contenido*/

          echo '<div class="wrapper">';

              include 'modulos/cabecera.php';
              include 'modulos/menu.php';

              $url = array();

              if (isset($_GET["url"])) {

                $url = explode("/", $_GET["url"]);

                if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S") {
                    include 'modulos/' . $url[0] . '.php';
                }else {
                  include 'modulos/404.php';
                }

              }else {
                    include 'modulos/inicio.php';
                  }

          echo '</div>';

        /*End - Contenido*/

        # End --- Session Logueado


        /*Begin ---- Direcciona al la seleccion de usuarios --- No son logueado*/
      }else if (isset($_GET["url"])) {

        if ($_GET["url"] == "seleccionar") {

                  include 'modulos/seleccionar.php';

        } else if ($_GET["url"] == "ingreso-Secretaria") {

                  include 'modulos/ingreso-Secretaria.php';

                }else{
                  include 'modulos/seleccionar.php';
                }

      }else{
        include 'modulos/seleccionar.php';
      }

       /*End ---- Direcciona al la seleccion de usuarios --- No son logueado*/





   ?>


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
