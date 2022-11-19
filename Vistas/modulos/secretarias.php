<?php
	# roles de acceso a la pagina
	if ($_SESSION["rol"] != "Administrador") {
		echo '<script>
					window.location = "inicio";
			</script>';
		return;
	}
 ?>

 <div class="content-wrapper">

 	<section class="content-header">
 		<h1>Gestor de Secretarias</h1>
 	</section>

 	<section class="content">

 		<div class="box">

 			<div class="box-header">

 				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>

 			</div>

 			<div class="box-body">
 				<table class="table table-bordered table-hover table-striped DT">
 					<thead>
 						<tr>
 							<th>N°</th>
 							<th>Apellido</th>
 							<th>Nombre</th>
 							<th>Foto</th>
 							<th>Usuario</th>
 							<th>Contraseña</th>
 							<th>Borrar</th>
 						</tr>
 					</thead>

 					<tbody>

 						<?php

 							$verSecretarias = SecretariasC::VerSecretariasC("ASC", "apellido");

 							foreach ($verSecretarias as $key => $value) {
 								echo '<tr>
			 							<td>'. ($key + 1) .'</td>
			 							<td>'. $value["apellido"] .'</td>
			 							<td>'. $value["nombre"] .'</td>
			 						 	<td>';

			 						 	if ($value["foto"] == "" || $value["foto"] == null) {
				 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive center-block" width="40px" height="40px">';
				 						} else {
				 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $value["foto"] .'" class="img-responsive center-block" width="40px" height="40px">';
				 						}


			 					echo    '</td>
			 						 	<td>'. $value["usuario"] .'</td>
			 						 	<td>'. $value["clave"] .'</td>
			 							<td>
			 								<div class="btn-group">
			 									<button class="btn btn-danger EliminarSecretaria" AAid="'. $value["id"] .'" AAimg="'. $value["foto"] .'" style="margin-left:5px;"><i class="fa fa-trash"></i> Eliminar</button>
			 								</div>
			 							</td>
			 						</tr>';
 							}

 						 ?>

 					</tbody>
 				</table>
 			</div>

 		</div>

 	</section>

 </div>

 	<!--Begin --- modal Crear Secretarias -->
 	<div class="modal fade" id="CrearSecretaria" rol="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<form  method="post" role="form" autocomplete="off">
 					<div class="modal-body">
 						<div class="box-body">
 							<h1 class="text-center">Registrar Secretarias</h1>

 							<!-- Begin -- Apellido -->
 							<div class="form-group">

 								<h2>Apellido:</h2>
 								<input type="text" name="apellido" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Apellido -->

 							<!-- Begin -- Nombre -->
 							<div class="form-group">

 								<h2>Nombre:</h2>
 								<input type="text" name="nombre" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Nombre -->

 							<!-- Begin -- Usuario -->
 							<div class="form-group">

 								<h2>Usuario:</h2>
 								<input type="text" name="usuario" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Usuario -->

 							<!-- Begin -- Contraseña -->
 							<div class="form-group">

 								<h2>Contraseña:</h2>
 								<input type="password" name="clave" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Contraseña -->

 						</div>
 					</div>

 					<div class="modal-footer">
 						<button type="submit" class="btn btn-primary">Crear</button>

 						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
 					</div>

 					<?php

 					$crearS = new SecretariasC();
 					$crearS->CrearSecretariaC();

 					 ?>
 				</form>

 			</div>
 		</div>
 	</div>
 	<!--End --- modal Crear Doctores -->

 <?php
 	$borrarSe = new SecretariasC();
 	$borrarSe->EliminarSecretariaC();