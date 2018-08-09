<?php

	require_once('config.php');
	session_start();
	$consulta = 'SELECT * FROM cliente WHERE correo="'.$_SESSION['correo'].'";';
	$resultado = mysql_query($consulta) or die ('se ha producido un error' . mysql_error());
	$respuesta = mysql_fetch_array($resultado);
	
	echo $respuesta['correo'].",".$respuesta['usuario'].",".$respuesta['clave'].",".$respuesta['esAdmin'];
?>