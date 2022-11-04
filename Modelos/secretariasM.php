<?php

	require_once 'ConexionBD.php';

	class SecretariasM extends ConexionBD{

		# Login Secretaria
		static public function IngresarSecretariaM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("SELECT usuario, clave, nombre, apellido, foto, rol, id FROM $tablaBD WHERE usuario = :usuario");

			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

			$pdo->execute();
			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}

		# Mostrar el perfil Secretaria (datos)
		static public function VerPerfilSecretariaM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
			$pdo->bindParam(":id", $id, PDO::PARAM_INT);

			$pdo->execute();
			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}
	}