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
 		<h1>Gestor de Pacientes</h1>
 	</section>

 	<section class="content">

 		<div class="box">

 			<div class="box-header">

 				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPaciente">Crear Paciente</button>

 			</div>

 			<div class="box-body">
 				<table class="table table-bordered table-hover table-striped DT">
 					<thead>
 						<tr>
 							<th>N°</th>
 							<th>Apellido</th>
 							<th>Nombre</th>
 							<th>Documento</th>
 							<th>Foto</th>
 							<th>Usuario</th>
 							<th>Contraseña</th>
 							<th>Editar / Borrar</th>
 						</tr>
 					</thead>

 					<tbody>

 						<?php

 						$mostrarPacientes = PacientesC::VerPacientesC(null, null);

 						foreach ($mostrarPacientes as $key => $value) {
 							echo '<tr>
		 							<td>'. ($key + 1) .'</td>
		 							<td>'. $value["apellido"] .'</td>
		 							<td>'. $value["nombre"] .'</td>
		 							<td>'. $value["documento"] .'</td>
		 							<td>';
		 								if ($value["foto"] != "") {
		 									echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $value["foto"] .'" class="img-responsive center-block" width="40px" height="40px">';
		 								}else{
		 									echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive center-block" width="40px" height="40px">';
		 								}
		 					echo	'</td>
		 							<td>'. $value["usuario"] .'</td>
		 							<td>'. $value["clave"] .'</td>
		 							<td>
		 								<button class="btn btn-success EditarPaciente" data-toggle="modal" data-target="#EditarPaciente" style="margin-right:5px;"><i class="fa fa-pencil"></i> Editar</button>
					 					<button class="btn btn-danger EliminarPaciente" Pid="'. $value["id"] .'" imgP="'. $value["foto"] .'" style="margin-left:5px;"><i class="fa fa-trash"></i> Eliminar</button>
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

 	<!--Begin --- modal Crear Paciente -->
 	<div class="modal fade" id="CrearPaciente" rol="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<form  method="post" role="form" autocomplete="off">
 					<div class="modal-body">
 						<div class="box-body">
 							<h1 class="text-center">Registrar Paciente</h1>

 							<!-- Begin -- Apellido -->
 							<div class="form-group">

 								<h2>Apellido:</h2>
 								<input type="text" name="apellido" class="form-control input-lg" value="" required>
 								<input type="hidden" name="rolP" value="Paciente">

 							</div>
 							<!-- End -- Apellido -->

 							<!-- Begin -- Nombre -->
 							<div class="form-group">

 								<h2>Nombre:</h2>
 								<input type="text" name="nombre" class="form-control input-lg" value="" required>

 							</div>
 							<!-- End -- Nombre -->

 							<!-- Begin -- Documento -->
 							<div class="form-group">

 								<h2>Documento:</h2>
 								<input type="text" name="documento" class="form-control input-lg" required>

 							</div>
 							<!-- End -- Documento -->

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

 					$crearP = new PacientesC();
 					$crearP->CrearPacienteC();

 					 ?>
 				</form>

 			</div>
 		</div>
 	</div>
 	<!--End --- modal Crear Paciente -->





 	<!--Begin Editar modal Paciente -->
 	<div class="modal fade" id="EditarPaciente" rol="dialog">
 		<div class="modal-dialog">
 			<div class="modal-content">

 				<form  method="post" role="form" autocomplete="off">
 					<div class="modal-body">
 						<div class="box-body">

 							<!-- Begin -- Apellido -->
 							<div class="form-group">

 								<h2>Apellido:</h2>
 								<input type="text" name="apellidoE" class="form-control input-lg" id="apellidoE" value="" required>
 								<input type="hidden" id="Pid" name="Pid">

 							</div>
 							<!-- End -- Apellido -->

 							<!-- Begin -- Nombre -->
 							<div class="form-group">

 								<h2>Nombre:</h2>
 								<input type="text" name="nombreE" class="form-control input-lg" id="nombreE" required>

 							</div>
 							<!-- End -- Nombre -->


 							<!-- Begin -- Documento -->
 							<div class="form-group">

 								<h2>Documento:</h2>
 								<input type="text" name="documentoE" class="form-control input-lg" id="documentoE" required>

 							</div>
 							<!-- End -- Documento -->


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

 					/*$actualizarD = new DoctoresC();
 					$actualizarD->ActualizarDoctorC();*/

 					 ?>
 				</form>

 			</div>
 		</div>
 	</div>
 	<!--End Editar modal Paciente -->

 <?php
 	$borrarP = new PacientesC();
 	$borrarP->EliminarPacienteC();