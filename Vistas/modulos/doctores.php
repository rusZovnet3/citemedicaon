<?php
	# roles de acceso a la pagina
	if ($_SESSION["rol"] != "Secretaria") {
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
 				<table class="table table-bordered table-hover table-striped">
 					<thead>
 						<tr>
 							<th>N°</th>
 							<th>Apellido</th>
 							<th>Nombre</th>
 							<th>Foto</th>
 							<th>Consultorio</th>
 							<th>Usuario</th>
 							<th>Contraseña</th>
 							<th>Editar / Borrar</th>
 						</tr>
 					</thead>

 					<tbody>

 						<?php

 							/*$resultado = ConsultoriosC::VerConsultoriosC(null, null);

 							foreach ($resultado as $key => $value) {
 								echo '<tr>
			 							<td>'. ($key + 1) .'</td>
			 							<td>'. $value["nombre"] .'</td>
			 							<td>
			 								<div class="btn-group">
			 									<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/E-C/'. $value["id"] .'">
			 										<button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
			 									</a>

			 									<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/consultorios/'. $value["id"] .'">
			 										<button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button>
			 									</a>
			 								</div>
			 							</td>
			 						</tr>';
 							}*/

 						 ?>


 					</tbody>
 				</table>
 			</div>

 		</div>

 	</section>

 </div>

 	<!-- modal Doctores -->
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
 								<h2>Consultorio::</h2>

 								<select name="consultorio" class="form-control input-lg">
 									<option>Seleccionar...</option>

 									<option value="Cardiologia">Cardiologia</option>
 									<option value="Sexologia">Sexologia</option>
 								</select>
 							</div>
 							<!-- End --- select - consultorio -->



 							<!-- Begin -- Usuario -->
 							<div class="form-group">

 								<h2>Usuario:</h2>
 								<input type="text" name="usuario" class="form-control input-lg" value="" required>

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
 				</form>

 			</div>
 		</div>
 	</div>

 <?php
 	/*$borrarC = new ConsultoriosC();
 	$borrarC->BorrarConsultorioC();*/