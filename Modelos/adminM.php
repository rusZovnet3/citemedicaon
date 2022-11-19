<?php

	require_once 'ConexionBD.php';

	class AdministradorM extends ConexionBD{

		# Iniciar session Administrador
		static public function IngresarAdministradorM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

			$pdo->execute();

			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}

		# Vista Perfil Administrador y Editar
		static public function VerPerfilAdministradorM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
			$pdo->bindParam(":id", $id, PDO::PARAM_INT);

			$pdo->execute();
			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}

	}