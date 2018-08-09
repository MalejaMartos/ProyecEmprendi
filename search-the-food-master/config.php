
<?php
	//Archivo donde se establece la conexión con la base de datos
	$host = 'mysql.webcindario.com';
	$usuario = 'searchthefood';
	$contrasena = '123456andrez';
	$conexion = mysql_connect($host,$usuario,$contrasena) or die (mysql_error().' operacion de conexion fallida');
	mysql_select_db('searchthefood') or die (mysql_error().' operacion de seleccion fallida');

?>