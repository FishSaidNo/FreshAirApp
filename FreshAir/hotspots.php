<?PHP
session_start();
/**
* Hotspots Page
* Page to show hotspots on the map. Different colour markers show the quality of the air on the map. The table under the map give the information needed to read the map.
*/
include_once 'db_utilityClients.php';
	
$query = "select * from aqi order by Suburb ASC"; //query to select information
$result = $mysqli->prepare($query); //prepare statement to make db connection safer
$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result->execute();
?>
<!DOCTYPE html>

<html>
    <head>
            <link rel="stylesheet" href="assets/css/mystyle.css">
			<link rel="shortcut icon" href="assets/images/gt_favicon.png">
			
			<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
			<link rel="stylesheet" href="assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="assets/css/font-awesome.min.css">

			<!-- Custom styles for our template -->
			<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
			<link rel="stylesheet" href="assets/css/main.css">			
            <title>Fresh Air - Create Your Own Reality</title> 	    
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
			<meta charset="UTF-8">	 
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
			
		          		
</head>
<body  class="home">  
  <script>
       function initialize() {
			<?php
			/**
			 *  following is to generate a markers from php code     
			 */
			$data = array();
			$data_array = array();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)){
				$item = array($row["Suburb"], (float) $row["Latitude"], (float) $row["Longitude"], (float) $row["AQIval"], (string) $row["Date"], $row["AQIcat"], $row["Time"]); // Array of information needed to show on the map
				array_push($data, $item);
				$data_array[] = $row;
				}
			echo "var markers = " . json_encode($data) . ";\n"; // Data converted to json encode to be shown.

			?>
			
			<!-- Map script to added to the paged and show markers-->
			
			google.maps.event.addDomListener(window, "resize", function() {
			   var center = map.getCenter();
			   google.maps.event.trigger(map, "resize");
			   map.setCenter(center); 
			});
							
				var myLatlng = new google.maps.LatLng(-27.470125,153.021072); 
				var mapOptions = {
					zoom: 11,
					center: myLatlng
				};
							

				var bounds = new google.maps.LatLngBounds();
				var element = document.getElementById('map-canvas');
				var map = new google.maps.Map(element, mapOptions);
				map.setTilt(45);
				
				
				<!-- Loop to go through the array to show markers and infowindow -->
				
				for (i = 0; i < markers.length; i++) {
					
				
					<!-- Loops to show the markers depending on their category -->
					
					if (markers[i][3] <= "50"){		

						<!-- Variable with information to be shown in the infowindow -->
						
						var content = '<div id="iw-container" style="background-color:green;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 					
					
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png',
							title: markers[i][0]
						});			
									
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
					
					}												
				
					<!-- Loops to show the markers depending on their category -->
					
					if (markers[i][3] >= "51" && markers[i][3] <= "100"){
						
						<!-- Variable with information to be shown in the infowindow -->
						
						var content = '<div id="iw-container" style="background-color:yellow;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 			
							
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/yellow-dot.png',
							title: markers[i][0]
						});
						
						
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  						
											
					}	
					
					

				
					if (markers[i][3] >= "101" && markers[i][3] <= "150"){
						
						<!-- Variable with information to be shown in the infowindow -->	
						
						var content = '<div id="iw-container" style="background-color:orange;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 
					
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/orange-dot.png',
							title: markers[i][0]
						});
						
						
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  												
											
					}
					
					<!-- Loops to show the markers depending on their category -->

					if (markers[i][3] >= "151" && markers[i][3] <= "200"){
						
						<!-- Variable with information to be shown in the infowindow -->	
						
						var content = '<div id="iw-container" style="background-color:red;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 
					
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png',
							title: markers[i][0]
						});
						
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  					
											
					}		
						
					<!-- Loops to show the markers depending on their category -->					
					
					if (markers[i][3] >= "201" && markers[i][3] <= "300"){
						
						<!-- Variable with information to be shown in the infowindow -->
						
						var content = '<div id="iw-container" style="background-color:purple;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/purple-dot.png',
							title: markers[i][0]
						});
						
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  						
											
					}	
					
					<!-- Loops to show the markers depending on their category -->	
										
					if (markers[i][3] >= "301" && markers[i][3] <= "500"){						
						
						<!-- Variable with information to be shown in the infowindow -->
						
						var content = '<div id="iw-container" style="background-color:maroon;">' + '<div class="iw-title">' + 'Suburb: ' + markers[i][0] + '</div><div class="iw-content">' + '<b>Date:</b> ' + markers[i][4] +  '</br></br>' + '<b>Time:</b>  ' + markers[i][6] +  '</br></br>' + '<b>AQI Category:</b> ' + markers[i][5] + '</br></br>' + '<b>AQI Value:</b> ' + markers[i][3] + '</div></div>' ;     
				 
					
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
							map: map,
							icon: 'http://labs.google.com/ridefinder/images/mm_20_brown.png',
							title: markers[i][0]
						});
						
						<!-- Infowindow addition to the map and markers -->
						
						var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  						
											
					}	
					
				}
			}
			
			google.maps.event.addDomListener(window, 'load', initialize);

</script>		
 
	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>

			
    <!-- Header -->
	<header id="head" class="secondary"></header>
	
	<!-- Content -->
	<div class="container">

	
		<!-- Page Indicators -->
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Map</li>
		</ol>	     
		<!-- End Page Indicators -->		

		<h2 style="text-align:center"> THE DATA SHOWN IS FOR TESTING PURPOSES ONLY </h2>

		<div style="text-align:center"> 

			<div id="map-canvas" class="img-responsive"></div></br>

			<h1 style="text-align:center"> AQI Category Table</h1>

			<div style="text-align:center"><img src="assets/images/AQItable.gif" width="640" height="433" alt="" /></div> <br/>
			
		</div> 	
		
		<!-- Container to show buttons -->	
		<div class="container">
						
			<div class="row" style="text-align:center">
			
				<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
				<p class="tagline">&nbsp;</p>
				<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
				<p><a class="btn btn-default btn-lg" href="airbeamApp.php" role="button">About the App</a> </p>
				
			</div>
			
		</div>
							
	</div>		
	<!-- /container -->
	
	<!-- Footer Insertion (see footer.php) -->
	<?php include 'footer.php'; ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>
