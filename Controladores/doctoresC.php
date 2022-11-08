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

	}