<?php
	require_once '../Controladores/doctoresC.php';
	require_once '../Modelos/doctoresM.php';

	require_once '../Controladores/consultoriosC.php';
	require_once '../Modelos/consultoriosM.php';

	class DoctoresA{
		public $Did;
		public $Cid;
		public $NoRepetird;
		public $NomCons;

		public $NoRepetirdm;
		/*public $NoRepetirdmID;*/
		/*$NoRepetirdm 	= $_REQUEST["NoRepetirdm"];
		$NoRepetirdmID 	= $_REQUEST["NoRepetirdmID"];*/

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

		/*==========================================
		=            No repetir usuario            =
		==========================================*/
		public function NoRepetirUsuarioA(){
			$columna = "usuario";
			$valor = $this->NoRepetird;
			$resultado 	= DoctoresC::VerDoctoresC($columna, $valor);
			echo json_encode($resultado);
		}


		/*==========================================
		=            No repetir usuario Modificar  =
		==========================================*/
		public function NoRepetirUsuarioAM(){
			$columna = "usuario";
			$valor = $this->NoRepetirdm;
			/*$id = $this->NoRepetirdmID;
			$resultado 	= DoctoresC::ExcepVerDoctoresC($columna, $valor, $id);*/
			$resultado 	= DoctoresC::VerDoctoresC($columna, $valor);
			echo json_encode($resultado);
		}

		/*==========================================
		=            No repetir consultorio        =
		==========================================*/
		public function NoRepetirConsultorioA(){
			$columna = "nombre";
			$valor = $this->NomCons;
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

	/*====================================================================
	=            Ajax en JS => POST   ==== No repetir usuario            =
	====================================================================*/
		if (isset($_POST["NoRepetird"])) {
		$noRepetd = new DoctoresA();
		$noRepetd->NoRepetird = $_POST["NoRepetird"];
		$noRepetd->NoRepetirUsuarioA();
	}

	/*====================================================================
	=            Ajax en JS => POST   ==== No repetir usuarioM           =
	====================================================================*/
		if (isset($_POST["NoRepetirdm"])) {
		$noRepetdm = new DoctoresA();
		$noRepetdm->NoRepetirdm = $_POST["NoRepetirdm"];
		/*$noRepetdm->NoRepetirdmID = $_POST["NoRepetirdmID"];*/
		$noRepetdm->NoRepetirUsuarioAM();
	}

	/*====================================================================
	=            Ajax en JS => POST   ==== No repetir consultorio        =
	====================================================================*/
		if (isset($_POST["NomCons"])) {
		$noRepetc = new DoctoresA();
		$noRepetc->NomCons = $_POST["NomCons"];
		$noRepetc->NoRepetirConsultorioA();
	}
