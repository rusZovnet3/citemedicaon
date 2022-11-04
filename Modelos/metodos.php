<?php

	class Metodos{

		/*-------ENCRIPTAR CADENAS----------*/

		public function encryption($string){
			$output = false;
			$key = hash('sha256', '$CITASMO@2022');
			$iv = substr(hash('sha256', "037970"), 0, 16);
			$output = openssl_encrypt($string, "AES-256-CBC", $key, 0, $iv);
			$output = base64_encode($output);
			return $output;
		}

		/*-------DESENCRIPTAR CADENAS----------*/

		protected static function decryption($string){
			$key = hash('sha256', '$CITASMO@2022');
			$iv = substr(hash('sha256', "037970"), 0, 16);
			$output = openssl_decrypt(base64_decode($string), "AES-256-CBC", $key, 0, $iv);
			return $output;
		}
	}