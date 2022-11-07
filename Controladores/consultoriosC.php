<?php

	class ConsultoriosC{

		public function CrearConsultorioC(){

			if (isset($_POST["consultorioN"])) {
				$tablaBD 	= "consultorios";
				$datosC 	= array("nombre" => $_POST["consultorioN"]);

				$resultado	= ConsultoriosM::CrearConsultorioM($tablaBD, $datosC);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/consultorios";
							</script>';
				}
			}
		}

		static public function VerConsultoriosC($columna, $valor){
			$tablaBD 	= "consultorios";
			$resultado 	= ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);
			return $resultado;
		}
	}