<?php

	class AdministradorC{

		public function IngresarAdministradorC(){
			if (isset($_POST["usuario-Ing"])) {

				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

					$tablaBD 	= "administradores";
					$datosC 	= array("usuario" 	=> $_POST["usuario-Ing"],
										"clave" 	=> $_POST["clave-Ing"]);

					$resultado = AdministradorM::IngresarAdministradorM($tablaBD, $datosC);

					if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {

						# AUTORIZA LA SESSION
						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] 			= $resultado["id"];
						$_SESSION["usuario"] 		= $resultado["usuario"];
						$_SESSION["clave"] 			= $resultado["clave"];
						$_SESSION["nombre"] 		= $resultado["nombre"];
						$_SESSION["apellido"] 		= $resultado["apellido"];
						$_SESSION["foto"] 			= $resultado["foto"];
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


		# Vista Perfil Administrador
		public function VerPerfilAdministradorC(){
			$tablaBD = "administradores";
			$id = $_SESSION["id"];
			$resultado = AdministradorM::VerPerfilAdministradorM($tablaBD, $id);

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
 					<td>
 						<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-A">
 							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
 						</a>
 					</td>
 				</tr>';
		}


		# Editar Perfil Administrador
		public function EditarPerfilAdministradorC(){
			$tablaBD = "administradores";
			$id = $_SESSION["id"];

			$resultado = AdministradorM::VerPerfilAdministradorM($tablaBD, $id);

			echo '<form method="post" enctype="multipart/form-data" autocomplete="off">

 					<div class="row">

 						<div class="col-md-6 col-xs-12">

 							<h2>Nombre:</h2>
 							<input type="text" class="input-lg" name="nombreA" value="'. $resultado["nombre"] .'">
 							<input type="hidden" class="input-lg" name="idA" value="'. $resultado["id"] .'">

 							<h2>Apellido:</h2>
 							<input type="text" class="input-lg" name="apellidoA" value="'. $resultado["apellido"] .'">

 							<h2>Usuario:</h2>
 							<input type="text" class="input-lg" name="usuarioA" value="'. $resultado["usuario"] .'">

 							<h2>Contraseña:</h2>
 							<input type="text" class="input-lg" name="claveA" value="'. $resultado["clave"] .'">

 						</div>

 						<div class="col-md-6 col-xs-12">
 							<br><br>

 							<input type="file" name="imgA"><br>';

 							if ($resultado["foto"] != "") {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive" width="200px;">';
 							} else {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive" width="200px;">';
 							}


 					echo    '<input type="hidden" name="imgActualA" value="'. $resultado["foto"] .'"><br><br>

 							<button type="submit" class="btn btn-success">Guardar Cambios</button>
 						</div>

 					</div>

 				  </form>';
		}


		# Actualizar Perfil Administrador
		public function ActualizarPerfilAdministradorC(){
			if (isset($_POST["idA"]) && !empty($_POST["nombreA"]) && !empty($_POST["apellidoA"]) && !empty($_POST["usuarioA"]) && !empty($_POST["claveA"])) {

				$rutaImg = $_POST["imgActualA"];

				date_default_timezone_set("America/La_Paz");

				# Verificamos si el archivo esta cargado file
				if (isset($_FILES["imgA"]["tmp_name"]) && !empty($_FILES["imgA"]["tmp_name"])) {

					# Verificamos si la ruta desde la BD no es blanco
					if (!empty($_POST["imgActualA"])) {

						# elimina el archivo de la ruta
						unlink($_POST["imgActualA"]);
					}

					# Verifica si el archivo cargado es de formato JPEG ó JPG
					if ($_FILES["imgA"]["type"] == "image/jpeg") {

						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Admin/A-" . $nombre . ".jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgA"]["tmp_name"]);
						imagejpeg($foto, $rutaImg);
					}

					# Verifica si el archivo cargado es de formato PNG
					if ($_FILES["imgA"]["type"] == "image/png") {

						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Admin/A-" . $nombre . ".png";
						$foto 		= imagecreatefrompng($_FILES["imgA"]["tmp_name"]);
						imagepng($foto, $rutaImg);
					}
				}

				$tablaBD = "administradores";
				$datosC = array("id" 		=> $_POST["idA"],
								"nombre" 	=> $_POST["nombreA"],
								"apellido" 	=> $_POST["apellidoA"],
								"usuario" 	=> $_POST["usuarioA"],
								"clave" 	=> $_POST["claveA"],
								"foto" 		=> $rutaImg);

				$resultado = AdministradorM::ActualizarPerfilAdministradorM($tablaBD, $datosC);

				# Actualizar Session
				$act_sess = AdministradorM::VerPerfilAdministradorM($tablaBD, $_POST["idA"]);

				if ($resultado == true) {

					# actualiza las $_SESSION del usuario logueado
					$_SESSION["usuario"] 		= $act_sess["usuario"];
					$_SESSION["clave"] 			= $act_sess["clave"];
					$_SESSION["nombre"] 		= $act_sess["nombre"];
					$_SESSION["apellido"] 		= $act_sess["apellido"];
					$_SESSION["foto"] 			= $act_sess["foto"];

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-Administrador";
						</script>';
				}
			}
		}

	}