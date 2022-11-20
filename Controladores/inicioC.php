<?php

	class InicioC{

		public function MostrarInicioC(){
			$tablaBD = "inicio";
			$id = "1";
			$resultado = InicioM::MostrarInicioM($tablaBD, $id);

			echo '<div class="box-body">

			          <div class="col-md-6 bg-primary" style="margin-top: 5%;">
			            <h1>Bienvenidos</h1>

			            <h3>'. $resultado["intro"] .'</h3>
			            <hr>

			            <h2>Horario:</h2>
			            <h3>Desde: '. $resultado["horarioE"] .'</h3>
			            <h3>Hasta: '. $resultado["horarioS"] .'</h3>
			            <hr>

			            <h2>Dirección:</h2>
			            <h3>'. $resultado["direccion"] .'</h3>
			            <hr>

			            <h2>Contactos:</h2>
			            <h3>Telefono: '. $resultado["telefono"] .' <br>Correo: '. $resultado["correo"] .'</h3>
			          </div>

			          <div class="col-md-6" style="margin-top: 5%;">
			            <img src="'. $resultado["logo"] .'" class="img-responsive">
			          </div>

			        </div>';
		}

		public function EditarInfoInicioC(){
			$tablaBD = "inicio";
			$id = "1";

			$resultado = InicioM::MostrarInicioM($tablaBD, $id);

			echo '<form method="post" enctype="multipart/form-data" autocomplete="off">

 					<div class="row">

 						<div class="col-md-6 col-xs-12">

 							<h2>Introduccion:</h2>
 							<input type="text" class="form-control" name="introI" placeholder="Escriba la Introducción" value="'. $resultado["intro"] .'">
 							<input type="hidden" class="form-control" name="idI" value="'. $resultado["id"] .'" required>

 							<h2>Horario:</h2>
 				 			Desde: <input type="time" name="hePerfil" class="input-lg" value="'.$resultado["horarioE"].'" required>&nbsp;&nbsp;
 				 			Hasta: <input type="time" name="hsPerfil" class="input-lg" value="'.$resultado["horarioS"].'" required><br><br>

 							<h2>Telefono:</h2>
 							<input type="text" class="form-control" name="telefonoI" placeholder="(+591)60001234" value="'. $resultado["telefono"] .'" required><br>

 							<h2>Email:</h2>
 							<input type="text" class="form-control" name="emailI" value="'. $resultado["correo"] .'" placeholder="Ejemplo@correo.com" required>
 							<br>


 						</div>

 						<div class="col-md-6 col-xs-12">

 							<h2>Direccion:</h2>
 							<input type="text" class="form-control" placeholder="Escriba su Dirección" name="direccionI" value="'. $resultado["direccion"] .'">

 							<div class="col-md-12 col-xs-12">
 								<div class="col-md-8 col-xs-12">

 									<h2>Logo:</h2><br>
 									<input type="file" name="imgIL">

 								</div>
 								<div class="col-md-4 col-xs-12">
 									<br><br>
 									<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["logo"] .'" class="img-responsive" width="100px;">
 									<input type="hidden" name="imgActualL" value="'. $resultado["logo"] .'">

 								</div>

 							</div>
 							<br>

 							<div class="col-md-12 col-xs-12">
 								<div class="col-md-8 col-xs-12">

 									<h2>Favicon:</h2><br>
 									<input type="file" name="imgIF">

 								</div>
 								<div class="col-md-4 col-xs-12">
 									<br><br>
 									<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["favicon"] .'" class="img-responsive" width="100px;">
 									<input type="hidden" name="imgActualF" value="'. $resultado["favicon"] .'">

 								</div>

 							</div>

 							<div class="col-md-12 col-xs-12">

 								<br>
 								<button type="submit" class="btn btn-success pull-right">Guardar Cambios</button>

 							<div>
 						</div>

 					</div>

 				</form>';
		}

		public function ActualizarInfoInicioC(){
			if (isset($_POST["idI"])) {

				$id = $_POST["idI"];
				$rutaImgL = $_POST["imgActualL"];
				$rutaImgF = $_POST["imgActualF"];

				#LOGO sí el input file, la imagem esta cargado  Y  no esta vacío
				if (isset($_FILES["imgIL"]["tmp_name"]) && !empty($_FILES["imgIL"]["tmp_name"])) {


					if (!empty($_POST["imgActualL"])) {


						unlink($_POST["imgActualL"]);
					}

					/*----------  PNG  ----------*/

					if ($_FILES["imgIL"]["type"] == "image/png") {
						$rutaImgL 	= "Vistas/img/logo.png";
						$foto 		= imagecreatefrompng($_FILES["imgIL"]["tmp_name"]);
						imagepng($foto, $rutaImgL);
					}

					/*----------  JPG  ----------*/

					if ($_FILES["imgIL"]["type"] == "image/jpeg") {
						$rutaImgL 	= "Vistas/img/logo.jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgIL"]["tmp_name"]);
						imagejpeg($foto, $rutaImgL);
					}
				}



				#FAVICON sí el input file, la imagem esta cargado  Y  no esta vacío
				if (isset($_FILES["imgIF"]["tmp_name"]) && !empty($_FILES["imgIF"]["tmp_name"])) {

					if (!empty($_POST["imgActualF"])) {

						unlink($_POST["imgActualF"]);
					}

					/*----------  PNG  ----------*/

					if ($_FILES["imgIF"]["type"] == "image/png") {
						$rutaImgF 	= "Vistas/img/favicon.png";
						$foto 		= imagecreatefrompng($_FILES["imgIF"]["tmp_name"]);
						imagepng($foto, $rutaImgF);
					}

					/*----------  JPG  ----------*/

					if ($_FILES["imgIF"]["type"] == "image/jpeg") {
						$rutaImgF 	= "Vistas/img/favicon.jpg";
						$foto 		= imagecreatefromjpeg($_FILES["imgIF"]["tmp_name"]);
						imagejpeg($foto, $rutaImgF);
					}
				}

				$tablaBD = "inicio";
				$datosC = array("id" 		=> $id,
								"intro" 	=> $_POST["introI"],
								"horarioE" 	=> $_POST["hePerfil"],
								"horarioS" 	=> $_POST["hsPerfil"],
								"telefono" 	=> $_POST["telefonoI"],
								"correo" 	=> $_POST["emailI"],
								"direccion" => $_POST["direccionI"],
								"logo" 		=> $rutaImgL,
								"favicon" 	=> $rutaImgF);

				$resultado = InicioM::ActualizarInfoInicioM($datosC, $tablaBD);

				if ($resultado == true) {

					echo '<script>
							window.location = "http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio";
						</script>';
				}
			}
		}

		public function faviconC(){
			$tablaBD = "inicio";
			$id = "1";
			$resultado = InicioM::MostrarInicioM($tablaBD, $id);
			echo '<link rel="shortcut icon" href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["favicon"] .'" type="image/x-icon">';
		}

	}