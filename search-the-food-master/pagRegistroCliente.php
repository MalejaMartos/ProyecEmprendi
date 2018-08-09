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
					<a href="pagLogin.php">Login</a>
					<a href="#">Proyectos</a>
					<a href="#">Contacto</a>
				</nav>
			</header>
 
		<section class="main">
			<div id ="divRegistroCliente" class = "logeo">
				<h1><center>Registrar Cliente<center></h1>
				<br>
				<form id ="formCliente" method ="POST">
					<label for ="usuario">Usuario: </label>
					<input id ="usuario" type ="text" placeholder="Ingrese el usuario">
					<br><br>
					<label for ="correo">Correo: </label>
					<input id ="correo" type ="email" placeholder="Ingrese el email">
					<br><br>
					<label for ="password">Clave: </label>
					<input id="password"type ="password" placeholder="Ingrese la clave">
					<br><br>
					<input class="myButton" type="submit" value=" Registrar " id = "registrar">
				</form>
				<br><br>
				<div id ="divRespuestaRegistro"></div>
			</div>
		</section>
 
		<footer>
			<section class="links">
				<a href="index.php">Inicio</a>
				<a href="pagLogin.php">Login</a>
				<a href="#">Proyectos</a>
				<a href="#">Contacto</a>
			</section>
 
		</footer>
	</div>
	
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/validarTransaccion.js"></script>
	</body>
</html>