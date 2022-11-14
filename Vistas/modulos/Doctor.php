<?php
	# roles de acceso a la pagina
	if ($_SESSION["rol"] != "Paciente") {
		echo '<script>
					window.location = "inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">

 	<section class="content-header">
 		<?php

 			$columna = "id";
 			$valor = substr($_GET["url"], 7);

 			$resultado = DoctoresC::VerDoctoresC($columna, $valor);

 			$consu = ConsultoriosC::VerConsultoriosC("id", $resultado["id_consultorio"]);

 			if ($resultado["sexo"] == "Femenino") {

 				echo '<h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
				 		<br>
				 		<h1>Consultorio de: '.$consu["nombre"].'</h1>';

 			} else if ($resultado["sexo"] == "Masculino") {

 				echo '<h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
				 		<br>
				 		<h1>Consultorio de: '.$consu["nombre"].'</h1>';

 			}


 		 ?>

 	</section>

 	<section class="content">

 		<div class="box box-primary">


 			<div class="box-body no-padding">

 				<!-- THE CALENDAR -->
              <div id="calendar"></div>

 			</div>

 		</div>

 	</section>

 </div>
