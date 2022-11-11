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
 		<h1>Doctor: Rosio Pedraza Zabala</h1>
 		<br>
 		<h1>Consultorio de: Cardiología</h1>
 	</section>

 	<section class="content">

 		<div class="box">


 			<div class="box-body">



 			</div>

 		</div>

 	</section>

 </div>

 <?php
 	/*$borrarC = new ConsultoriosC();
 	$borrarC->BorrarConsultorioC();*/