<?php  
	/*Archivo encargado de la actualizacion de los datos del establecimiento en la base de datos*/
	include_once("config.php");
	//se capturan los datos enviados por el metodos POST
	$idEstablecimiento = $_POST['id']; 
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$horario = $_POST['horario'];
	$direccion = $_POST['direccion'];
	$sitioWeb = $_POST['sitioweb'];
	$tipoComida = $_POST['tipoComida'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	//echo $nombre.'-'.$telefono.'-'.$horario.'-'.$direccion.'-'.$sitioWeb.'-'.$tipoComida.'-'.$latitud.';
	//se valida que los campos estén definidios y no sean nulos
	if (isset($nombre) && !empty($nombre) && isset($telefono) && !empty($telefono) && isset($horario) && !empty($horario) && isset($direccion) && !empty($direccion) && isset($sitioWeb) && !empty($sitioWeb)&& isset($tipoComida) && !empty($tipoComida)&& isset($latitud) && !empty($latitud)&& isset($longitud) && !empty($longitud)) {
		
		$consulta = 'UPDATE establecimiento SET nombre = "'.$nombre.'", telefono = "'.$telefono.'", descripcionHorario ="'.$horario.'", descripcionDireccion ="'.$direccion.'", sitioWeb ="'.$sitioWeb.'", TipoComida_id ="'.$tipoComida.'", latitud ="'.$latitud.'", longitud ="'.$longitud.'" WHERE id ="'.$idEstablecimiento.'";';
		$resultado = mysql_query($consulta) or die (mysql_error());

		if ($resultado) {
			echo "Datos actualizados correctamente";
		}else{
			echo "Problemas al actualizar";
		}
	}
	else{
		echo "0";
	}
	

?>