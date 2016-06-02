<?PHP
session_start();
/**
* App and Airbeam page
* information about how to use the Airbeam and the App, also the link to download the mobile app.
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
            <title>Fresh Air - Airbeam & App</title> 	    
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
			<meta charset="UTF-8">	 
			
		          		
</head>
<body  class="home">  
	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>

			
    <!-- Header -->
	<header id="head" class="secondary"></header>
	
	<!-- container -->	
	<div class="container">

		<!-- Page Indicators -->
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">App</li>
		</ol>	
		<!-- End Page Indicators -->

				<!-- Page Title -->
				<header class="page-header">
					<h1 class="page-title">Mobile App and Airbeam</h1>
				</header>
				<!-- End Page Title -->

		
				<div class="container">
				
					<div class="jumbotron top-space"></br>
					
						<p style="text-align:justify">Aibeam is air quality sensor; it is air monitor that maps, graphs and crowd source your pollution 
						contact in real-time. The airbeam use a light spreading method to measure PM2.5.  It’s wearable and handheld live streaming devices 
						that transfer current live air pollution data to your phone via Bluetooth. The airbeam can give readings on air pollution at your location 
						every second for up to 10 hours on battery life. It then broadcasts this data, under your permission, to their crowd-sourced dataset, which 
						forms a map of pollution across the country. You could take the airbeam anywhere you go to see the pollution levels on where you are. </p></br>
						
						<p style="text-align:justify">The air quality is in your hand so get up and start using the apps to see the quality of the air and data. 
						The app can report air pollution levels directly to the database. You can send the data to website server and via sms through the apps.
						The first data source is Airbeam, which is a sensor created by HabitatMap in 2014. The sensor reports information such; "temperature, humidity,
						carbon monoxide (CO) and nitrogen dioxide" (Aircasting, n.d.). The data is then sent to users phones via sms messages. 
						This is selected to expand the circle of users to those who are far from Internet connection. This information will be used 
						to help people be aware of, and adjust their exposure to air pollution both at home and their workplaces. </p></br></br>
						
						<div style="text-align:center"><img src="assets/images/airbeam.jpg" width="650" height="720" alt="" /></div></br>
						 
						<p class="text-right"><a href="downloads/android-debug.apk" class="btn btn-primary btn-large">Download App</a></p>
					
					</div>				
				
				</div>						
			
	</div>	
	<!-- /container -->  
	
				
	<!-- Footer Insertion (see Menu.php) -->
	<?php include 'footer.php'; ?>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
	
	
 </html>
	