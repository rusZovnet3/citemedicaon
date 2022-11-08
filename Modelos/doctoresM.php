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


		static public function VerDoctoresM($tablaBD, $columna, $valor){
			if ($columna == null) {
				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");
				$pdo->execute();
				return $pdo->fetchAll();
			}else{
				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
				$pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
				$pdo->execute();
				return $pdo->fetch();
			}


			$pdo->close();
			$pdo = null;
		}


		static public function ActualizarDoctorM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, usuario = :usuario, clave = :clave, sexo = :sexo, id_consultorio = :id_consultorio WHERE id = :id");

			$pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo->bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
			$pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
			$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}
	}