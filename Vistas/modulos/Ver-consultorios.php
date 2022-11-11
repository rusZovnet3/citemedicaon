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
 		<h1>Elija un Consultorio</h1>
 	</section>

 	<section class="content">

 		<div class="box">


 			<div class="box-body">

 				<div class="col-lg-3 col-xs-6">

 					<div class="small-box bg-aqua">

 						<div class="inner">
 							<h3>Cardiología</h3>
 							<a href="Doctor" style="color: black;"><p>Rosio Pedraza Zabala</p></a>
 						</div>

 					</div>
 				</div>

 			</div>

 		</div>

 	</section>

 </div>

 <?php
 	/*$borrarC = new ConsultoriosC();
 	$borrarC->BorrarConsultorioC();*/