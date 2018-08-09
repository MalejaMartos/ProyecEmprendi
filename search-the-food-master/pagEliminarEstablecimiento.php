<?php
	require_once('config.php');
	session_start();

	//si entra sin estar logeado entonces lo envio al index y cierro el script
	if (!isset($_SESSION['correo'])) {
		header("location: index.php");
		exit();
	}else{
		//verifico si entró siendo un administrador
		$consulta = "SELECT * FROM cliente where correo ='".$_SESSION['correo']."';";
		$resultado = mysql_query($consulta) or die ('problemas en la consulta '.mysql_error());
		$verificacion = mysql_fetch_array($resultado);
				
		if($verificacion['esAdmin']==0)
		{
			//entró siendo un Establecimiento
			header("location: inicioLogeado.php");
		}
	
	}
	
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Servicio de comida</title>
	<meta name="viewport" content="whidth-device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1">
	<link rel="Stylesheet" type="text/css" href="css/Estilos.css">
    
     <title>Places Searchbox</title>
</head>
	<body>
		<div class="contenedor">
			<header>
				<div class="logo">
					<img src="images/food-network.png" width="150" alt="">
					<a href="http://www.searchthefood.webcindario.com">Servicios de Comidas</a>
				</div>

				<nav>
					<a href="index.php">Inicio</a>
					<a href="pagRegistroEstablecimiento.php">Registrar Establecimiento</a>
					<a href="pagConsultaActualizarEstablecimiento.php">Actualizar Establecimiento</a>
					<a href="pagEliminarCliente.php">Eliminar Cliente</a>
					<a href="pagEliminarEstablecimiento.php">Eliminar Establecimiento</a>
					<a href="logout.php">Cerrar Sesion</a>
				</nav>
			</header>
 
		<section class="main">
			<div class="establecm">
				<h1>Eliminar Establecimiento</h1>
				<br>
				<form id ="eliminarEstablecimiento">
                   			<label for ="selectEstablecimiento">Seleccione el Establecimiento: </label>
                   			<select id="selectEstablecimiento" name="nombre" type="multiple" placeholder="seleccione">
					<select  selected="selected" >
					</select>
					<br><br>
					<label for ="passwordAdm">Clave : </label>
					<input id="passwordAdm"type ="password" placeholder="Ingrese la clave ">					
					<br><br>
					<div id = "divEliminarEstablecimiento">
					
					
					</div>
			
					<br><br>
					<input class="myButton" type="submit" value=" Eliminar">
				</form>
				<br><br>
			</div>
		</section>
 
		<footer>
			<section class="links">
				<a href="index.php">Inicio</a>
				<a href="pagRegistroEstablecimiento.php">Registrar Establecimiento</a>
				<a href="pagConsultaActualizarEstablecimiento.php">Actualizar Establecimiento</a>
				<a href="pagEliminarCliente.php">Eliminar Cliente</a>
				<a href="pagEliminarEstablecimiento.php">Eliminar Establecimiento</a>
				<a href="logout.php">Cerrar Sesion</a>
			</section>
 
		</footer>
	</div>
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/validacionEliminarEstablecimiento.js"></script>
	</body>
</html>