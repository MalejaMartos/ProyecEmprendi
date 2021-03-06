<?php
	require_once('config.php');
	session_start();

	//si entra sin estar logeado entonces lo envio al index y cierro el script
	if (!isset($_SESSION['correo'])) {
		header("location: index.php");
		exit();
	}else{
		//verifico si entr� siendo un administrador
		$consulta = "SELECT * FROM cliente where correo ='".$_SESSION['correo']."';";
		$resultado = mysql_query($consulta) or die ('problemas en la consulta '.mysql_error());
		$verificacion = mysql_fetch_array($resultado);
				
		if($verificacion['esAdmin']==0)
		{
			//entr� siendo un cliente
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
					<a href="index.php">Servicios de Comidas</a>
				</div>

				<nav>
					<a href="index.php">Inicio</a>
					<a href="pagRegistroEstablecimiento.php">Registrar Establecimiento</a>
					<a href="pagConsultaActualizarEstablecimiento.php">Actualizar Establecimiento</a>
					<a href="pagEliminarCliente.php">Eliminar Cliente</a>
					<a href="logout.php">Cerrar Sesion</a>
				</nav>
			</header>
 
		<section class="main">
			<div class="establecm">
				<h1>Registro Establecimiento</h1>
				<br>
				<form  id="registrarEstablecimiento" method="post">
					<label for ="nombreEstablecimiento">Nombre: </label>
					<input id ="nombreEstablecimiento" type ="text" placeholder="Ingrese nombre establecimiento";>
					<br><br>
					<label for ="tipoComida">Tipo de Comida: </label>
					<select id="tipoComida" name="nombre" type="multiple" >
					<select  selected="selected" >
					</select>
					<br><br>
					<label for ="horario">Dias y horario </label>
					<input id="horario" type="text" placeholder="Ej: Lunes a Viernes de 7am - 6pm">
					<br><br>
					<input id="pac-input" class="controls" type="text" placeholder="Search Box">
					
					
<script>
// This example adds a search box to a map, using the Google Place Autocomplete
					// feature. People can enter geographical searches. The search box will return a
					// pick list containing a mix of places and predicted search terms.
function initAutocomplete() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 4.4915063, lng: -75.7849953},
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // [START region_getplaces]
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };
					      
      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));
					      

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
					    
	//var ne = bounds.getNorthEast();
	var sw = bounds.getSouthWest();
  	$("#latitud").val(sw.lat());
	$("#longitud").val(sw.lng());
  	map.fitBounds(bounds);
	 });
					  // [END region_getplaces]
	}
					
</script>					
					
					
	    				<div class="google-maps" id="map">
	    				<iframe  width="400" height="200" frameborder="2" style="border:0"></iframe>
	    				</div>
					<br><br>
					<label for ="latitud">Latitud: </label>
					<input id="latitud" name="latitud" type ="text" readonly="readonly" >
					<br><br>
					<label for ="longitud">Longitud: </label>
					<input id="longitud" name="longitud" type ="text" readonly="readonly">
					<br><br>
					<label for ="telefonos">Telefono: </label>
					<input id="telefono" type ="text" placeholder="Ej: 229xxxx o 312xxxxxxx">
					<br><br>
					<label for ="sitioWeb">Sitio Web: </label>
					<input id="sitioWeb" type ="text" placeholder="ejemplo@ejmplo.dominio">
					<br><br>
					<label for ="direccion">Direccion: </label>
					<input id="direccion" type ="text" placeholder="Ej: Cr. 10 # 85S-52">
					<br><br>
					<input id='botonRegistrar' class="myButton" type="submit" value=" Registrar ">
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
				<a href="logout.php">Cerrar Sesion</a>
			</section>
 
		</footer>
	</div>
	<script src="js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/validacionRegistroEstablecimiento.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3XGEKF7brx1x6yCHaZQubPPA4dIB1n8E&libraries=places&callback=initAutocomplete"
	async defer></script>
	<!--<script type="text/javascript" src="js/usoDeMaps.js"></script>-->
        
	</body>
</html>