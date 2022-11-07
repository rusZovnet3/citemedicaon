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

	}