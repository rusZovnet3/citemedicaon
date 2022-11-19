<?php

	class SecretariasC{

		public function IngresarSecretariaC(){

			if (isset($_POST["usuario-Ing"])) {

				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

					$tablaBD = "secretarias";
					$datosC = array("usuario" 	=> $_POST["usuario-Ing"],
									"clave" 	=> $_POST["clave-Ing"]);

					$resultado = SecretariasM::IngresarSecretariaM($tablaBD, $datosC);

					if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
						# code...
						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] 		= $resultado["id"];
						$_SESSION["usuario"] 	= $resultado["usuario"];
						$_SESSION["clave"] 		= $resultado["clave"];
						$_SESSION["nombre"] 	= $resultado["nombre"];
						$_SESSION["apellido"] 	= $resultado["apellido"];
						$_SESSION["foto"] 		= $resultado["foto"];
						$_SESSION["rol"] 		= $resultado["rol"];

						echo '<script>
									window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio";
								</script>';
					}else{
						echo '<br><div class="alert alert-danger text-center">Error al Ingresar</div>';
					}
				}
			}

		}

		public function VerPerfilSecretariaC(){
			$tablaBD 	= "secretarias";
			$id 		= $_SESSION["id"];
			$resultado 	= SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

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
 						<a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-S/'. $resultado["id"] .'">
 							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
 						</a>
 					</td>
 				</tr>';
		}

		public function EditarPerfilSecretariaC(){
			$tablaBD 	= "secretarias";
			$id 		= $_SESSION["id"];
			$resultado 	= SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

			echo '<form method="post" enctype="multipart/form-data" autocomplete="off">

 					<div class="row">

 						<div class="col-md-6 col-xs-12">

 							<h2>Nombre:</h2>
 							<input type="text" class="input-lg" name="nombreP" value="'. $resultado["nombre"] .'">
 							<input type="hidden" class="input-lg" name="idP" value="'. $resultado["id"] .'">

 							<h2>Apellido:</h2>
 							<input type="text" class="input-lg" name="apellidoP" value="'. $resultado["apellido"] .'">

 							<h2>Usuario:</h2>
 							<input type="text" class="input-lg" name="usuarioP" value="'. $resultado["usuario"] .'">

 							<h2>Contraseña:</h2>
 							<input type="password" class="input-lg" name="claveP" value="'. $resultado["clave"] .'">

 						</div>

 						<div class="col-md-6 col-xs-12">
 							<br><br>

 							<input type="file" name="imgP"><br>';

 							if ($resultado["foto"] != "") {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive" width="200px;">';
 							} else {
 								echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive" width="200px;">';
 							}


 					echo    '<input type="hidden" name="imgActual" value="'. $resultado["foto"] .'"><br><br>

 							<button type="submit" class="btn btn-success">Guardar Cambios</button>
 						</div>

 					</div>

 				  </form>';
		}


		public function ActualizarPerfilSecretariaC(){

			if (isset($_POST["idP"])) {

				$rutaImg = $_POST["imgActual"];

				date_default_timezone_set("America/La_Paz");

				# Verificamos si el archivo esta cargado file
				if (isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])) {

					# Verificamos si la ruta desde la BD no es blanco
					if (!empty($_POST["imgActual"])) {

						# elimina el archivo de la ruta
						unlink($_POST["imgActual"]);
					}

					# Verifica si el archivo cargado es de formato JPEG ó JPG
					if ($_FILES["imgP"]["type"] == "image/jpeg") {

						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Secretarias/S-" . $nombre . ".jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgP"]["tmp_name"]);
						imagejpeg($foto, $rutaImg);
					}

					# Verifica si el archivo cargado es de formato PNG
					if ($_FILES["imgP"]["type"] == "image/png") {

						$nombre 	= date("dmY_His_") . mt_rand(10, 999);
						$rutaImg 	= "Vistas/img/Secretarias/S-" . $nombre . ".png";
						$foto 		= imagecreatefrompng($_FILES["imgP"]["tmp_name"]);
						imagepng($foto, $rutaImg);
					}
				}

				$tablaBD = "secretarias";
				$datosC = array("id" 		=> $_POST["idP"],
								"usuario" 	=> $_POST["usuarioP"],
								"clave" 	=> $_POST["claveP"],
								"nombre" 	=> $_POST["nombreP"],
								"apellido" 	=> $_POST["apellidoP"],
								"foto" 		=> $rutaImg);


				$resultado = SecretariasM::ActualizarPerfilSecretariaM($tablaBD, $datosC);

				# Actualizar las $_SESSION del logueado sus atributos
				$act_sess = SecretariasM::VerPerfilSecretariaM($tablaBD, $_POST["idP"]);

				if ($resultado == true) {

					# actualiza las $_SESSION del usuario logueado
					$_SESSION["usuario"] 	= $act_sess["usuario"];
					$_SESSION["clave"] 		= $act_sess["clave"];
					$_SESSION["nombre"] 	= $act_sess["nombre"];
					$_SESSION["apellido"] 	= $act_sess["apellido"];
					$_SESSION["foto"] 		= $act_sess["foto"];

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/perfil-Secretaria";
						</script>';
				}
			}
		}

		static public function VerSecretariasC($columna, $valor){
			$tablaBD = "secretarias";
			$resultado = SecretariasM::VerSecretariasM($tablaBD, $columna, $valor);
			return $resultado;
		}


		public function CrearSecretariaC(){
			if (isset($_POST["nombre"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["usuario"]) && !empty($_POST["clave"])) {

				$tablaBD = "secretarias";
				$datosC = array("usuario" 	=> $_POST["usuario"],
								"clave" 	=> $_POST["clave"],
								"nombre" 	=> $_POST["nombre"],
								"apellido" 	=> $_POST["apellido"]);

				$resultado = SecretariasM::CrearSecretariaM($tablaBD, $datosC);

				if ($resultado == true) {

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/secretarias";
						</script>';
				}
			}
		}

		public function EliminarSecretariaC(){
			if (isset($_GET["AAid"])) {

				$id = $_GET["AAid"];
				$tablaBD = "secretarias";

				if ($_GET["AAimg"] != "") {
					unlink($_GET["AAimg"]);
				}

				$resultado = SecretariasM::EliminarSecretariaM($tablaBD, $id);

				if ($resultado == true) {

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/secretarias";
						</script>';
				}
			}
		}
	}