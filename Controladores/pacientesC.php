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

	}