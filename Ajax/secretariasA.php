<?php

	require_once '../Controladores/secretariasC.php';
	require_once '../Modelos/secretariasM.php';

	class SecretariasA{
		public $NoRepetirs;

		/*==========================================
		=            No repetir Usuario            =
		==========================================*/
		public function NoRepetirUsuarioSA(){
			$columna = "usuario";
			$valor = $this->NoRepetirs;
			$resultado 	= SecretariasC::VerSecretariasC($columna, $valor);
			echo json_encode($resultado);
		}


	}


	/*================================================
	=            OBJ - No repetir Usuario            =
	================================================*/
	if (isset($_POST["NoRepetirs"])) {
		$noRepeti = new SecretariasA();
		$noRepeti->NoRepetirs = $_POST["NoRepetirs"];
		$noRepeti->NoRepetirUsuarioSA();
	}


