<?php  
	require_once("config.php");

	//se verifica que los campos no estén vacíos
	 if (!empty($_POST['correo']) && !empty($_POST['clave'])) {
	 	$correo = $_POST['correo'];
	 	$clave = $_POST['clave'];

	 	$consultaCorreo = "SELECT * FROM cliente where correo ='".$correo."'";
	 	$verificacion = mysql_query($consultaCorreo);
	 	//se verifica que el correo ingresado esté registrado y asociado a un cliente
	 	if ($resultado = mysql_fetch_array($verificacion)) {
	 		//se verifica que la clave corresponde al registro del cliente
	 	 	if ($resultado['clave']==$clave) {
	 	 		//se verifica si es un administrador para brindarle permisos
	 	 		if($resultado['esAdmin']==1){
	 	 			session_start();
		 	 		//variable de sesion
		 	 		$_SESSION['correo'] = $correo;
		 	 		//se redirecciona a la página de inicio pero ya logeado
		 	 		header("location: inicioLogeadoAdmin.php");
	 	 		}else{
		 	 		session_start();
		 	 		
		 	 		//variable de sesion
		 	 		$_SESSION['correo'] = $correo;
		 	 		//se redirecciona a la página de inicio pero ya logeado
		 	 		header("location: inicioLogeado.php");
	 	 		}
	 	 		

	 	 	}
	 	 	else{
	 	 		//se muestra una alerta y se redirecciona
	 	 		echo "<script> alert('La clave ingresada no es valida'); 
				window.location='pagLogin.php';
	 	 		</script>";

	 	 	}
	 	}else{
	 		//se muestra una alerta y se redirecciona
	 		echo "<script> alert('El correo ingresado no esta registrado'); 
				window.location='pagLogin.php';
	 	 		</script>";
	 	} 

	 }
	 else{
	 	//se muestra una alerta y se vacía el campo de correo y clave
	 	echo   "<script> alert('Ingrese los campos solicitados');
	 		window.location='pagLogin.php'; 
	 	 	</script>";
	 }

?>