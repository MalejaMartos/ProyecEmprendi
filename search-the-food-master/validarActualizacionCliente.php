<?php  
	/*Archivo encargado de la actualizacion de los datos del cliente en la base de datos*/
	include_once("config.php");
	session_start();
	//se capturan los datos enviados por el metodos POST
	$correo = $_SESSION['correo'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['password'];
	$claveNueva = $_POST['passwordN'];
	//se valida que los campos estén definidios y no sean nulos
	if (isset($usuario) && !empty($usuario) && isset($correo) && !empty($correo) && isset($clave) && !empty($clave) && isset($claveNueva) && !empty($claveNueva)) {
		//se realiza la consulta del registro por el correo
		$consultaVerificacion = "SELECT clave FROM cliente WHERE correo = '".$correo."';";
		$verificacion = mysql_query($consultaVerificacion);
		$resultado = mysql_fetch_array($verificacion);
		//se verifica que la clave actual coincida con la registrada
		if ($resultado['clave']==$clave) {
			//debido a que la clave es correcta, se procede a actualizar los datos del cliente
			$consulta = 'UPDATE cliente SET usuario = "'.$usuario.'", clave = "'.$claveNueva.'" WHERE correo ="'.$correo.'";';
			$resultado = mysql_query($consulta);

			if ($resultado) {
				echo "Datos actualizados correctamente";
			}
			else{
				echo "No se ha podido actualizar correctamente los datos";
			}

		}
		else{
			echo "La clave ingresada no coincide con la registrada";
			
		}	
	}
	else{
		echo "Complete los campos solicitados";
	}
	

?>