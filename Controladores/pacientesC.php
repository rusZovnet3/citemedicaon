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

	}