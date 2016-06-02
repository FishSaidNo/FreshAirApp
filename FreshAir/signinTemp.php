<?PHP
session_start();
/**
 * Login page for administrators
 */
include_once 'db_utilityClients.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['email'] && $_POST['password']) {
        $username=$_POST['email'];
        $password=$_POST['password'];                
        /**
         * we use md5 to hash password, so here we use md5 hashed password to compare
         */
        $query="select * from guest_members where Email='$username' and Password='".md5($password)."'"; 
		$result = $mysqli->prepare($query);
		$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result->execute();
        $row=$result->fetch(PDO::FETCH_ASSOC);          
        $row_cnt = $result->rowCount();
		
		 /**
         * Check if there is any matching.
         */
		
        if($row_cnt!=1){
                echo "<script>alert('Invalid Username or password'); location.href='signinTemp.php'</script>";      			 
        }
			if($username==$row['Email']&&$password=$row['Password']){	
			   	 /**
			         * start a session if user is found and match the password
				 */
				session_start();
				$_SESSION['Invited']=$row['Name'];		   
				echo("<script>location.href = '/dataInvited.php';</script>");
							
			} 
			
	}
	 echo "<script>alert('Fields are blank or Invalid'); location.href='signin.php'</script>";  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Sign In</title>

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
       <script src="js/registervalidation.js"></script>
	<![endif]-->
</head>

<body class="home">

	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>

	<header id="head" class="secondary"></header>

	<!-- Content -->
	<div class="container">
		
		<!-- Page Indicators -->
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Guest Users Access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">			
				<!-- Page Title -->
				<header class="page-header">
					<h1 class="page-title">Sign in Guest Users</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							
							
							
							<hr>
							
							<form onsubmit="return validateForm()" method="post" action="signinTemp.php" >
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email" required>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="password" required>
								</div>

								<hr>
								<div class="row">
									<div class="col-lg-8">
										<b><a href="forgotPassword.php">Forgot password?</a></b>
									</div>
									<div class="col-lg-4 ">
										<button class="btn btn-action" type="submit">Sign in</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->

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