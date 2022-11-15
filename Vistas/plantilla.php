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

  <!-- DataTables CSS -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

   <!-- fullCalendar -->
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">


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

              # Control de Menú
              if ($_SESSION["rol"] == "Secretaria") {
                  include 'modulos/menuSecretaria.php';
              }else if ($_SESSION["rol"] == "Paciente") {
                  include 'modulos/menuPaciente.php';
              }else if ($_SESSION["rol"] == "Doctor") {
                  include 'modulos/menuDoctor.php';
              }



              $url = array();

              if (isset($_GET["url"])) {

                $url = explode("/", $_GET["url"]);

                if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "E-C" || $url[0] == "doctores" || $url[0] == "pacientes" || $url[0] == "perfil-Paciente" || $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" || $url[0] == "E-D") {
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

        $url = explode("/", $_GET["url"]);

        if ($url[0] == "seleccionar") {

                  include 'modulos/seleccionar.php';

        } else if ($url[0] == "ingreso-Secretaria") {

                  include 'modulos/ingreso-Secretaria.php';

                }else if ($url[0] == "ingreso-Paciente") {

                  include 'modulos/ingreso-Paciente.php';

                }else if ($url[0] == "ingreso-Doctor") {

                  include 'modulos/ingreso-Doctor.php';

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
<!-- Jquery UI 1.11.4 -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/dist/js/demo.js"></script>

<!-- DataTables--- JS -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- <script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script> -->

<!-- fullCalendar -->
<!-- <script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/moment/min/moment.min.js"></script> -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/moment/moment.js"></script>

<!-- <script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fullcalendar/dist/fullcalendar.js"></script> -->
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>


<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/js/doctores.js"></script>

<script src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/js/pacientes.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  var date = new Date()
  var d    = date.getDate(),
  m    = date.getMonth(),
  y    = date.getFullYear()

  $('#calendar').fullCalendar({
    // Ocultar los Domigos y Sabado
    hiddenDays: [0, 6],
    //Mostrar las Horas
    defaultView: 'agendaWeek',

    //Mostrar Citas desde el Calendar
    events: [

          <?php

          $resultado = CitasC::VerCitasC();

          foreach ($resultado as $key => $value) {
            if ($value["id_doctor"] == substr($_GET["url"], 7)) {

               echo '{

                  id: '. $value["id"] .',
                  title:  "'. $value["nom_ape_pac"] .'",
                  start:  "'. $value["inicio"] .'",
                  end:  "'. $value["fin"] .'",

               },';

            }
          }

           ?>

    ],

    //Click en las casillas para el modal Cita
    dayClick: function(date,jsEvent,view){
      $('#idCitaModal').modal();

      //Formato de fecha
      let fecha = date.format();
      let hora2 = ("01:00:00").split(":");

      fecha = fecha.split('T');
      let dia = fecha[0];
      let hora = (fecha[1].split(":"));

      //No permitir las media hora (00:30)
      let h1 = parseFloat(hora[0]);
      let h2 = parseFloat(hora2[0]);

      let horaFinal = h1 + h2;

      // añadir al input fechaC del modal Cita
      //la fecha del Día
      $('#fechaC').val(dia);

      // añadir al input horaC del modal Cita
      //la Hora del Día Final
      $('#horaC').val(h1+":00:00");

      //input oculto , Fecha y hora Inicio
      $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

      //input oculto , Fecha y hora Final
      $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");
    }
  });


</script>
</body>
</html>
