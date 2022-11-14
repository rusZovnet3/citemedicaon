<?php
	# acceso al paciente session Id con el doctor url Id de la cita
	if ($_SESSION["id"] != substr($_GET["url"], 10)) {
		echo '<script>
					window.location = "inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">

 	<section class="content-header">
 		<h1>Su Historial de Citas Médicas</h1>
 	</section>

 	<section class="content">

 		<div class="box">

 			<div class="box-body">
 				<table class="table table-bordered table-hover table-striped DT">
 					<thead>
 						<tr>
 							<th>Fecha y Hora</th>
 							<th>Doctor</th>
 							<th>Consultorio</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php

 						# Historial de citas realizadas por el paciente
 						$resultado = CitasC::VerCitasC();

 						foreach ($resultado as $key => $value) {

 							# Mostrar Consultorio
 							$consult = ConsultoriosC::VerConsultoriosC("id", $value["id_consultorio"]);
 							# Mostrar Doctor
 							$doct = DoctoresC::VerDoctoresC("id", $value["id_doctor"]);

 							# verificar si el paciente es el logueado
 							if ($_SESSION["documento"] == $value["documento"]) {
 								echo '<tr>
			 						 	<td>'. $value["inicio"] .'</td>
			 						 	<td>'. $doct["apellido"] . ' ' . $doct["nombre"] .'</td>
			 						 	<td>'. $consult["nombre"] .'</td>
			 						 </tr>';
 							}
 						}

 						 ?>

 					</tbody>
 				</table>
 			</div>

 		</div>

 	</section>

 </div>

