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


		static public function ActualizarInfoInicioM($datosC, $tablaBD){
			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET intro = :intro, horarioE = :horarioE, horarioS = :horarioS, telefono = :telefono, correo = :correo, direccion = :direccion, logo = :logo, favicon = :favicon WHERE id = :id");

			$pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo->bindParam(":intro", $datosC["intro"], PDO::PARAM_STR);
			$pdo->bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
			$pdo->bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);
			$pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
			$pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
			$pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
			$pdo->bindParam(":logo", $datosC["logo"], PDO::PARAM_STR);
			$pdo->bindParam(":favicon", $datosC["favicon"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}

	}