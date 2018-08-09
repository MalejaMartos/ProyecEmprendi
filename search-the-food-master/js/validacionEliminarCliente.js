$(document).on('ready',cargar());
//función encargada de agregar los eventos de submit a los formularios 
function cargar(){
	//se agrega el evento de submit al formulario, lo que quiere decir que ya se dio click en el botón
	//por lo tanto se debe validar el registro del cliente
	cargarCliente(); 
	$("#eliminarCliente").on('submit',eliminarCliente);
}
function eliminarCliente(){
	var confirmacion=confirm('Esta seguro de eliminar al cliente?');
	if(confirmacion){
		var entrada = {
			'correo': $('#selectCliente').val(),
			'clave' : $('#passwordA').val()
		}
	
		$.ajax({
			type: 'post',
			url: 'eliminarCliente.php',
			data: entrada
		})
		.done(function(data){
			$('#passwordA').val("");
			alert(data);
			location.reload();

		})
	}
	event.preventDefault();
		
}

function cargarCliente(){
	$.ajax({
		type: 'post',
		url: 'cargarCliente.php',
	})
	.done(function(data){
		$("#selectCliente").html(data);
		

	})
}
	
