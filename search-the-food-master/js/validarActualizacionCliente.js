//archivo encargado de validar las transacciones usando la libreria jquery 
$(document).on('ready',cargar());

function cargar(){
	llenarCampos();
	$('#formCliente').on('submit',actualizarDatos);
}

function llenarCampos(){
	$.ajax({
		type: 'post',
		url: 'llenarCamposCliente.php',
	})
	.done(function(data){
		var res = data.split(",");
		//is admin true = 1 : = 0
		if(res[3].localeCompare("1") == 0){
			$("#isAdmin").text("Administrador");
		}else{
			$("#isAdmin").text("Cliente");
		}
		//Colocamos el Email
		$("#yourEmail").text('Tu email es: '+res[0]);
		
		//Colocamos el Email
		$("#usuario").val(res[1]);
	})
}

function actualizarDatos(){
	//variable la cual contiene los valores de los campos usuario, correo y claveNueva en formato JSON
	var entrada = {
		"usuario" : $("#usuario").val(),
		"password" : $("#password").val(),
		"passwordN" : $("#passwordN").val()
	}
	$.ajax({
		type: 'post',
		url: 'validarActualizacionCliente.php',
		//url: 'validarEmail.php',
		data: entrada
	})
	.done(function(data){
		$('#actualizarDatos').val(data);
		$('#actualizarDatos').css('background-color','#07FD5E');
		$('#actualizarDatos').attr("disabled", true);

		
	})
	//Cancelo la accion del evento de recargar la página (evento submit)
	event.preventDefault();
	

}


