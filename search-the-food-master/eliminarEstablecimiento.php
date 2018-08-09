<?php  
	/*Archivo encargado de la actualizacion de los datos del cliente en la base de datos*/
	include_once("config.php");
	session_start();
	//se capturan el correo enviado por el metodos POST
	$idEstablecimiento = $_POST['id']; 
	$correoAdm = $_SESSION['correo'];
	$clave = $_POST['clave'];

	if (isset($idEstablecimiento) && !empty($idEstablecimiento) && isset($clave) && !empty($clave)) {
		$consultaAdm= "SELECT clave from cliente where correo = '".$correoAdm."';";	
		$resultado = mysql_query($consultaAdm) or die ('error en la consulta del adm');
		$respuesta = mysql_fetch_array($resultado);
		//se valida que las claves del adm, sean correctas
		if ($respuesta['clave']==$clave) {
			$consultaEliminar = "DELETE from establecimiento where id = '".$idEstablecimiento."';";
			$resultado = mysql_query($consultaEliminar) or die ('error en el borrado de un establecimiento');
			if ($resultado) {
				echo "Se ha eliminado el establecimiento exitosamente";
			}
		}
		else{
			echo "La clave ingresada no es valida";
		}
	}
	else{
		echo "Ingrese los campos solicitados";
	}	

?>