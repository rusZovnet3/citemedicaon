<?php

	require_once 'ConexionBD.php';

	class ConsultoriosM extends ConexionBD{

		static public function CrearConsultorioM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(nombre) VALUES (:nombre)");

			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}
	}