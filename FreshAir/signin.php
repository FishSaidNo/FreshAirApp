<?PHP
session_start();
/**
 * login page for user to login
 */
include_once 'db_utility.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['username'] && $_POST['password']) {
        $username=$_POST['username'];
        $password=$_POST['password'];                
        /**
         * we use md5 to hash password, so here we use md5 hashed password to compare
         */
        $query="select * from  members where email_address='$username' and password='".md5($password)."'"; 
        $result = $mysqli->query($query); 
        $row=$result->fetch(PDO::FETCH_ASSOC);          
        $row_cnt = $result->rowCount();
        if($row_cnt!=1){
                echo "<script>alert('Invalid Username or password'); location.href='signin.php'</script>";      			 
        }
		  if($username==$row['email_address']&&$password=$row['password']){	
		   if($username=='admin'){
				session_start();
				$_SESSION['Admin']='Admin';		   
				echo("<script>location.href = '/adminData.php';</script>");
			}			
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
       <script src="js/registervalidation.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

		<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">User access</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Sign in</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign in to your account</h3>
							<p class="text-center text-muted">If you are an invited User please, <a href="signinTemp.php">Login</a> </p>
							
							
							<hr>
							
							<form onsubmit="return validateForm()" method="post" action="signin.php" >
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="username">
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="password">
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


	
	<?php include 'footer.php'; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>