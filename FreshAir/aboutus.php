<?PHP
session_start();
/**
 * index page
 * default page for user
 */
include_once 'db_utility.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Create Your Own Reality</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">About Us</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
				<header class="page-header">
					<h1 class="page-title">About QUT freshair</h1><br>
				</header>
                <h3>Who are we?</h3>
				<p align="justify">This website is a project conducted by Queensland University of Technology (Science and Engineering faculty) students for INB302 IT Capstone unit 2016 semester 1. The project team is known as “Green IT Solutions” supervised by Dr. Matthew Dunbabin. Our main goal is to update the real world users daily how clean and polluted the air is around Brisbane Suburbs, and to illustrate the real time air quality data in to numbers and colours that help public to understand and to take action against air pollution.
                </br></br><div style="text-align:center"><img src="assets/images/team.png"/></div></br></br>
				
				
				<h3>What we offer on this website</h3></br>
				<p align="justify">
				<ol>
					<li>
						Air Quality Forecasts - Queensland Nationwide daily forecasts. 
					</li>
					<li>
						Current Air Quality Conditions - Nationwide and regional real-time ozone and particle pollution air quality maps covering all Queensland states. 
					</li>
					<li>
						Maps are updated hourly. Program: Schools, organizations, and the community know the daily air quality conditions by using colored indicator on the map.
					</li>

				</ol>
				</p>

				<h3>About the data</h3></br>
				<p align="justify">
				<ol>
					<li>
						Map and forecast data are collected using federal reference  
					</li>
					<li>
						Although preliminary data quality assessments are performed, the data in QUT Fresh Air are not fully verified and validated through the quality assurance procedures monitoring organizations used to officially submit and certify data on the EPA Air Quality System (AQS). 
					</li>
					<li>
						This data sharing and centralization creates a one-stop source for real-time and forecast air quality data. The benefits include quality control, national reporting consistency, access to automated mapping methods, and data distribution to the public and other data systems. 
					</li>

				</ol>
				</p>

		</div>
	</div>	<!-- /container -->

<?php include 'footer.php'; ?>



	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>