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
 		<h1>Gestor de Doctores</h1>
 	</section>

 	<section class="content">

 		<div class="box">

 			<div class="box-header">

 				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>

 			</div>

 			<div class="box-body">
 				<table class="table table-bordered table-hover table-striped dt-responsive DT">
 					<thead>
 						<tr>
 							<th width="8%">N°</th>
 							<th>Apellido</th>
 							<th>Nombre</th>
 							<th width="8%">Foto</th>
 							<th>Consultorio</th>
 							<th>Usuario</th>
 							<th>Contraseña</th>
 							<th width="20%">Editar / Borrar</th>
 						</tr>
 					</thead>

 					<tbody>

 						<?php

 							$verDoctores = DoctoresC::VerDoctoresC(null, null);

 							foreach ($verDoctores as $key => $value) {
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

				 						$consul = ConsultoriosC::VerConsultoriosC("id", $value["id_consultorio"]);

			 					echo    '</td>
			 							<td>'. $consul["nombre"] .'</td>
			 						 	<td>'. $value["usuario"] .'</td>
			 						 	<td>'. $value["clave"] .'</td>
			 							<td>
			 								<div class="btn-group">
			 									<button class="btn btn-success EditarDoctor" Did="'. $value["id"] .'" data-toggle="modal" data-target="#EditarDoctor" style="margin-right:5px;"><i class="fa fa-pencil"></i> Editar</button>
			 									<button class="btn btn-danger EliminarDoctor" Did="'. $value["id"] .'" imgD="'. $value["foto"] .'" style="margin-left:5px;"><i class="fa fa-trash"></i> Eliminar</button>
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

 	<!--Begin --- modal Crear Doctores -->
 	<div class="modal fade" id="CrearDoctor" rol="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<form  method="post" role="form" autocomplete="off">
 					<div class="modal-body">
 						<div class="box-body">
 							<h1 class="text-center">Registrar Doctor</h1>

 							<!-- Begin -- Apellido -->
 							<div class="form-group">

 								<h2>Apellido:</h2>
 								<input type="text" name="apellido" class="form-control input-lg" value="" required>
 								<input type="hidden" name="rolID" value="Doctor">

 							</div>
 							<!-- End -- Apellido -->

 							<!-- Begin -- Nombre -->
 							<div class="form-group">

 								<h2>Nombre:</h2>
 								<input type="text" name="nombre" class="form-control input-lg" value="" required>

 							</div>
 							<!-- End -- Nombre -->

 							<!-- Begin --- select - Sexo -->
 							<div class="form-group">
 								<h2>Sexo:</h2>

 								<select name="sexo" class="form-control input-lg">
 									<option>Seleccionar...</option>

 									<option value="Masculino">Masculino</option>
 									<option value="Femenino">Femenino</option>
 								</select>
 							</div>
 							<!-- End --- select - Sexo -->

 							<!-- Begin --- select - consultorio -->
 							<div class="form-group">
 								<h2>Consultorio:</h2>

 								<select name="consultorio" class="form-control input-lg">
 									<option>Seleccionar...</option>

 									<?php

 									$resultado = ConsultoriosC::VerConsultoriosC(null, null);

 									foreach ($resultado as $key => $value) {
 										echo '<option value="'. $value["id"] .'">'. $value["nombre"] .'</option>';
 									}

 									 ?>

 								</select>
 							</div>
 							<!-- End --- select - consultorio -->



 							<!-- Begin -- Usuario -->
 							<div class="form-group">

 								<h2>Usuario:</h2>
 								<input type="text" name="usuario" id="usuarioI" class="form-control input-lg" value="" required>

 							</div>
 							<!-- End -- Usuario -->

 							<!-- Begin -- Contraseña -->
 							<div class="form-group">

 								<h2>Contraseña:</h2>
 								<input type="password" name="clave" class="form-control input-lg" value="" required>

 							</div>
 							<!-- End -- Contraseña -->

 						</div>
 					</div>

 					<div class="modal-footer">
 						<button type="submit" class="btn btn-primary">Crear</button>

 						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
 					</div>

 					<?php

 					$crearD = new DoctoresC();
 					$crearD->CrearDoctorC();

 					 ?>
 				</form>

 			</div>
 		</div>
 	</div>
 	<!--End --- modal Crear Doctores -->





 	<!--Begin Editar modal Doctores -->
 	<div class="modal fade" id="EditarDoctor" rol="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<form  method="post" role="form" autocomplete="off">
 					<div class="modal-body">
 						<div class="box-body">

 							<!-- Begin -- Apellido -->
 							<div class="form-group grupo-ape">

 								<h2>Apellido:</h2>
 								<input type="text" name="apellidoE" class="form-control input-lg" id="apellidoE" value="" required>
 								<input type="hidden" id="DidE" name="DidE">

 							</div>
 							<!-- End -- Apellido -->

 							<!-- Begin -- Nombre -->
 							<div class="form-group">

 								<h2>Nombre:</h2>
 								<input type="text" name="nombreE" class="form-control input-lg" id="nombreE" required>

 							</div>
 							<!-- End -- Nombre -->

 							<!-- Begin --- select - Sexo -->
 							<div class="form-group">
 								<h2>Sexo:</h2>

 								<select name="sexoE" class="form-control input-lg" required="">
 									<option id="sexoE"></option>

 									<option value="Masculino">Masculino</option>
 									<option value="Femenino">Femenino</option>
 								</select>
 							</div>
 							<!-- End --- select - Sexo -->

 							<!-- Begin --- select - consultorio -->
 							<div class="form-group">
 								<h2>Consultorio:</h2>

 								<select name="consultorioE" class="form-control input-lg" required="">
 									<option id="consultorioE"></option>

 									<?php

 									$resultado = ConsultoriosC::VerConsultoriosC(null, null);

 									foreach ($resultado as $key => $value) {
 										echo '<option value="'. $value["id"] .'">'. $value["nombre"] .'</option>';
 									}

 									 ?>

 								</select>
 							</div>
 							<!-- End --- select - consultorio -->



 							<!-- Begin -- Usuario -->
 							<div class="form-group">

 								<h2>Usuario:</h2>
 								<input type="text" name="usuarioE" id="usuarioE" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Usuario -->

 							<!-- Begin -- Contraseña -->
 							<div class="form-group">

 								<h2>Contraseña:</h2>
 								<input type="password" name="claveE" id="claveE" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Contraseña -->

 						</div>
 					</div>

 					<div class="modal-footer">
 						<button type="submit" class="btn btn-success">Guardar Cambios</button>

 						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
 					</div>

 					<?php

 					$actualizarD = new DoctoresC();
 					$actualizarD->ActualizarDoctorC();

 					 ?>
 				</form>

 			</div>
 		</div>
 	</div>
 	<!--End Editar modal Doctores -->

 <?php
 	$borrarD = new DoctoresC();
 	$borrarD->EliminarDoctorC();