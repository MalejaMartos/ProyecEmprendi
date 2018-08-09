<?php  
	/*Archivo encargado del registro del cliente en la base de datos*/
	include_once("config.php");
	//se capturan los datos enviados por el metodos POST
	$usuario = $_POST['usuario'];
	$correo = $_POST['correo'];
	$clave = $_POST['password'];
	//se valida que los campos estén definidios y no sean nulos
	if (isset($usuario) && !empty($usuario) && isset($correo) && !empty($correo) && isset($clave) && !empty($clave)) {
		//se verifica si ya existe el usuario asociado al correo
		$consultaVerificacion = "SELECT correo FROM cliente WHERE correo = '".$correo."';";
		$verificacion = mysql_query($consultaVerificacion);
		//si el resultado arrojado tiene más de una fila, entonces el usuario se encuentra registrado
		if (mysql_num_rows($verificacion)>0) {
			echo "Ya existe un usuario asociado a el correo suministrado";
		}
		
		else{
			//en caso contrario, se inserta el cliente en la base de datos
			$consultaInsercion = "INSERT INTO cliente VALUES('".$correo."','".$usuario."','".$clave."',0)";
			$insercion = mysql_query($consultaInsercion) or die(mysql_error());

			if ($insercion) {
				echo "Se ha registrado el cliente satisfactoriamente";
			}
			else{
				echo "El cliente no se ha podido registrar correctamente";
			}
		}	
	}
	else{
		echo "Complete los campos solicitados";
	}
	

?>