<?PHP
session_start();
/**
 * Facts Page
 * Page to give information about air pollution, and some important facts to make users aware about the problems.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Facts</title>

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
	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>

	<!-- Header -->
	<header id="head" class="secondary"></header>
	
	<!-- container -->
	<div class="container">
	
		<!-- Page Indicators -->
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Facts</li>
		</ol>
		<!-- End Page Indicators -->

		<div class="row">		
				<!-- Page Title -->		
				<header class="page-header">				
					<h1 class="page-title">Facts</h1>
				</header>				
				<!-- End Page Title -->
					
				<div class="">
					<div><img src="assets/images/facts.JPG" width="1000" class="img-responsive" alt="" /></div>
				</div>
		
		</div>
	</div>	
	<!-- /container -->
	
	<!-- Footer Insertion (see footer.php) -->
	<?php include 'footer.php'; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>