<?PHP
/**
 * register user
 */
include_once 'db_utility.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] && $_POST['email']) {
        $username = $_POST['email'];
        $password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $query = "INSERT INTO members(first_name,last_name,password,email_address) "
                . " VALUES ( '" . $firstname . "','" . $lastname . "','" . md5($password) . "','" . $email . "')";
        $mysqli->query($query);
        echo("<script>location.href = '/index.php?msg=$msg';</script>");
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Create Your Own Reality</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	<script type="text/javascript" src="js/myscripts.js"></script>
	
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
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Registration</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">If you have and account please, <a href="signin.php">Login</a> </p>
							<hr>

							<form method="post" name="form" action="signup.php" onsubmit="return validateForm()">
								<div class="top-margin">
									<label>First Name</label>
									<input type="text" class="form-control" name="firstname">
								</div>
								<div class="top-margin">
									<label>Last Name</label>
									<input type="text" class="form-control" name="lastname">
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email">
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input type="password" id="pwd" class="form-control" name="password">
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">									
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input type="password" id="cpwd" class="form-control"  name="confirmpassword">
								</div>
						</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										 <button class="btn btn-action" type="submit" onclick="return CheckPasswordNew();">Register</button>                     
									</div>
									<div class="col-lg-4 text-right">
										
										<button class="btn btn-action" type="reset">Reset</button>   
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


 <script>

        function CheckPasswordNew() {

console.log("test password");
            var txt = document.getElementById("pwd").value;

            if (txt == '' || txt == null || txt == undefined) {
                alert("Please input the password");
                return false;
            }
           
            
            if(txt.length < 8)
            {
                alert("Password should be 8 character long");
                return false;
            }

            var isNum = true;
            var isChar = true;
            
            for (var i = 0 ; i < txt.length; i++) {
                var num = txt.charCodeAt(i);

                if (num >= 65 && num <= 92)
                    isChar = false;

                if (num >= 48 && num <= 57)
                    isNum = false;
            }

            if (isNum || isChar)
            {
                alert("Password should contain at least 1 upper case character and 1 number");
                return false;
            }
            

console.log("text");
            var ctxt = document.getElementById("cpwd").value;

if( txt != ctxt )
{ alert("Password and confirm password are not same ");
return false;}

            else
            return true;
        }

    </script>

</body>
</html>