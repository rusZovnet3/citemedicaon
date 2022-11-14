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

	}