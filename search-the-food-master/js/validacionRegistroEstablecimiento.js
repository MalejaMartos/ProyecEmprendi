
$(document).on('ready',cargar());
//función encargada de agregar los eventos de submit a los formularios 
function cargar(){

	//se agrega el evento de submit al formulario, lo que quiere decir que ya se dio click en el botón
	//por lo tanto se debe validar el registro del cliente
	cargarTipoComida(); 
	$("#registrarEstablecimiento").on('submit',validarRegistroEstablecimiento);
	
	//Cancelo la accion del evento de recargar la página (evento submit)
	//event.preventDefault();

}	


function validarRegistroEstablecimiento(){
	//variable la cual contiene los valores de los campos usuario, correo y clave en formato JSON
	var entrada = {
		"nombre" : $("#nombreEstablecimiento").val(),
		"tipoComida" : $("#tipoComida").val(),
		"descripcionHorario" : $("#horario").val(),
		"latitud" : $("#latitud").val(),
		"longitud": $("#longitud").val(),
		"telefono" : $("#telefono").val(),
		"sitioWeb" : $("#sitioWeb").val(),
		"descripcionDireccion" : $("#direccion").val()
	}
	
	$.ajax({
		type: 'post',
		url: 'registroEstablecimiento.php',
		data: entrada
	})
	.done(function(data){
		if (data != 0){ 
			$("#nombre").val("");
			$("#botonRegistrar").val(data);
			$("#botonRegistrar").css('background-color','#07FD5E');
			$('#botonRegistrar').attr("disabled", true);
		}else{
			$("#botonRegistrar").val("Llene todos los campos");
		}
	})
	event.preventDefault();
}
	
function cargarTipoComida(){
	
	$.ajax({
		type: 'post',
		url: 'consultarTipoComida.php',
	})
	.done(function(data){
		$("#tipoComida").html(data);
	})
}
	
