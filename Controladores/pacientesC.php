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

	}