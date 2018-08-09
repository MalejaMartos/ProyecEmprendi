<?php
	require_once('config.php');
	session_start();
	//verifico si entra a la página principal estando ya logeado
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
<title>Search the Food</title>
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
<link rel="Stylesheet" type="text/css" href="css/Estilos.css">
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
<script src="js/SmoothScroll.min.js"></script>
</head>
<body>
	<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="video/cook">
		<!-- banner -->
		<div class="banner">
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
									<li><a class="active" href="index.html">Home</a></li>
									<li><a href="pagLogin.html">login</a></li>	
									<li><a href="contact.html">Contact</a></li>
									<div class="clearfix"> </div>
								</ul>	
							</div>	
						</nav>		
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="banner-info">
					<h2>Establecimientos e información sobre servicios de domicilio</h2>
					<p>
						Somos una empresa llamada search the food encargada de promocionar 
						lugares de comida adecuados para ti, según criterios como gustos particulares para distintos tipos de comida,
						e información acerca del servicio a domicilio de los diferentes establecimientos.</p>
				</div>
				<div class="banner-grads">
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b1.jpg" alt="" />
							<h4>Apanado</h4>
						</div>
					</div>
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b2.jpg" alt="" />
							<h4>Bistec</h4>
						</div>
					</div>
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b3.jpg" alt="" />
							<h4>Asado</h4>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>
	<!-- customer -->
	<div class="customer">
		<div class="container">
			<div class="customer-heading">
				<h3>Desarroladores</h3>
			</div>
			<div class="customer-heading-grids">
				<div class="col-md-4 customer-grid">
					<div class="customer-info">
						<p>Estudiante de Ingenieria de Sistemas y computacion 
							de la Universidad del Quindio</p>
					</div>
					<div class="customer-img">
						<img src="images/c1.jpg" alt="" />
						<h5>Andres Montilla</h5>
					</div>
				</div>
				<div class="col-md-4 customer-grid">
					<div class="customer-info">
						<p>Estudiante de Ingenieria de Sistemas y computacion 
							de la Universidad del Quindio</p>
					</div>
					<div class="customer-img">
						<img src="images/c2.jpg" alt="" />
						<h5>Kevin Agudelo</h5>
					</div>
				</div>
				<div class="col-md-4 customer-grid">
					<div class="customer-info">
						<p>Estudiante de Ingenieria de Sistemas y computacion 
							de la Universidad del Quindio</p>
					</div>
					<div class="customer-img">
						<img src="images/c3.jpg" alt="" />
						<h5>David Chavez</h5>
					</div>
				</div>
				<div class="col-md-4 customer-grid">
					<div class="customer-info">
						<p>Estudiante de Ingenieria de Sistemas y computacion 
							de la Universidad del Quindio</p>
					</div>
					<div class="customer-img">
						<img src="images/c3.jpg" alt="" />
						<h5>Juan Alape</h5>
					</div>
				</div>
				<div class="col-md-4 customer-grid">
					<div class="customer-info">
						<p>Estudiante de Ingenieria de Sistemas y computacion 
							de la Universidad del Quindio</p>
					</div>
					<div class="customer-img">
						<img src="images/c3.jpg" alt="" />
						<h5>Alejandra Martos</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //customer -->
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
						<li><a href="https://www.facebook.com/" class="twitter facebook"><i class="fa fa-facebook"></i></a><span>Facebook</span></li>
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
					<li><a href="about.html">login</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</div>
			<div class="agileinfo">
				<p>© 2016 Search the Food-Universidad del Quindio<a href="http://www.uniquindio.edu.co/">Uniquindio</a></p>
			</div>
		</div>
	</div>
	<!-- //copyright -->
</body>	
</html>