<?php

	class DoctoresC{

		public function CrearDoctorC(){

			if (isset($_POST["rolID"]) && $_POST["rolID"] == "Doctor" && !empty($_POST["apellido"])) {
				$tablaBD 	= "doctores";

				$datosC 	= array("rol" 				=> $_POST["rolID"],
									"apellido" 			=> $_POST["apellido"],
									"nombre" 			=> $_POST["nombre"],
									"sexo" 				=> $_POST["sexo"],
									"id_consultorio" 	=> $_POST["consultorio"],
									"usuario" 			=> $_POST["usuario"],
									"clave" 			=> $_POST["clave"]);

				$resultado = DoctoresM::CrearDoctorM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/doctores";
							</script>';
				}
			}
		}

		static public function VerDoctoresC($columna, $valor){
			$tablaBD 	= "doctores";
			$resultado 	= DoctoresM::VerDoctoresM($tablaBD, $columna, $valor);
			return $resultado;
		}

		# Evitar repetir dos veces, para Modificar usuario Doctor
		static public function ExcepVerDoctoresC($columna, $valor, $id){
			$tablaBD 	= "doctores";
			$resultado 	= DoctoresM::ExcepVerDoctoresM($tablaBD, $columna, $valor, $id);
			return $resultado;
		}


		public function ActualizarDoctorC(){

			if (isset($_POST["DidE"])) {
				$tablaBD = "doctores";

				$datosC = array("id" 				=> $_POST["DidE"],
								"apellido" 			=> $_POST["apellidoE"],
								"nombre" 			=> $_POST["nombreE"],
								"sexo"				=> $_POST["sexoE"],
								"usuario" 			=> $_POST["usuarioE"],
								"clave" 			=> $_POST["claveE"],
								"id_consultorio" 	=> $_POST["consultorioE"]);

				$resultado = DoctoresM::ActualizarDoctorM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/doctores";
							</script>';
				}
			}
		}

		// GET por JS
		public function EliminarDoctorC(){

			if (isset($_GET["Did"])) {
				$tablaBD = "doctores";
				$id = $_GET["Did"];

				# Verifica si la ruta imagen desde la BD no esta vacío
				if ($_GET["imgD"] != "") {

					// Elimina la ruta archivo del sistema
					unlink($_GET["imgD"]);
				}

				$resultado = DoctoresM::EliminarDoctorM($tablaBD, $id);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/doctores";
							</script>';
				}
			}
		}

		# Inisiar session DOCTOR
		public function IngresarDoctorC(){
			if (isset($_POST["usuario-Ing"])) {

				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

					$tablaBD 	= "doctores";
					$datosC 	= array("usuario" 	=> $_POST["usuario-Ing"],
										"clave" 	=> $_POST["clave-Ing"]);

					$resultado = DoctoresM::IngresarDoctorM($tablaBD, $datosC);

					if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {

						# AUTORIZA LA SESSION
						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] 			= $resultado["id"];
						$_SESSION["usuario"] 		= $resultado["usuario"];
						$_SESSION["clave"] 			= $resultado["clave"];
						$_SESSION["nombre"] 		= $resultado["nombre"];
						$_SESSION["apellido"] 		= $resultado["apellido"];
						$_SESSION["foto"] 			= $resultado["foto"];
						$_SESSION["sexo"] 			= $resultado["sexo"];
						$_SESSION["horarioE"] 		= $resultado["horarioE"];
						$_SESSION["horarioS"] 		= $resultado["horarioS"];
						$_SESSION["id_consultorio"] = $resultado["id_consultorio"];
						$_SESSION["rol"] 			= $resultado["rol"];

						echo '<script>
									window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio";
								</script>';

					} else {
						echo '<br><div class="alert alert-danger text-center">Error al Ingresar</div>';
					}

				}
			}
		}


		public function VerPerfilDoctorC(){
			$tablaBD = "doctores";
			$id = $_SESSION["id"];
			$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);


			$objConsultor = ConsultoriosC::VerConsultoriosC("id", $resultado["id_consultorio"]);

			echo '<tr>
 					<td>'. $resultado["usuario"] .'</td>
 					<td>'. $resultado["clave"] .'</td>
 					<td>'. $resultado["nombre"] .'</td>
 					<td>'. $resultado["apellido"] .'</td>
 					<td>';

 						if ($resultado["foto"] == "" || $resultado["foto"] == null) {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						} else {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						}


 			echo   '</td>
 					<td>'. $objConsultor["nombre"] .'</td>
 					<td>Desde: '. $resultado["horarioE"] .'<br>Hasta: '. $resultado["horarioS"] .'</td>
 					<td>
 						<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-D/'. $resultado["id"] .'">
 							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
 						</a>
 					</td>
 				</tr>';
		}

		#Editar Perfil de Doctor
		public function EditarPerfilDoctorC(){
			$tablaBD = "doctores";
			$id = $_SESSION["id"];
			$resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

			$objConsul = ConsultoriosC::VerConsultoriosC(null, null);
			$objConsulID = ConsultoriosC::VerConsultoriosC("id", $resultado["id_consultorio"]);

			echo '<form method="post" enctype="multipart/form-data" autocomplete="off">

 				 	<div class="row">

 				 		<div class="col-md-6 col-xs-12">
 				 			<h2>Nombre:</h2>
 				 			<input type="text" name="nombrePerfil" class="form-control input-lg" value="'.$resultado["nombre"].'" required>
 				 			<input type="hidden" name="Did" value="'.$resultado["id"].'">

 				 			<h2>Apellido:</h2>
 				 			<input type="text" name="apellidoPerfil" class="form-control input-lg" value="'.$resultado["apellido"].'" required>

 				 			<h2>Usuario:</h2>
 				 			<input type="text" name="usuarioPerfil" class="form-control input-lg" value="'.$resultado["usuario"].'" required>

 				 			<h2>Contraseña:</h2>
 				 			<input type="password" name="clavePerfil" class="form-control input-lg" value="'.$resultado["clave"].'" required>


 				 		</div>

 				 		<div class="col-md-6 col-xs-12">';
 			echo 			'<h2>Consultorio Actual: <b class="text-primary"><ins>'.$objConsulID["nombre"].'</ins></b></h2>
 				 			<h3>Cambiar Consultorio:</h3>
 				 			<select name="consultorioPerfil" class="form-control input-lg" required autofocus>
 				 					<option>Seleccionar...</option>';

 				 				foreach ($objConsul as $key => $value) {
 				 					echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
 				 				}

 			echo 			'</select>

 				 			<h2>Horario:</h2>
 				 			Desde: <input type="time" name="hePerfil" class="input-lg" value="'.$resultado["horarioE"].'">
 				 			Hasta: <input type="time" name="hsPerfil" class="input-lg" value="'.$resultado["horarioS"].'">

 				 			<br><br>
 				 			<input type="file" name="imgPerfil"><br>';

 				 			if ($resultado["foto"] != "") {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive" width="200px;">';
 							} else {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive" width="200px;">';
 							}

 			echo 			'<input type="hidden" name="imgActual" value="'.$resultado["foto"].'"><br>

 				 			<button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>

 				 		</div>
 				 	</div>

 				 </form>';
		}

		# Actualizar cambios del Perfil Doctor
		public function ActualizarPerfilDoctorC(){
			if (isset($_POST["Did"]) && !empty($_POST["nombrePerfil"]) && !empty($_POST["apellidoPerfil"]) && !empty($_POST["usuarioPerfil"]) && !empty($_POST["clavePerfil"])) {

				$rutaImg = $_POST["imgActual"];

				date_default_timezone_set("America/La_Paz");

				# Verifica si el input File está cargado el fichero
				if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {

					# verifica si la rutaImagen desde la BD no esta vacía
					if (!empty($_POST["imgActual"])) {
						#
						unlink($_POST["imgActual"]);
					}

					#----------- PNG
					if ($_FILES["imgPerfil"]["type"] == "image/png") {
						$nombre = date("dmY_His_") . mt_rand(10, 999);
						$rutaImg = "Vistas/img/Doctores/Doc-" . $nombre . ".png";
						$foto 		= imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);
						imagepng($foto, $rutaImg);
					}

					#----------- JPG
					if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {
						$nombre = date("dmY_His_") . mt_rand(10, 999);
						$rutaImg = "Vistas/img/Doctores/Doc-" . $nombre . ".jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);
						imagejpeg($foto, $rutaImg);
					}
				}

				$tablaBD = "doctores";
				$datosC = array("id" 			=> $_POST["Did"],
								"consultorio" 	=> $_POST["consultorioPerfil"],
								"usuario" 		=> $_POST["usuarioPerfil"],
								"clave" 		=> $_POST["clavePerfil"],
								"nombre" 		=> $_POST["nombrePerfil"],
								"apellido" 		=> $_POST["apellidoPerfil"],
								"horarioE" 		=> $_POST["hePerfil"],
								"horarioS" 		=> $_POST["hsPerfil"],
								"foto" 			=> $rutaImg);

				$resultado = DoctoresM::ActualizarPerfilDoctorM($tablaBD, $datosC);

				# Actualizar las $_SESSION del logueado sus atributos
				$act_sess = DoctoresM::VerPerfilDoctorM($tablaBD, $_POST["Did"]);

				if ($resultado == true) {

					# actualiza las $_SESSION del usuario logueado

						$_SESSION["usuario"] 		= $act_sess["usuario"];
						$_SESSION["clave"] 			= $act_sess["clave"];
						$_SESSION["nombre"] 		= $act_sess["nombre"];
						$_SESSION["apellido"] 		= $act_sess["apellido"];
						$_SESSION["foto"] 			= $act_sess["foto"];
						$_SESSION["horarioE"] 		= $act_sess["horarioE"];
						$_SESSION["horarioS"] 		= $act_sess["horarioS"];
						$_SESSION["id_consultorio"] = $act_sess["id_consultorio"];


					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-Doctor";
						</script>';
				}
			}
		}

	}