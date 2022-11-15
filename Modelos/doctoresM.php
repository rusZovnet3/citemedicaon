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


		static public function EliminarDoctorM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

			$pdo->bindParam(":id", $id, PDO::PARAM_INT);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}

		# Inciar Session Doctores
		static public function IngresarDoctorM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE usuario = :usuario");

			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);

			$pdo->execute();

			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}


		# Mostrar Perfil
		static public function VerPerfilDoctorM($tablaBD, $id){
			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");
			$pdo->bindParam(":id", $id, PDO::PARAM_INT);
			$pdo->execute();

			return $pdo->fetch();

			$pdo->close();
			$pdo = null;
		}


		# Actualizar Perfil Doctor
		static public function ActualizarPerfilDoctorM($tablaBD, $datosC){
			$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, nombre = :nombre, usuario = :usuario, clave = :clave, foto = :foto, id_consultorio = :id_consultorio, horarioE = :horarioE, horarioS = :horarioS WHERE id = :id");

			$pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
			$pdo->bindParam(":id_consultorio", $datosC["consultorio"], PDO::PARAM_INT);
			$pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
			$pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
			$pdo->bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
			$pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_STR);
			$pdo->bindParam(":horarioE", $datosC["horarioE"], PDO::PARAM_STR);
			$pdo->bindParam(":horarioS", $datosC["horarioS"], PDO::PARAM_STR);
			$pdo->bindParam(":foto", $datosC["foto"], PDO::PARAM_STR);

			if ($pdo->execute()) {
				return true;
			}else{
				return false;
			}

			$pdo->close();
			$pdo = null;
		}


	}