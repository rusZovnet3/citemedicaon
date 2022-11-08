
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



/*Eliminar Doctor por GET  --- button eliminar del listado*/
$(".DT").on("click", ".EliminarDoctor", function(){
	let Did 	= $(this).attr("Did");
	let imgD 	= $(this).attr("imgD");

	window.location = "index.php?url=doctores&Did=" + Did + "&imgD=" + imgD;
});



/*Pluggins DataTables*/
$(".DT").DataTable({
	"language": {

		"sSearch": "Buscar:",
		"sEmptyTable": "No hay datos en la Tabla",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
		"SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
		"oPaginate": {

			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"

		},

		"sLoadingRecords": "Cargando...",
		"sLengthMenu": "Mostrar _MENU_ registros"
	},
	/*"bDestroy": true,*/
	"iDisplayLength": 4,	//Paginacion
	"order": [[0, "asc"]]
});