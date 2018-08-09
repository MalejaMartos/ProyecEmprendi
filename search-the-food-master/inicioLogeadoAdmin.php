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
			//entró siendo un cliente
			header("location: inicioLogeado.php");
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
					<a href="pagRegistroEstablecimiento.php">Registrar Establecimiento</a>
					<a href="pagConsultaActualizarEstablecimiento.php">Actualizar Establecimiento</a>
					<a href="pagEliminarCliente.php">Eliminar Cliente</a>
					<a href="pagEliminarEstablecimiento.php">Eliminar Establecimiento</a>
					<a href="logout.php">Cerrar Sesion</a>
				</nav>
			</header>
 
		<section class="main">
			<article>
				<h2 class="titulo">Bienvenido <?php echo $verificacion['usuario']; ?> </h2>
				
			</article>
 
		</section>
 
		<aside>
			<div class="widget">
				<div class="imagen"></div>
			</div>
 
			<div class="widget">
				<div class="imagen"></div>
			</div>
		</aside>
 
		<footer>
			<section class="links">
				<a href="index.php">Inicio</a>
				<a href="pagRegistroEstablecimiento.php">Registrar Establecimiento</a>
				<a href="pagConsultaActualizarEstablecimiento.php">Actualizar Establecimiento</a>
				<a href="pagEliminarCliente.php">Eliminar Cliente</a>
				<a href="logout.php">Cerrar Sesion</a>
			</section>
 
		</footer>
	</div>
	</body>
</html>