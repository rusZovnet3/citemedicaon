<?php
	require_once '../Controladores/doctoresC.php';
	require_once '../Modelos/doctoresM.php';

	require_once '../Controladores/consultoriosC.php';
	require_once '../Modelos/consultoriosM.php';

	class DoctoresA{
		public $Did;
		public $Cid;

		/*=====================================
		=            Editar Doctor            =
		=====================================*/
		public function EDoctorA(){
			$columna 	= "id";
			$valor 		= $this->Did;
			$resultado 	= DoctoresC::VerDoctoresC($columna, $valor);

			echo json_encode($resultado);
		}


		/*===========================================
		=            Mostrar Consultorio            =
		===========================================*/
		public function EMostrarConsultorioA(){
			$columna 	= "id";
			$valor 		= $this->Cid;
			$resultado 	= ConsultoriosC::VerConsultoriosC($columna, $valor);

			echo json_encode($resultado);
		}


	}



	/*==============================================
	=            Objeto - Editar Doctor            =
	==============================================*/
	if (isset($_POST["Did"])) {
		$editD_A = new DoctoresA();
		$editD_A->Did = $_POST["Did"];
		$editD_A->EDoctorA();
	}


	/*==============================================
	=    Objeto - Mostrar Nombre Consultorio       =
	==============================================*/
	if (isset($_POST["consultorio"])) {
		$editMost = new DoctoresA();
		$editMost->Cid = $_POST["consultorio"];
		$editMost->EMostrarConsultorioA();
	}
