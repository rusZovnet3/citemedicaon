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

	}