<?php
	require_once('config.php');
	session_start();
	//si entra sin estar logeado entonces lo envio al index y cierro el script
	if (!isset($_SESSION['correo'])) {
		header("location: index.php");
		exit();
	}
	else{
		//verifico si entró siendo un administrador
		$consulta = "SELECT esAdmin FROM cliente where correo ='".$_SESSION['correo']."';";
		$resultado = mysql_query($consulta);
		$verificacion = mysql_fetch_array($resultado);
		
		if($verificacion['esAdmin']==1)
		{
			//entró siendo un administrador
			//se restringe la actualizacion de clientes solo para ellos mismos
			header("location: inicioLogeadoAdmin.php");
			exit();
		}
	}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Servicio de comida</title>
	<link rel="Stylesheet" type="text/css" href="css/Estilos.css">
</head>
	<body>
		<div class="contenedor">
			<header>
				<div class="logo">
					<img src="images/food-network.png" width="150" alt="">
					<a href="index.php">Servicios de Comidas</a>
				</div>

				<nav>
					<a href="index.php">Inicio</a>
					<a href="pagActualizacionCliente.php">Gestionar Datos</a>
					<a href="pagConsultaEstablecimiento.php">Consultar Establecimiento</a>
					<a href="logout.php">Cerrar Sesion</a>
				</nav>
			</header>
 
		<section class="main">
			<div id ="divRegistroCliente" class = "logeo">
				<h1><center>Actualizacion del Cliente<center></h1>
				<br>
				<div id="datosFijos">
					<label id="isAdmin" ></label>
					<br>
					<label id="yourEmail" ></label>
					<br>
				</div>	
				<form id ="formCliente" method ="POST">
					<label for ="usuario">Usuario: </label>
					<input id ="usuario" type ="text" placeholder="Ingrese el usuario">
					<br><br>
					<label for ="password">Clave Actual: </label>
					<input id="password"type ="password" placeholder="Ingrese la clave actual">
					<br><br>
					<label for ="passwordN">Clave Nueva: </label>
					<input id="passwordN"type ="password" placeholder="Ingrese la clave nueva">
					<br><br>
					<input class="myButton" type="submit" value="Actualizar Datos" id = "actualizarDatos">
				</form>
				<br><br>
				<div id ="divRespuestaRegistro"></div>
			</div>
		</section>
 
		<footer>
			<section class="links">
				<a href="index.php">Inicio</a>
				<a href="pagActualizacionCliente.php">Gestionar Datos</a>
				<a href="pagConsultaEstablecimiento.php">Consultar Establecimiento</a>
				<a href="logout.php">Cerrar Sesion</a>
			</section>
 
		</footer>
	</div>
	
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/validarActualizacionCliente.js"></script>
	</body>
</html>