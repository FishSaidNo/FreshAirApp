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
            <title>Fresh Air - Create Your Own Reality</title> 	    
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

		<h2 style="text-align:center"> THE DATA SHOWN IS FOR TESTING PURPOSES ONLY </h2>

		     
		<!-- Div to show video in the middle of the screen and make it responsive -->
		<div style="text-align:center"> 	
      
				<video width="85%" controls><source src="assets/images/video.mp4" type="video/mp4"></video></br></br>
				
		</div> 
		
		<div class="container">
								
			<div class="row" style="text-align:center">
			
				<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
				<p class="tagline">&nbsp;</p>
				<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
				<p><a class="btn btn-default btn-lg" href="hotspots.php" role="button">View HostSpots</a> </p>
				<p><a class="btn btn-default btn-lg" href="airbeamApp.php" role="button">Check App Out</a> </p>
				
			</div>
		</div>
				

		<div class="jumbotron top-space">
		
			<h2 class="text-center top-space">How is Air Quality Measured?</h2></br>
			<p style="text-align:justify">ACT Health operates the Territory's air quality monitoring network, which comprises two NEPM Performance Monitoring Stations 
			(PMS) in Monash and Florey, and a smaller station in Civic. The Monash PMS is approximately 300 metres west of Cockcroft Avenue and the Florey PMS is in Neumann
			Place.ACT Health monitors carbon monoxide (CO), nitrogen dioxide (NO2), photochemical oxidants as ozone (O3), particulate matter less than 10 micrometres (PM10) 
			and particulate matter less than 2.5 micrometres (PM2.5).<br>PM10 and PM2.5 are the pollutants of most concern in the ACT. Elevated levels of particulate matter can 
			arise, for example, in colder months due to wood smoke emitted from the use of wood heaters. They may also occur from bushfire and burn-off events in and around the
			ACT.</br></br>Photochemical oxidants, such as ozone, are generally not directly emitted. They are formed by the reaction of pollutants in the atmosphere. Ozone is 
			formed when nitrogen oxides react with a group of air pollutants known as Reactive Organic Compounds (ROC) in the presence of sunlight. Emissions from motor vehicles 
			are the primary source of carbon monoxide and oxides of nitrogen pollution in the ACT. Due to a lack of heavy industry the ACT does not monitor sulfur dioxide for the NEPM. 
				
		</div>

	</div>	
	<!-- /container -->     
		
	
	<!-- Footer Insertion (see footer.php) -->
	<?php include 'footer.php'; ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
</html>
	