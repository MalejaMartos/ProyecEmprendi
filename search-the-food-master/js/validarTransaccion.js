//archivo encargado de validar las transacciones usando la libreria jquery 
$(document).on('ready',cargar());
//función encargada de agregar los eventos de submit a los formularios 
function cargar(){
	//se agrega el evento de submit al formulario, lo que quiere decir que ya se dio click en el botón
	//por lo tanto se debe validar el registro del cliente 
	$("#formCliente").on('submit',validarRegistroCliente);
	
}
function validarRegistroCliente(){
	//variable la cual contiene los valores de los campos usuario, correo y clave en formato JSON
	var entrada = {
		"usuario" : $("#usuario").val(),
		"correo" : $("#correo").val(),
		"password" : $("#password").val()
	}

	$.ajax({
		type: 'post',
		url: 'registroCliente.php',
		//url: 'validarEmail.php',
		data: entrada
	})
	.done(function(data){
		//en el div agrego si es satisfactorio el registro o no
		$("#divRespuestaRegistro").html(data);
		//limpio el campo de usuario
		$("#usuario").val("");
		//limpio el campo de correo
		$("#correo").val("");
		//limpio el campo de password
		$("#password").val("");
	})
	//Cancelo la accion del evento de recargar la página (evento submit)
	event.preventDefault();
}

