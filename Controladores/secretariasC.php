<?php

	class SecretariasC{

		public function IngresarSecretariaC(){

			if (isset($_POST["usuario-Ing"])) {

				if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])) {

					$tablaBD = "secretarias";
					$datosC = array("usuario" 	=> $_POST["usuario-Ing"],
									"clave" 	=> $_POST["clave-Ing"]);

					$resultado = SecretariasM::IngresarSecretariaM($tablaBD, $datosC);

					if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
						# code...
						$_SESSION["Ingresar"] = true;

						$_SESSION["id"] 		= $resultado["id"];
						$_SESSION["usuario"] 	= $resultado["usuario"];
						$_SESSION["clave"] 		= $resultado["clave"];
						$_SESSION["nombre"] 	= $resultado["nombre"];
						$_SESSION["apellido"] 	= $resultado["apellido"];
						$_SESSION["foto"] 		= $resultado["foto"];
						$_SESSION["rol"] 		= $resultado["rol"];

						echo '<script>
									window.location = "inicio";
								</script>';
					}else{
						echo '<br><div class="alert alert-danger text-center">Error al Ingresar</div>';
					}
				}
			}

		}

		public function VerPerfilSecretariaC(){
			$tablaBD 	= "secretarias";
			$id 		= $_SESSION["id"];
			$resultado 	= SecretariasM::VerPerfilSecretariaM($tablaBD, $id);

			echo '<tr>
 					<td>'. $resultado["usuario"] .'</td>
 					<td>'. $resultado["clave"] .'</td>
 					<td>'. $resultado["nombre"] .'</td>
 					<td>'. $resultado["apellido"] .'</td>
 					<td>';

 						if ($resultado["foto"] == "" || $resultado["foto"] == null) {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						} else {
 							echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $resultado["foto"] .'" class="img-responsive center-block" width="40px" height="40px" alt="Foto Perfil">';
 						}


 			echo   '</td>
 					<td>
 						<a href="#">
 							<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
 						</a>
 					</td>
 				</tr>';
		}
	}