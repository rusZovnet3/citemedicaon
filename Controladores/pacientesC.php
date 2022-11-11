<?php

	class PacientesC{

		public function CrearPacienteC(){

			if (isset($_POST["rolP"]) && !empty($_POST["apellido"]) && !empty($_POST["usuario"]) && !empty($_POST["clave"]) && !empty($_POST["documento"])) {

				$tablaBD 	= "pacientes";
				$datosC 	= array("apellido" 	=> $_POST["apellido"],
									"nombre" 	=> $_POST["nombre"],
									"documento" => $_POST["documento"],
									"usuario" 	=> $_POST["usuario"],
									"clave" 	=> $_POST["clave"],
									"rol" 		=> $_POST["rolP"]);

				$resultado 	= PacientesM::CrearPacienteM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/pacientes";
							</script>';
				}
			}
		}


		static public function VerPacientesC($columna, $valor){
			$tablaBD 	= "pacientes";
			$resultado 	= PacientesM::VerPacientesM($tablaBD, $columna, $valor);
			return $resultado;
		}


		public function EliminarPacienteC(){

			if (isset($_GET["Pid"])) {

				$tablaBD = "pacientes";
				$id = $_GET["Pid"];

				# Verifica si la ruta imagen desde la BD no esta vacío
				if ($_GET["imgP"] != "") {

					// Elimina la ruta archivo del sistema
					unlink($_GET["imgP"]);
				}

				$resultado = PacientesM::EliminarPacienteM($tablaBD, $id);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/pacientes";
							</script>';
				}
			}
		}


		public function ActualizarPacienteC(){
			if (isset($_POST["Pid"]) && !empty($_POST["apellidoE"]) && !empty($_POST["usuarioE"]) && !empty($_POST["claveE"]) && !empty($_POST["documentoE"])) {

				$tablaBD = "pacientes";

				$datosC = array("apellido" 	=> $_POST["apellidoE"],
								"nombre" 	=> $_POST["nombreE"],
								"documento" => $_POST["documentoE"],
								"usuario" 	=> $_POST["usuarioE"],
								"clave" 	=> $_POST["claveE"],
								"id" 		=> $_POST["Pid"]);

				$resultado = PacientesM::ActualizarPacienteM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/pacientes";
							</script>';
				}
			}
		}


		/*==================================================
		=            Ingresar Session Pacientes            =
		==================================================*/

		public function IngresarPacienteC(){
			if (isset($_POST["usuario-Ing"])) {

				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

					$tablaBD 	= "pacientes";
					$datosC 	= array("usuario" 	=> $_POST["usuario-Ing"],
										"clave" 	=> $_POST["clave-Ing"]);

					$resultado = PacientesM::IngresarPacienteM($tablaBD, $datosC);

					if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {

						# AUTORIZA LA SESSION
						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] 		= $resultado["id"];
						$_SESSION["usuario"] 	= $resultado["usuario"];
						$_SESSION["clave"] 		= $resultado["clave"];
						$_SESSION["nombre"] 	= $resultado["nombre"];
						$_SESSION["documento"] 	= $resultado["documento"];
						$_SESSION["apellido"] 	= $resultado["apellido"];
						$_SESSION["foto"] 		= $resultado["foto"];
						$_SESSION["rol"] 		= $resultado["rol"];

						echo '<script>
									window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio";
								</script>';

					} else {
						echo '<br><div class="alert alert-danger text-center">Error al Ingresar</div>';
					}

				}
			}
		}


		public function VerPerfilPacienteC(){
			$tablaBD 	= "pacientes";
			$id 		= $_SESSION["id"];

			$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);

			echo '<tr>
 					<td>'. $resultado["usuario"] .'</td>
 					<td>'. $resultado["clave"] .'</td>
 					<td>'. $resultado["nombre"] .'</td>
 					<td>'. $resultado["apellido"] .'</td>
 					<td>'. $resultado["documento"] .'</td>
 					<td>';

 						if ($resultado["foto"] == "" || $resultado["foto"] == null) {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						} else {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						}


 			echo   '</td>
 					<td>
 						<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-P/'. $resultado["id"] .'">
 							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
 						</a>
 					</td>
 				</tr>';
		}


		/*----------  Editar Perfil Paciente  ----------*/
		public function EditarPerfilPacienteC(){
			$tablaBD 	= "pacientes";
			$id 		= $_SESSION["id"];

			$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $id);

			echo '<form method="post" enctype="multipart/form-data" autocomplete="off">
 				 	<div class="row">

 				 		<div class="col-md-6 col-xs-12">
 				 			<h2>Nombre:</h2>
 				 			<input type="text" name="nombrePerfil" class="input-lg" value="'. $resultado["nombre"] .'"><br>
 				 			<input type="hidden" name="Pid" value="'. $resultado["id"] .'">

 				 			<h2>Apellido:</h2>
 				 			<input type="text" name="apellidoPerfil" class="input-lg" value="'. $resultado["apellido"] .'">

 				 			<h2>Usuario:</h2>
 				 			<input type="text" name="usuarioPerfil" class="input-lg" value="'. $resultado["usuario"] .'">

 				 			<h2>Clave:</h2>
 				 			<input type="password" name="clavePerfil" class="input-lg" value="'. $resultado["clave"] .'">

 				 			<h2>Documento:</h2>
 				 			<input type="text" name="documentoPerfil" class="input-lg" value="'. $resultado["documento"] .'">
 				 		</div>

 				 		<div class="col-md-6 col-xs-12">
 				 			<br><br>
 				 			<input type="file" name="imgPerfil"><br>';

 				 			if ($resultado["foto"] != "") {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive" width="200px;">';
 							} else {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive" width="200px;">';
 							}


 			echo	 		'<input type="hidden" name="imgActual" value="'. $resultado["foto"] .'"><br><br>

 				 			<button type="submit" class="btn btn-success">Guardar Cambios</button>
 				 		</div>

 				 	</div>
 				 </form>';
		}


		public function ActualizarPerfilPacienteC(){
			if (isset($_POST["Pid"])) {

				# Zona horaria de Bolivia
				date_default_timezone_set("America/La_Paz");

				$rutaImg = $_POST["imgActual"];

				# sí el input file, la imagem esta cargado  Y  no esta vacío
				if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {

					# si la ruta Imagen no esta vacía, extraida desde la BD
					if (!empty($_POST["imgActual"])) {

						# elimina el fichero del sistema
						unlink($_POST["imgActual"]);
					}

					/*----------  PNG  ----------*/

					if ($_FILES["imgPerfil"]["type"] == "image/png") {
						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Pacientes/P-" . $nombre . ".png";
						$foto 		= imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);
						imagepng($foto, $rutaImg);
					}

					/*----------  JPG  ----------*/

					if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {
						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Pacientes/P-" . $nombre . ".jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);
						imagejpeg($foto, $rutaImg);
					}
				}

				$tablaBD = "pacientes";
				$datosC = array("id" 		=> $_POST["Pid"],
								"usuario" 	=> $_POST["usuarioPerfil"],
								"clave" 	=> $_POST["clavePerfil"],
								"nombre" 	=> $_POST["nombrePerfil"],
								"apellido" 	=> $_POST["apellidoPerfil"],
								"documento" => $_POST["documentoPerfil"],
								"foto" 		=> $rutaImg);

				$resultado = PacientesM::ActualizarPerfilPacienteM($tablaBD, $datosC);

				# Actualizar las $_SESSION del logueado sus atributos
				$act_sess = PacientesM::VerPerfilPacienteM($tablaBD, $_POST["Pid"]);

				if ($resultado == true) {

					# actualiza las $_SESSION del usuario logueado
						$_SESSION["usuario"] 	= $act_sess["usuario"];
						$_SESSION["clave"] 		= $act_sess["clave"];
						$_SESSION["nombre"] 	= $act_sess["nombre"];
						$_SESSION["documento"] 	= $act_sess["documento"];
						$_SESSION["apellido"] 	= $act_sess["apellido"];
						$_SESSION["foto"] 		= $act_sess["foto"];

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-Paciente";
						</script>';
				}
			}
		}


	}