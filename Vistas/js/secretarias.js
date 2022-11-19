//Mostrar GET
$(".DT").on("click", ".EliminarSecretaria", function(){
	let AAid 	= $(this).attr("AAid");
	let AAimg 	= $(this).attr("AAimg");
	window.location = "index.php?url=secretarias&AAid=" + AAid + "&AAimg=" + AAimg;
});

/*----------  Evitar repetir usuario (Secretaria) al Insertar  ----------*/
$("#usuarioS").change(function(){

	//al ingresar un dato diferente, se removera la alerta div
	$(".alert").remove();

	let usuario = $(this).val();
	let datos 	= new FormData();

	datos.append("NoRepetirs", usuario);

	$.ajax({
		url: "Ajax/secretariasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			if (resultado) {
				//   after() solo el input padre, hacia abajo mostrara una alerta
				$("#usuarioS").parent().after('<div class="alert alert-danger">El Usuario ya existe</div>');
				$("#usuarioS").val("");
			}


		}
	});
});