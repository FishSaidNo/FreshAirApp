<?PHP
/**
 * Forgot Password Page
 * used to send a link to the user to change their password as it is a more secure way of accessing again
 */
session_start();
/** Connection to the clients db access 
 code to introduce an email, check it on the DB and send a link to the user's email to change their password **/
include_once 'db_utilityClients.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['email']) {
        $email = $_POST['email'];  
		 
        $query="SELECT * FROM invited_members where User_Name='$email'"; 
        
		$result = $mysqli->prepare($query);
		/** Prepare query, secure procedure **/
		$result->execute();
		$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
        $row=$result->fetch(PDO::FETCH_ASSOC); 	
		$row_cnt = $result->rowCount();		
		
		
		/** Check if there is any match **/
		 if($row_cnt!=1){
             echo "<script>alert('Email is not Registered'); location.href='forgotPassword.php'</script>";				 
        } else {
        echo("<script>alert('A link has been sent to your email to create a new password');</script>");   
		echo("<script>location.href='index.php';</script>");					
			$to = $_POST['email']; // this is the User's Email address
			$from = "freshairbne@gmail.com"; // this is the FreshAir Email address
			$link = "http://freshairbrisbane.com/passwordCreationAdmin.php"; // Link to change password
			$subject = "Password Recovery";
			$message = "Change your password by clicking this link: " . $link;
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Forgot Password</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	
	<script src="assets/js/regitervalidation.js"></script>

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
	
	<!-- Content -->
	<div class="container">

		<!-- Page Indicators -->
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Forgot Password</li>
		</ol>
		<!-- End Page Indicators -->
		
		<div class="row">
			
			<!-- Page Title -->
			<header class="page-header">
				<h1 class="page-title">Forgot Password</h1>
			</header>
			<!-- End Page Title -->
							 
				<div id="content" class="clearfix">

					<!-- Implment form -->
						  
					<div class="panel-body"></br></br>

						<form method="post" name="form" action="" onsubmit="return validateForm()">										
							
							<div class="top-margin">
								<label>Email Address <span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="email">
							</div>
																
							<hr>

							<div class="row">
								<div class="col-lg-8">
									 <button class="btn btn-action" type="submit">Request Password</button>                     
								</div>
							</div></br></br></br></br></br>
						
						</form>
					</div>
		
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
		