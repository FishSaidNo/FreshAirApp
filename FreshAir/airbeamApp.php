<?PHP
session_start();
/**
* index page
* default page for user
*/
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
<body  class="home">  
<?php include 'menu.php'; ?>

			<!-- /.navbar -->
    <!-- Header -->
	<header id="head" class="secondary"></header>
	
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">App</li>
		</ol>	       

			<h2 style="text-align:center"> Get to know the AIRBEAM</h2>

		
				<div class="container">
				
					<div class="jumbotron top-space">
					<br>
					<div style="text-align:center"><img src="assets/images/airbeam.jpg" width="650" height="720" alt="" /></div> <br/>
						<p>ACT Health operates the Territory's air quality monitoring network, which comprises two NEPM Performance Monitoring Stations (PMS) in Monash and Florey, and a smaller station in Civic. The Monash PMS is approximately 300 metres west of Cockcroft Avenue and the Florey PMS is in Neumann Place.<br>ACT Health monitors carbon monoxide (CO), nitrogen dioxide (NO2), photochemical oxidants as ozone (O3), particulate matter less than 10 micrometres (PM10) and particulate matter less than 2.5 micrometres (PM2.5).<br>PM10 and PM2.5 are the pollutants of most concern in the ACT. Elevated levels of particulate matter can arise, for example, in colder months due to wood smoke emitted from the use of wood heaters. They may also occur from bushfire and burn-off events in and around the ACT.<br>Photochemical oxidants, such as ozone, are generally not directly emitted. They are formed by the reaction of pollutants in the atmosphere. Ozone is formed when nitrogen oxides react with a group of air pollutants known as Reactive Organic Compounds (ROC) in the presence of sunlight.<br>Emissions from motor vehicles are the primary source of carbon monoxide and oxides of nitrogen pollution in the ACT.<br>Due to a lack of heavy industry the ACT does not monitor sulfur dioxide for the NEPM. following the phase out of leaded fuel on 1 January 2002, the ACT ceased monitoring lead in July 2002.</p>
						<p class="text-right"><a href="downloads/android-debug.apk" class="btn btn-primary btn-large">Download App</a></p>
					</div>				
				
				</div>						
			
	</div>	<!-- /container -->     
				
		<?php include 'footer.php'; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</body>
	
	
 </html>
	