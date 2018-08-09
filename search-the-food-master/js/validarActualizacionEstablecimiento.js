//archivo encargado de validar las transacciones usando la libreria jquery 
$(document).on('ready',cargar());
var estaCargada = false;

function cargar(){
	cargarEstablecimiento();
	$('#establecimiento').on('change',agregarCampos);
	$('#actualizarEstablecimiento').on('submit',actualizarDatos);
}

function cargarEstablecimiento(){
	$.ajax({
		type: 'post',
		url: 'consultarEstablecimiento.php',
	})
	.done(function(data){
		var opcionDefault = $("<option id='opcionD' selected='selected'>Seleccione una opcion...</option>");
		$("#establecimiento").html(data);
		$("#establecimiento").append(opcionDefault);
	})

}
function agregarCampos(){
	if(!estaCargada){ 
		$('#opcionD').remove();
		var lblnombre = $("<label for ='nombre' >Nombre:</label><br>"),
		nombre = $("<input id ='nombre' type='text'><br>"),
		lbltelefono = $("<label for ='telefono' >Telefono:</label><br>"),
		telefono = $("<input id ='telefono' type='text'><br>"),
		lblhorario = $("<label for ='horario' >Horario:</label><br>"),
		horario = $("<input id ='horario' type='text'><br>"),
		lbldireccion = $("<label for ='direccion' >Direccion:</label><br>"),
		direccion = $("<input id ='direccion' type ='text'><br>"),
		lblsitioWeb = $("<label for ='sitioWeb' >SitioWeb:</label><br>"),
		sitioWeb = $("<input id ='sitioweb' type='text'><br>"),
		lbltipoComida = $("<label for ='tipoComida' >TipoComida:</label><br>"),
		tipoComida = $("<select id ='tipoComida'></select><br>"),
		lblLatitud = $("<label for ='latitud' >Latitud:</label><br>"),
		latitud = $("<input id ='latitud' type='text' readonly='readonly'><br>"),
		lblLongitud = $("<label for ='longitud' >Longitud:</label><br>"),
		longitud = $("<input id ='longitud' type='text' readonly='readonly'><br>");
		
		$('#campos').append(lblnombre);
		//-------aqui falta poner el mapa
		$('#campos').append(nombre);
		$('#campos').append(lbltelefono);
		$('#campos').append(telefono);
		$('#campos').append(lblhorario);
		$('#campos').append(horario);
		$('#campos').append(lbldireccion);
		$('#campos').append(direccion);
		$('#campos').append(lblsitioWeb);
		$('#campos').append(sitioWeb);
		$('#campos').append(lbltipoComida);
		$('#campos').append(tipoComida);
		mostrar();
		$('#campos2').append(lblLatitud);
		$('#campos2').append(latitud);
		$('#campos2').append(lblLongitud);
		$('#campos2').append(longitud);	
	}

	var entrada = {
		'id': $('#establecimiento').val()
	}

	$.ajax({
		type: 'post',
		url: 'llenarCamposEstablecimiento.php',
		data: entrada
	})
	.done(function(data){
		var res = data.split(",");
		$('#nombre').val(res[0]);
		$('#telefono').val(res[3]);
		$('#horario').val(res[4]);
		$('#direccion').val(res[5]);
		$('#sitioweb').val(res[6]);
		$('#latitud').val(res[1]);
		$('#longitud').val(res[2]);
	})
	
	$.ajax({
		type: 'post',
		url: 'consultarTipoComida.php'
	})
	.done(function(data){
		$('#tipoComida').html(data);
	})
	estaCargada = true;
}

function actualizarDatos(){
	//variable la cual contiene los valores de los campos usuario, correo y claveNueva en formato JSON
	var entrada = {
		"id": $("#establecimiento").val(),
		"nombre" : $("#nombre").val(),
		"telefono" : $("#telefono").val(),
		"horario" : $("#horario").val(),
		"direccion" : $("#direccion").val(),
		"sitioweb" : $("#sitioweb").val(),
		"tipoComida" : $("#tipoComida").val(),
		"latitud" : $("#latitud").val(),
		"longitud" : $("#longitud").val()
	}
	$.ajax({
		type: 'post',
		url: 'validarActualizacionEstablecimiento.php',
		data: entrada
	})
	.done(function(data){
		if (data!=0) {
			$('#actualizarEst').val(data);
			$('#actualizarEst').css('background-color','#07FD5E');
			$('#actualizarEst').attr("disabled", true);
		}
		else{
			$('#actualizarEst').val("Llene todos los campos");
		}

		
	})
	//Cancelo la accion del evento de recargar la página (evento submit)
	event.preventDefault();
	

}



function mostrar(){
	document.getElementById('ocultismo').style.display = 'block';
}
