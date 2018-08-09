$(document).on('ready',cargar());
//función encargada de agregar los eventos de submit a los formularios 
function cargar(){
	//se agrega el evento de submit al formulario, lo que quiere decir que ya se dio click en el botón
	//por lo tanto se debe validar 
	cargarEstablecimiento(); 
	$("#eliminarEstablecimiento").on('submit',eliminarEstablecimiento);
}
function eliminarEstablecimiento(){
	var confirmacion=confirm('Esta seguro de eliminar el establecimiento?');
	if(confirmacion){
		var entrada = {
			'id': $('#selectEstablecimiento').val(),
			'clave' : $('#passwordAdm').val()
		}
	
		$.ajax({
			type: 'post',
			url: 'eliminarEstablecimiento.php',
			data: entrada
		})
		.done(function(data){
			$('#passwordAdm').val("");
			alert(data);
			location.reload();
		})
	}
	event.preventDefault();
		
}

function cargarEstablecimiento(){
	$.ajax({
		type: 'post',
		url: 'cargarEstablecimiento.php',
	})
	.done(function(data){
		$("#selectEstablecimiento").html(data);
		

	})
}
	
