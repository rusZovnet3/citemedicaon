<?php

	require_once 'ConexionBD.php';

	class DoctoresM extends ConexionBD{

		static public function CrearDoctorM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD(id_consultorio,apellido,nombre,foto,usuario,clave,sexo,rol) VALUES (:id_consultorio, :apellido, :nombre, :foto, :usuario, :clave, :sexo, :rol)");

			$pdo->bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
			$pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
			$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
			$pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}
	}