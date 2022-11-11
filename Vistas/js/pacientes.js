/*=========================================
=            Mostrar id por GET           =
=========================================*/

$(".DT").on("click", ".EliminarPaciente", function(){
	let Pid 	= $(this).attr("Pid");
	let imgP 	= $(this).attr("imgP");
	window.location = "index.php?url=pacientes&Pid=" + Pid + "&imgP=" + imgP;
});


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
