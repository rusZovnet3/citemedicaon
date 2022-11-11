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

 				<?php

		 		# Ver Doctores
		 		$ver_doctores = DoctoresC::VerDoctoresC(null, null);

		 		foreach ($ver_doctores as $key => $value) {

					#  Mostrar Ver Consultorios, vista por el Paciente
 					$ver_consul_doct = ConsultoriosC::VerConsultoriosC("id", $value["id_consultorio"]);

	 					echo '<div class="col-lg-3 col-xs-6">

			 					<div class="small-box bg-aqua">

			 						<div class="inner">
			 							<h3 style="margin:2px;">'. $ver_consul_doct["nombre"] .'</h3>


			 							<a href="Doctor/'. $value["id"] .'" style="color: black;"><p>'. $value["apellido"] . ' ' . $value["nombre"] . '</p></a>

			 						</div>

			 					</div>
			 				</div>';

		 		}

 				 ?>

 			</div>

 		</div>

 	</section>

 </div>

 <?php
 	/*$borrarC = new ConsultoriosC();
 	$borrarC->BorrarConsultorioC();*/