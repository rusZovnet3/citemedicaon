<?php
	if ($_SESSION["rol"] != "Doctor") {
		echo '<script>
					window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">
 	<section class="content">
 		<div class="box">
 			<div class="box-body">
 				<?php

 				$editarPerfil = new DoctoresC();
 				$editarPerfil->EditarPerfilDoctorC();

 				$editarPerfil->ActualizarPerfilDoctorC();

 				 ?>

 			</div>
 		</div>
 	</section>
 </div>