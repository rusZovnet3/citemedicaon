<?php

	require_once '../Controladores/pacientesC.php';
	require_once '../Modelos/pacientesM.php';

	class PacientesA{
		public $Pid;
		public $Norepetir;

		/*=======================================
		=            Editar Paciente            =
		=======================================*/
		public function EPacienteA(){
			$columna 	= "id";
			$valor 		= $this->Pid;
			$resultado 	= PacientesC::VerPacientesC($columna, $valor);
			echo json_encode($resultado);
		}


		/*==========================================
		=            No repetir usuario            =
		==========================================*/
		public function NoRepetirUsuarioA(){
			$columna = "usuario";
			$valor = $this->Norepetir;
			$resultado 	= PacientesC::VerPacientesC($columna, $valor);
			echo json_encode($resultado);
		}


	}


	/*=============================================
	=            Ajax en JS => POST   ==== Editar =
	=============================================*/
	if (isset($_POST["Pid"])) {
		$editarP = new PacientesA();
		$editarP->Pid = $_POST["Pid"];
		$editarP->EPacienteA();
	}


	/*====================================================================
	=            Ajax en JS => POST   ==== No repetir usuario            =
	====================================================================*/
	if (isset($_POST["Norepetir"])) {
		$noRepet = new PacientesA();
		$noRepet->Norepetir = $_POST["Norepetir"];
		$noRepet->NoRepetirUsuarioA();
	}
