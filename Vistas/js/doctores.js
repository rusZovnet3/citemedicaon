
/*Editar Doctor  :::  button editar del listado*/
$(".DT").on("click", ".EditarDoctor", function(){
	let Did = $(this).attr("Did");
	let datos = new FormData();

	datos.append("Did", Did);

	$.ajax({
		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,
		success: function(resultado){
			$("#DidE").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#sexoE").val(resultado["sexo"]);
			$("#sexoE").html(resultado["sexo"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);
			$("#consultorioE").val(resultado["id_consultorio"]);

			/*====Incio :::  mostrar nombre del consultorio  ====*/
			let datosConsul = new FormData();

			datosConsul.append("consultorio", resultado["id_consultorio"]);

			$.ajax({
				url: "Ajax/doctoresA.php",
				method: "POST",
				data: datosConsul,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
					$("#consultorioE").html(respuesta["nombre"]);
				}
			});

			/*====Fin :::  mostrar nombre del consultorio  ====*/
		}
	});
});