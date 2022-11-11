<?php

	require_once '../Controladores/pacientesC.php';
	require_once '../Modelos/pacientesM.php';

	class PacientesA{
		public $Pid;

		/*=======================================
		=            Editar Paciente            =
		=======================================*/
		public function EPacienteA(){
			$columna 	= "id";
			$valor 		= $this->Pid;
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
