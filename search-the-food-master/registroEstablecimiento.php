<?php

	/*Archivo encargado del registro del cliente en la base de datos*/
	include_once("config.php");
	//se capturan los datos enviados por el metodos POST
	$nombre = $_POST['nombre'];
	$tipoComida = $_POST['tipoComida'];
	$descripcionHorario = $_POST['descripcionHorario'];
	$latitud = $_POST['latitud'];
	$longitud = $_POST['longitud'];
	$telefono = $_POST['telefono'];
	$sitioWeb = $_POST['sitioWeb'];
	$descripcionDireccion = $_POST['descripcionDireccion'];


	//se valida que los campos estén definidios y no sean nulos
	if (isset($nombre) && !empty($nombre) && isset($tipoComida) && !empty($tipoComida) && isset($descripcionHorario) && !empty($descripcionHorario) 
		&& isset($latitud) && !empty($latitud) && isset($longitud) && !empty($longitud) && isset($telefono) && !empty($telefono) 
		&& isset($sitioWeb) && !empty($sitioWeb) && isset($descripcionDireccion) && !empty($descripcionDireccion)) {
		//se verifica si ya existe el establecimiento asociado al nombre

		$consultaVerificacion = "SELECT nombre FROM establecimiento WHERE nombre = '".$nombre."';";
		$verificacion = mysql_query($consultaVerificacion);
		//si el resultado arrojado tiene más de una fila, entonces el establecimiento se encuentra registrado
		if (mysql_num_rows($verificacion)>0) {
			echo "Ya existe un establecimiento registrado con ese nombre :( ";
		}
		
		else{
			//en caso contrario, se inserta el establecimiento en la base de datos
			$consultaInsercion = "INSERT INTO establecimiento (
			id ,
			nombre ,
			latitud ,
			longitud ,
			telefono ,
			descripcionHorario ,
			descripcionDireccion ,
			sitioWeb ,
			TipoComida_id
			)
			VALUES(
			NULL,
			'".$nombre."', 
			'".$latitud."',
			'".$longitud."',
			'".$telefono."',
			'".$descripcionHorario."',
			'".$descripcionDireccion."',
			'".$sitioWeb."',
			".$tipoComida.")";
			
			$insercion = mysql_query($consultaInsercion) or die ("Error". mysql_error());

			if ($insercion) {
				echo "Registro completado";
			}
			else{
				echo "Registro ha tenido fallo";
			}
		}	
	}
	else{
		echo "0";
	}
	
?>