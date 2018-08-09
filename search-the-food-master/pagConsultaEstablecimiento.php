<?php
	session_start();
	//si entra sin estar logeado entonces lo envio al index y cierro el script
	if (!isset($_SESSION['correo'])) {
		header("location: index.php");
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Servicio de comida</title>
	<style type="text/css">
  		/*TODO LO RELACIONADO CON LA CALIFICACION*/
		.ec-stars-wrapper {
			/* Espacio entre los inline-block (los hijos, los `a`) 
			   http://ksesocss.blogspot.com/2012/03/display-inline-block-y-sus-empeno-en.html */
			font-size: 0;
			/* Podríamos quitarlo, 
				pero de esta manera (siempre que no le demos padding), 
				sólo aplicará la regla .ec-stars-wrapper:hover a cuando
				también se esté haciendo hover a alguna estrella */
			display: inline-block;
		}
		.ec-stars-wrapper a {
			text-decoration: none;
			display: inline-block;
			/* Volver a dar tamaño al texto */
			font-size: 32px;
			font-size: 2rem;
			
			color: #888;
		}
		
		.ec-stars-wrapper:hover a {
			color: rgb(255, 212, 2);
		}
		/*
		 * El selector de hijo, es necesario para aumentar la especifidad
		 */
		.ec-stars-wrapper > a:hover ~ a {
			color: #888;
		}
		/*AQUI TERMINA LO DE CALIFICACION*/
	</style>
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
					<a href="pagActualizacionCliente.php">Gestionar Datos</a>
					<a href="pagConsultaEstablecimiento.php">Consultar Establecimiento</a>
					<a href="logout.php">Cerrar Sesion</a>
				</nav>
			</header>
 
		<section class="main">
			<div class="establecm">
				<h1>Buscar Establecimiento</h1>
				<br>
				<form>
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
					<!-- <br><br>
					<label for ="latitud">Latitud: </label>
					<input id="latitud" name="latitud" type ="text" readonly="readonly" >
					<br><br>
					<label for ="longitud">Longitud: </label>
					<input id="longitud" name="longitud" type ="text" readonly="readonly">
					<br><br>
					<label for ="buscarEstablecimiento">Buscar: </label>
					<input id ="buscarEstablecimiento" type ="text" placeholder="buscar nombre establecimiento";>
					<br><br>
					<input class="myButton" type="submit" value=" Consultar ">
					<form id="formCalif">
					  <p class="clasificacion">
					    <input id="radio1" type="radio" name="estrellas" value="5">
					    <label for="radio1">&#9733;</label>
					    <input id="radio2" type="radio" name="estrellas" value="4">
					    <label for="radio2">&#9733;</label>
					    <input id="radio3" type="radio" name="estrellas" value="3">
					    <label for="radio3">&#9733;</label>
					    <input id="radio4" type="radio" name="estrellas" value="2">
					    <label for="radio4">&#9733;</label>
					    <input id="radio5" type="radio" name="estrellas" value="1">
					    <label for="radio5">&#9733;</label>
					  </p>
					</form>
					<div id="retroAlimentacion">
						
					</div> -->
				</form>
				<br><br>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3XGEKF7brx1x6yCHaZQubPPA4dIB1n8E&libraries=places&callback=initAutocomplete"
         			async defer></script>
	</body>
</html>