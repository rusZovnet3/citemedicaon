<?php
	# roles de acceso a la pagina
	if ($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Administrador") {
		echo '<script>
					window.location = "inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">
 	<section class="content-header">
 		<h1>Editar Consultorio</h1>
 	</section>

 	<section class="content">
 		<div class="box">
 			<div class="box-body">
 				<form method="post" autocomplete="off">

 					<?php

 					$editarC = new ConsultoriosC();
 					$editarC->EditarConsultoriosC();
 					$editarC->ActualizarConsultoriosC();

 					 ?>

 				</form>
 			</div>
 		</div>
 	</section>
 </div>