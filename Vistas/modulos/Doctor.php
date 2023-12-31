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
 		<?php

 			$columna = "id";
 			$valor = substr($_GET["url"], 7);

 			$resultado = DoctoresC::VerDoctoresC($columna, $valor);

 			$consu = ConsultoriosC::VerConsultoriosC("id", $resultado["id_consultorio"]);

 			if ($resultado["sexo"] == "Femenino") {

 				echo '<h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
				 		<br>
				 		<h1>Consultorio de: '.$consu["nombre"].'</h1>';

 			} else if ($resultado["sexo"] == "Masculino") {

 				echo '<h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>
				 		<br>
				 		<h1>Consultorio de: '.$consu["nombre"].'</h1>';

 			}


 		 ?>

 	</section>

 	<section class="content">

 		<div class="box box-primary">


 			<div class="box-body">

 				<!-- THE CALENDAR -->
              <div id="calendar"></div>

 			</div>

 		</div>

 	</section>

 </div>


 <!--Begin Modal Cita --- Doctor -- Para Pacientes--->
<div class="modal fade" role="dialog" id="idCitaModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<form method="post" autocomplete="off">

				<div class="modal-body">
					<div class="box-body">

						<?php

						$columna = "id";
						$valor = substr($_GET["url"], 7);

						$resultado = DoctoresC::VerDoctoresC($columna, $valor);

						$res_consul = ConsultoriosC::VerConsultoriosC("id", $resultado["id_consultorio"]);

						echo '<div class="form-group">

								<h2>Nombre del Paciente:</h2>

								<input type="text" class="form-control input-lg" name="nyaC" value="'. $_SESSION["nombre"] . ' ' . $_SESSION["apellido"] .'" readonly>
								<!-- id del Doctor -->
								<input type="hidden" name="Did" value="'. $resultado["id"] .'">
								<!-- id del Paciente -->
								<input type="hidden" name="Pid" value="'. $_SESSION["id"] .'">

							</div>

							<div class="form-group">

								<h2>Documento:</h2>

								<!-- documento Cita -->
								<input type="text" class="form-control input-lg" name="documentoC" value="'. $_SESSION["documento"] .'" readonly>

							</div>

							<div class="form-group">

								<!-- id del Consultorio -->
								<input type="hidden" name="Cid" value="'. $res_consul["id"] .'">

							</div>';

						 ?>




						<div class="form-group">

							<h2>Fecha:</h2>

							<!-- Fecha Cita -->
							<input type="text" class="form-control input-lg" id="fechaC" readonly>

						</div>

						<div class="form-group">

							<h2>Hora:</h2>

							<!-- Hora Cita -->
							<input type="text" class="form-control input-lg" id="horaC" readonly>

						</div>

						<div class="form-group">

							<!-- Fecha y Hora Inicial Cita -->
							<input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>

							<!-- Fecha y Hora Final Cita -->
							<input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>

						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Pedir Cita</button>

					<button type="button" class="btn btn-danger">Cancelar</button>
				</div>

				<?php
				# Guardar Citas Modal

				$enviarC = new CitasC();
				$enviarC->EnviarCitaC();

				 ?>

			</form>

		</div>
	</div>
</div>
 <!--End Modal Cita --- Doctor -- Para Pacientes--->
