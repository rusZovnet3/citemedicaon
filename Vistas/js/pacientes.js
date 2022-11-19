/*=========================================
=            P A C I E N T E S            =
=========================================*/

/*-------Mostrar id por GET--------*/
$(".DT").on("click", ".EliminarPaciente", function(){
	let Pid 	= $(this).attr("Pid");
	let imgP 	= $(this).attr("imgP");
	window.location = "index.php?url=pacientes&Pid=" + Pid + "&imgP=" + imgP;
});

/*-------Editar por Ajax--------*/
$(".DT").on("click",".EditarPaciente", function(){
	let Pid 	= $(this).attr("Pid");
	let datos 	= new FormData();

	datos.append("Pid", Pid);

	$.ajax({
		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			$("#Pid").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#documentoE").val(resultado["documento"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

		}
	});
});


/*----------  Evitar repetir usuario (Pacientes) al Insertar  ----------*/
$("#usuario").change(function(){

	//al ingresar un dato diferente, se removera la alerta div
	$(".alert").remove();

	let usuario = $(this).val();
	let datos 	= new FormData();

	datos.append("Norepetir", usuario);

	$.ajax({
		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			if (resultado) {
				//   after() solo el input padre, hacia abajo mostrara una alerta
				$("#usuario").parent().after('<div class="alert alert-danger">El Usuario ya existe</div>');
				$("#usuario").val("");
			}


		}
	});
});


/*=====  End of P A C I E N T E S  ======*/


/*==================================================
= 		           D O C T O R E S                 =
==================================================*/

/*----------  Evitar repetir usuario (Doctores) al Insertar  ----------*/
$("#usuarioI").change(function(){

	//al ingresar un dato diferente, se removera la alerta div
	$(".alert").remove();

	let usuario = $(this).val();
	let datos 	= new FormData();

	datos.append("NoRepetird", usuario);

	$.ajax({
		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			if (resultado) {
				//   after() solo el input padre, hacia abajo mostrara una alerta
				$("#usuarioI").parent().after('<div class="alert alert-danger">El Usuario ya existe</div>');
				$("#usuarioI").val("");
			}


		}
	});
});

/*----------  Evitar repetir usuario (Doctores) al Modificar  ----------*/
$("#usuarioE").change(function(){

	//al ingresar un dato diferente, se removera la alerta div
	$(".alert").remove();

	/*let NoRepetirdm = $(this).val();
	let NoRepetirdmID = $("#DidE").val();*/
	let usuario = $(this).val();
	/*let id = $("#DidE").val();*/
	let datos 	= new FormData();
	/*let datos1 	= new FormData();*/

	datos.append("NoRepetirdm", usuario);
	/*datos1.append("NoRepetirdmID", id);*/
	/*datos.append("NoRepetirdm" usuario,"NoRepetirdmID", id);*/

	$.ajax({
		url: "Ajax/doctoresA.php",
		method: "POST",
		/*data: {NoRepetirdm: NoRepetirdm, NoRepetirdmID: NoRepetirdmID},*/
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			if (resultado) {
				//   after() solo el input padre, hacia abajo mostrara una alerta
				$("#usuarioE").parent().after('<div class="alert alert-danger">Escriba nuevo Usuario</div>');
				$("#usuarioE").val("");
			}else {
			}


		}
	});
});

/*===========  End of D O C T O R E S  ===========*/


/*===============================================
=            C O N S U L T O R I O S            =
===============================================*/

/*----------  Evitar repetir nombre (Consultorios) al Insertar  ----------*/
$("#consultorioI").change(function(){

	//al ingresar un dato diferente, se removera la alerta div
	$(".alert").remove();

	let usuario = $(this).val();
	let datos 	= new FormData();

	datos.append("NomCons", usuario);

	$.ajax({
		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		success: function(resultado){

			if (resultado) {
				//   after() solo el input padre, hacia abajo mostrara una alerta
				$("#consultorioI").after('<div class="alert alert-danger text-center">Este nombre ya existe</div>');
				$("#consultorioI").val("");
			}


		}
	});
});


/*=====  End of C O N S U L T O R I O S  ======*/