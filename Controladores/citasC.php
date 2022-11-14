<?php

	class CitasC{

		# Guardar Citas desde del Modal Calendario - del Paciente
		public function EnviarCitaC(){
			if (isset($_POST["Did"])) {

				$tablaBD = "citas";
				# id del Doctor --- url GET
				$Did 	= substr($_GET["url"], 7);

				$datosC = array("Did" 			=> $_POST["Did"],
								"Pid" 			=> $_POST["Pid"],
								"Cid" 			=> $_POST["Cid"],
								"nyaC" 			=> $_POST["nyaC"],
								"documentoC" 	=> $_POST["documentoC"],
								"fyhIC" 		=> $_POST["fyhIC"],
								"fyhFC" 		=> $_POST["fyhFC"]);

				$resultado = CitasM::EnviarCitaM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Doctor/"'. $Did .';
							</script>';
				}
			}
		}


		static public function VerCitasC(){
			$tablaBD 	= "citas";
			$resultado 	= CitasM::VerCitasM($tablaBD);
			return $resultado;
		}

	}