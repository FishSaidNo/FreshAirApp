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
					
						<p style="text-align:justify">The air quality is in your hand so get up and start using the apps to see the quality of the air in the area you are living. 
						The best thing about these apps is that it’s very simple and easy to use. All mobile user have to do is download them on their mobile devices, launch and 
						use them wherever they go and whenever they want. You want to make sure you live in a healthy place and live a healthy life style so download the apps and
						check the air quality in where you are living. The app is designed to make it easier for people to send the data through sms message. The air quality is in 
						your hand so get up and start using the apps to see the quality of the air and data. The app can report air pollution levels directly to the database. 
						You can send the data to website server and via sms through the apps. The first data source is Airbeam, which is a sensor created by HabitatMap in 2014. 
						The sensor reports information such; "temperature, humidity, carbon monoxide (CO) and nitrogen dioxide" (Aircasting, n.d.). The data is then sent to users 
						phones via sms messages. This is selected to expand the circle of users to those who are far from Internet connection. This information will be used to help 
						people be aware of, and adjust their exposure to air pollution both at home and their workplaces. </p></br></br>

						<p style="text-align:justify">HabitatMap worked with a community of scientists, educators, engineers, and other non-profits to create the AirBeam. 
						The AirBeam measures fine particulate matter (PM2.5), temperature, and relative humidity. The AirBeam uses a light scattering method to measure PM2.5. 
						Air is drawn through a sensing chamber wherein light from an LED bulb scatters off particles in the airstream. This light scatter is registered by a detector 
						and converted into a measurement that estimates the number of particles in the air. Via Bluetooth, these measurements are communicated approximately once a second 
						to the AirCasting Android app, which maps and graphs the data in real time on your smartphone. At the end of each AirCasting session, the collected data is sent to
						the AirCasting website, where the data is crowdsourced with data from other AirCasters to generate heat maps indicating where PM2.5 concentrations are highest and lowest.
						As an open-source platform, modifying our components to take other measurements and or transmit the data to other websites or apps is easy and encouraged. We’ve even
						included Add-on Sensor Pins on the AirBeam to make adding sensors simple.
						</p></br></br>


						<div style="text-align:center"><img src="assets/images/airbeamWorks.jpg" width="650" height="1280" alt="" /></div></br>

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
	