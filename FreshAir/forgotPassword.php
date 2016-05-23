<?PHP

/**
 * index page
 * default page for user
 */
session_start();
include_once 'db_utility.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['email']) {
        $email = $_POST['email'];  
        $query="SELECT * FROM members where email_address='$email'"; 
        $result = $mysqli->query($query); 
        $row=$result->fetch(PDO::FETCH_ASSOC); 	
		$row_cnt = $result->rowCount();		
		 if($row_cnt!=1){
             echo "<script>alert('Email is not Registered'); location.href='forgotPassword.php'</script>";				 
        } else {
        echo("<script>alert('A link has been sent to your email to create a new password');</script>");    
			
			$to = $_POST['email']; // this is your Email address
			$from = "freshairbne@gmail.com"; // this is the sender's Email address
			$link = "http://freshairbrisbane.com/passwordCreationAdmin.php";
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
	
	<title>Fresh Air - Create Your Own Reality</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	
	<script src="js/regitervalidation.js"></script>

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
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Forgot Password</li>
		</ol>

		<div class="row">
			
		
				<header class="page-header">
					<h1 class="page-title">Forgot Password</h1>
				</header>
				<div class="">	
					 <div id="w">
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
	 
	
				</div><!-- @end #content -->
		</div><!-- @end #w -->
							
					
	</div>
		
	
	<!-- /container -->
	
<?php include 'footer.php'; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
		