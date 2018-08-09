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
		$consulta = "SELECT * FROM cliente where correo ='".$_SESSION['correo']."';";
		$resultado = mysql_query($consulta);
		$verificacion = mysql_fetch_array($resultado);
		
		if($verificacion['esAdmin']==1)
		{
			//entró siendo un administrador
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
			<article>
				<h2 class="titulo"> Bienvenido <?php echo $verificacion['usuario']; ?> </h2>
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
				<a href="pagActualizacionCliente.php">Gestionar Datos</a>
				<a href="pagConsultaEstablecimiento.php">Consultar Establecimiento</a>
				<a href="logout.php">Cerrar Sesion</a>
			</section>
 
		</footer>
	</div>
	</body>
</html>