<?php
	require_once('config.php');
	$idEstablecimiento= $_POST['id'];
	$consulta = 'SELECT * FROM establecimiento WHERE id="'.$idEstablecimiento.'";';
	$resultado = mysql_query($consulta) or die ('se ha producido un error' . mysql_error());
	$respuesta = mysql_fetch_array($resultado);
	
	echo $respuesta['nombre'].",".$respuesta['latitud'].",".$respuesta['longitud'].",".$respuesta['telefono'].",".$respuesta['descripcionHorario'].",".$respuesta['descripcionDireccion'].",".$respuesta['sitioWeb'];
?>