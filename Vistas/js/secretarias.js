//Mostrar GET
$(".DT").on("click", ".EliminarSecretaria", function(){
	let AAid 	= $(this).attr("AAid");
	let AAimg 	= $(this).attr("AAimg");
	window.location = "index.php?url=secretarias&AAid=" + AAid + "&AAimg=" + AAimg;
});