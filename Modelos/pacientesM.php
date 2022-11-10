<?php

	require_once 'ConexionBD.php';

	class PacientesM extends ConexionBD{

		static public function CrearPacienteM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre,apellido,documento,usuario,clave) VALUES (:nombre, :apellido, :documento, :usuario, :clave)");

			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo->bindParam(":documento", $datosC["documento"], PDO::PARAM_STR);
			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
			$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}

	}