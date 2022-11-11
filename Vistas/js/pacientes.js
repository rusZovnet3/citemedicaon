/*=========================================
=            Mostrar id por GET           =
=========================================*/

$(".DT").on("click", ".EliminarPaciente", function(){
	let Pid 	= $(this).attr("Pid");
	let imgP 	= $(this).attr("imgP");
	window.location = "index.php?url=pacientes&Pid=" + Pid + "&imgP=" + imgP;
});
