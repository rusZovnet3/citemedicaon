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

		public function BorrarConsultorioC(){

			if (substr($_GET["url"], 13)) {
				$tablaBD = "consultorios";
				$id = substr($_GET["url"], 13);

				$resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $id);

				if ($resultado == true) {
					echo '<script>
								window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/consultorios";
							</script>';
				}
			}

		}

		public function EditarConsultoriosC(){
			$tablaBD 	= "consultorios";
			$valor 		= substr($_GET["url"], 4);

			$resultado	= ConsultoriosM::VerConsultoriosM($tablaBD, "id", $valor);

			echo '<div class="form-group">
						<h2>Nombre:</h2>
 				  		<input type="text" name="consultorioE" value="'. $resultado["nombre"] .'" class="form-control input-lg">
 				  		<input type="hidden" name="Cid" value="'. $resultado["id"] .'" class="form-control input-lg"><br>

 				  	<button type="submit" class="btn btn-success">Guardar Cambios</button>

 				  </div>';

		}
	}