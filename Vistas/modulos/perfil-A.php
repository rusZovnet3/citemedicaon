<?php
	if ($_SESSION["rol"] != "Administrador") {
		echo '<script>
					window.location = "inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">
 	<section class="content">
 		<div class="box">
 			<div class="box-body">
 				<?php

 				$editarPerfil = new AdministradorC();
 				$editarPerfil->EditarPerfilAdministradorC();

 				$editarPerfil->ActualizarPerfilAdministradorC();

 				 ?>

 			</div>
 		</div>
 	</section>
 </div>