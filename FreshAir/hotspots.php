<?PHP
session_start();
/**
* index page
* default page for user
*/
include_once 'db_utility.php';
if (!isset($_POST['suburb'])){
	$query = "select * from aqi order by Suburb ASC";
}
$result = $mysqli->query($query);
?>
<!DOCTYPE html>

<html>
    <head>
            <link rel="stylesheet" href="mystyle.css">
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
<script>
function alertConstruction() {
    alert("Data shown it is for testing purposes ONLY, Site under construction");
}
</script>
<body onload="alertConstruction()" class="home">  
 <script>
                function initialize() {
<?php
/**
 *  following is to generate a markers from php code     
 */
$data = array();
$data_array = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	$item = array($row["Suburb"], (float) $row["Latitude"], (float) $row["Longitude"], (float) $row["AQIval"], (string) $row["Date"], $row["AQIcat"]);
	array_push($data, $item);
	$data_array[] = $row;
	}
echo "var markers = " . json_encode($data) . ";\n";

?>
var today = new Date();
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
                    for (i = 0; i < markers.length; i++) {
						var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];     
					
						if (markers[i][3] <= "50"){
												
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png',
                            title: markers[i][0]
                        });			
										

						  var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
						
						}
													
						
						if (markers[i][3] >= "51" && markers[i][3] <= "100"){
							
							var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];  
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/yellow-dot.png',
                            title: markers[i][0]
                        });
						 var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
							
												
						}		

						if (markers[i][3] >= "101" && markers[i][3] <= "150"){
							
							var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];  
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/orange-dot.png',
                            title: markers[i][0]
                        });
						 var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
													
												
						}

						if (markers[i][3] >= "151" && markers[i][3] <= "200"){
							
							var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];  
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png',
                            title: markers[i][0]
                        });
						 var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
							
												
						}							
						
						if (markers[i][3] >= "201" && markers[i][3] <= "300"){
							
							var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];  
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/purple-dot.png',
                            title: markers[i][0]
                        });
						 var infowindow = new google.maps.InfoWindow();

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
							return function() {
								infowindow.setContent(content);
								infowindow.open(map,marker);
							};
						})(marker,content,infowindow));  
							
												
						}	
						
						if (markers[i][3] >= "301" && markers[i][3] <= "500"){
							
							var content = "Date: " + markers[i][4] +  '</br>' + "Category: " + markers[i][5];  
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://labs.google.com/ridefinder/images/mm_20_brown.png',
                            title: markers[i][0]
                        });
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
<?php include 'menu.php'; ?>

			<!-- /.navbar -->
    <!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Map</li>
		</ol>	       

			<h5 style="text-align:center"> THE DATA SHOWN IS FOR TESTING PURPOSES ONLY </h5>

		<div style="text-align:center"> 
      

			<div style="text-align:center"> 

				<div id="map-canvas" class="img-responsive"></div></BR

						   <h2 style="text-align:center"> AQI Category Table</h2>

				<div style="text-align:center"><img src="images/AQItable.gif" width="640" height="433" alt="" /></div> <br/>
			</div> 
		</div> 
				<div class="container">


								
					<div class="row" style="text-align:center">
						<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
						<p class="tagline">&nbsp;</p>
						<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
						<p><a class="btn btn-default btn-lg" href="hotspots.php" role="button">View HostSpots</a> </p>
					</div>
				</div>
							
	</div>		
		<?php include 'footer.php'; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
	
	
 </html>
