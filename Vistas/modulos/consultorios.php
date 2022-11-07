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
 		<h1>Gestor de Consultorios</h1>
 	</section>

 	<section class="content">

 		<div class="box">

 			<div class="box-header">

 				<form method="post" autocomplete="off">

 					<div class="col-md-6 col-xs-12">
 						<input type="text" class="form-control" name="consultorioN" placeholder="Ingrese Nuevo Consultorio" required>
 					</div>

 					<button type="submit" class="btn btn-primary">Crear Consultorio</button>
 				</form>

 			</div>

 			<div class="box-body">
 				<table class="table table-bordered table-hover table-striped">
 					<thead>
 						<tr>
 							<th>N°</th>
 							<th>Nombre</th>
 							<th>Editar / Borrar</th>
 						</tr>
 					</thead>

 					<tbody>
 						<tr>
 							<td>1</td>
 							<td>Cardiologia</td>
 							<td>
 								<div class="btn-group">
 									<a href="">
 										<button class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
 										<button class="btn btn-success"><i class="fa fa-times"></i> Borrar</button>
 									</a>
 								</div>
 							</td>
 						</tr>
 					</tbody>
 				</table>
 			</div>

 		</div>

 	</section>

 </div>