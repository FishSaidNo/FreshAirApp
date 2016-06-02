<?PHP
session_start();
/**
* index page
* default page for user where general information is shown.
*/
?>
<!DOCTYPE html>

<html>
    <head>
			<link rel="shortcut icon" href="assets/images/gt_favicon.png">			
			<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
			<link rel="stylesheet" href="assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="assets/css/font-awesome.min.css">

			<!-- Custom styles for our template -->
			<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
			<link rel="stylesheet" href="assets/css/main.css">			
            <title>Fresh Air - Keeping Track of Brisbane's Air Quality</title> 	    
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
			<meta charset="UTF-8">	 
			
		          		
</head>
<body  class="home">  
	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>
			
    <!-- Header -->
	<header id="head" class="secondary"></header>
	
	<!-- Content -->
	<div class="container">       

		</br></br><h2 style="text-align:center"> THE DATA SHOWN IS FOR TESTING PURPOSES ONLY </h2></br></br>

		     
		<!-- Div to show video in the middle of the screen and make it responsive -->
		<div style="text-align:center"> 	
      
				<video width="85%" controls><source src="assets/images/video.mp4" type="video/mp4"></video></br></br>
				
		</div> 
		
		<div class="container">								
					

			<div class="jumbotron top-space">		
				<h2 class="text-center top-space">How is Air Quality Measured?</h2></br>
				<p style="text-align:justify">The air qualities we breathe can affect our health even though air quality in Australia is better than any other equal countries,
				it is very important that we take another step to make sure the air quality is safe for the people in the future. Even small improvement in air quality can get 
				plenty of benefits for people health and wellbeing.</br></br>AQI air quality index is a digit number used by government agencies. To connect and speak to the people 
				how the air quality currently is or how it is forecast to become. These monitoring criteria measure the presence of pollutants in the air, such as carbon monoxide 
				(CO), nitrogen dioxide (NO2), and photochemical oxidants as ozone (O3), particulate matter less than 10 micrometers (PM10) and particulate matter less than 2.5 micrometers 
				(PM2.5).  
					
			</div>
			
			<div class="row" style="text-align:center">
			
				<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
				<p class="tagline">&nbsp;</p>
				<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
				<p><a class="btn btn-default btn-lg" href="hotspots.php" role="button">View HostSpots</a> </p>
				<p><a class="btn btn-default btn-lg" href="airbeamApp.php" role="button">Check App Out</a> </p>
				
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
	