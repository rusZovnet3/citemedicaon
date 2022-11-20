<?php

	require_once 'ConexionBD.php';

	class InicioM extends ConexionBD{

		# Iniciar session Administrador
		static public function MostrarInicioM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("SELECT *FROM $tablaBD WHERE id = :id");
			$pdo->bindParam(":id", $id, PDO::PARAM_INT);
			$pdo->execute();

			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}


		/*static public function EditarInfoInicioM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET intro = :intro,horarioE = :horarioE,horarioS = :horarioS,telefono = :telefono,correo = :correo,direccion = :direccion,logo = :logo,favicon = :favicon WHERE id = :id");

			$pdo->bindParam(":id_consultorio", $datosC["id_consultorio"], PDO::PARAM_INT);
			$pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);
			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
			$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
			$pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
		}*/

	}