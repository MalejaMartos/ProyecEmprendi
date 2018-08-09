<?php
	require_once('config.php');
	session_start();
	//verifico si entra al login estando ya logeado
	if (isset($_SESSION['correo'])) {
	
		//verifico si entró siendo un administrador o un cliente
		$consulta = "SELECT esAdmin FROM cliente where correo ='".$_SESSION['correo']."';";
		$resultado = mysql_query($consulta);
		$verificacion = mysql_fetch_array($resultado);
		
		if($verificacion['esAdmin']==1)
		{
			//entró siendo un administrador
			header("location: inicioLogeadoAdmin.php");
			exit();
		}else{
			//entró siendo un cliente
			header("location: inicioLogeado.php");
			exit();
		}
		
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Services of Food</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tasty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- parallax -->
<script src="js/SmoothScroll.min.js"></script>
<script src="js/jarallax.js"></script>
<!-- //parallax -->
</head>
<body>
	<div class="bg-img">
		<!-- banner -->
		<div class="banner code-banner">
			<div class="container">
				<div class="header">
					<div class="logo">
						<h1><a href="index.html">Search the food</a></h1>
					</div>
					<div class="top-nav">
						<nav class="navbar navbar-default">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
								</button>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li><a href="index.php">Home</a></li>
									<li><a class="active" href="pagLogin.html">login</a></li>
									<li><a href="contact.html">Contact</a></li>
									<div class="clearfix"> </div>
								</ul>	
							</div>	
						</nav>		
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>
	<!-- about -->
	<div class="about">
		<div class="container">
			<div class="about-heading">
				<h2>Login</h2>
			</div>
			<div class="about-grids">
				<div class="col-md-5 wthree-about-left">
					<div class="wthree-about-left-info">
						<img src="images/n2.jpg" alt="" />
					</div>
				</div>
				<div class="col-md-7 agileits-about-right">
					<h1>Login</h1>
					<br>
					<form id ="formLogin" method = "POST" action ="verificarLogin.php" >
						<input id ="correo" name ="correo" type ="email" placeholder="Ingrese su email">
						<br><br>
						<input id="clave" name ="clave" type ="password" placeholder="Ingrese la clave">
						<br><br>
						<input class="myButton" type="submit" value=" Entrar ">
					</form>
					<br><br>
 				<a id ="registroUsuario"href="pagRegistroCliente.html">Nuevo Usuario</a>
				</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-grids">
				<div class="footer-heading">
					<h3>Get in touch with us</h3>
				</div>
				<div class="footer-icons">
					<ul>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a><span>Twitter</span></li>
						<li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
						<li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a><span>Google +</span></li>
						<li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a><span>Dribbble</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="w3agile-list">
				<ul>
					<li><a href="pagLogin.html">Login</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="agileinfo">
				<p>© 2016 Tasty . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //copyright -->
</body>	
</html>