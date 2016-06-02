<?PHP
session_start();
/**
 * Admin Profile
 * 
 */
include_once 'db_utility.php';
if(!isset($_SESSION['Admin'])){
echo("<script>location.href = '/index.php?msg=$msg';</script>");
echo("<script>alert('Admin permission needed');</script>");
}

					
$query = "select * from admin_members where Name='{$_SESSION['Admin']}'"; //query to select information
$result = $mysqli->prepare($query); //prepare statement to make db connection safer
$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result->execute();
$row=$result->fetch(PDO::FETCH_ASSOC);						

if(isset($_POST['invite'])){  
    if ($_POST['password'] && $_POST['email']) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $description = $_POST['description'];
		$messageToSend = $_POST['message'];
		
		$query = "SELECT * from admin_members WHERE Email='$email'";
        $result = $mysqli->prepare($query);
		$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result->execute();
		$row=$result->fetch(PDO::FETCH_ASSOC);          
        $row_cnt = $result->rowCount();
		
		if($row_cnt!=0){
                echo "<script>alert('Email already registered'); location.href='adminProfile.php'</script>";      			 
        } else {		
			$query = "INSERT INTO admin_members (Email, Name, Password, Description) "
					. " VALUES ( '" . $email . "','" . $name . "','" . md5($password) . "','" . $description. "')";
			$result = $mysqli->prepare($query);
			$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$result->execute();
			echo("<script>alert('User Invited');</script>");
		}
    
		$to = $_POST['email']; // this is your Email address
		$from = "freshairbne@gmail.com"; // this is the sender's Email address   
		$link = "http://freshairbrisbane.com/signinTemp.php";
		$subject = "Data Access Invitation";
		$message = "Hi," . $name . ".\n\n Please go to this link: " . $link . "\n\n  and log in using the credentials below:\n\n Email: " . $to . "\n\n Password: " . $_POST['password'] . "\n\n Message: " . $messageToSend;

		$headers = "From:" . $from;
		$headers2 = "From:" . $to;
		mail($to,$subject,$message,$headers);
   }
}
   
if(isset($_POST['invite2'])){  
if ($_POST['password'] && $_POST['email']) {
	$name = $_POST['name'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$description = $_POST['description'];
	$messageToSend = $_POST['message'];
		$query = "SELECT * from guest_members WHERE Email='$email'";
        $result = $mysqli->prepare($query);
		$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result->execute();
		$row=$result->fetch(PDO::FETCH_ASSOC);          
        $row_cnt = $result->rowCount();
		
		if($row_cnt!=0){
                echo "<script>alert('Email already registered'); location.href='adminProfile.php'</script>";      			 
        } else {	
	$query = "INSERT INTO guest_members (Email, Name, Password, Description) "
			. " VALUES ( '" . $email . "','" . $name . "','" . md5($password) . "','" . $description. "')";
	$result = $mysqli->prepare($query);
	$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result->execute();
	echo("<script>alert('User Invited');</script>");

	$to = $_POST['email']; // this is your Email address
	$from = "freshairbne@gmail.com"; // this is the sender's Email address   
	$link = "http://freshairbrisbane.com/signinTemp.php";
	$subject = "Data Access Invitation";
	$message = "Hi," . $name . ".\n\n Please go to this link: " . $link . "\n\n  and log in using the credentials below:\n\n Email: " . $to . "\n\n Password: " . $_POST['password'] . "\n\n Message: " . $messageToSend;

	$headers = "From:" . $from;
	$headers2 = "From:" . $to;
	mail($to,$subject,$message,$headers);
		}
	}
}

if(isset($_POST['update'])){     
	$name = $_POST['name'];
	$password = $_POST['password'];
	$newpassword = $_POST['newPassword'];
	$newpassword1 = $_POST['newPassword1'];
	$email = $_POST['email'];
	$description = $_POST['description'];
	
	$query = "select * from admin_members where Name='{$_SESSION['Admin']}'"; //query to select information
	$result = $mysqli->prepare($query); //prepare statement to make db connection safer
	$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$result->execute();
	$row=$result->fetch(PDO::FETCH_ASSOC);		
	
	if (($name || $password || $newpassword || $newpassword1 || $email || $description) == '') {
		echo("<script>alert('Invalid Data');</script>");
	} else {		
		if ($_POST['email'] == $row['Email']) {
			if ($_POST['newPassword'] == $_POST['newPassword1']) {
				if (md5($password) == $row['Password']) {				
					$query = "UPDATE admin_members SET Name='$name', Password='". md5($newpassword) ."', Description=' $description' WHERE Email='$email'";            
					$mysqli->query($query);
					echo("<script>alert('Data Updated');</script>");
				} else {
					echo("<script>alert('Wrong Password');</script>");
				}
			} else {
				echo("<script>alert('New Passwords do not Match');</script>");
			}
		} else {
				echo("<script>alert('Wrong Email');</script>");			
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
	
	<title>Fresh Air - Profile</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	
	<script type="text/javascript" src="js/jquery-profile.min.js"></script>
    <script src="assets/js/password-strength.js"></script>
	<script src="assets/js/registervalidation.js"></script>

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	
	<!-- Custom styles for the profile -->
	<link rel="stylesheet" href="assets/css/profilestyle.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>

<!-- Admin Profile updating -->
 <script>  
 //This function will upload the data from our db
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_Admin.php",  
                method:"POST",  
                success:function(data){  
                     $('#Admin_data').html(data);  
                }  
           });  
      }  
      fetch_data(); 
	  
	  //Delete data
      $(document).on('click', '.btn_delete', function(){  
			var id2 =$(this).data("id6"); 			
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_A.php",  
                     method:"POST",  
                     data:{id:id2},  
                     dataType:"text",  
                     success:function(data){  
                          fetch_data();  
                     }					 
                });  			
			}			
      }); 	  
 
      
  });  
 </script> <!-- End Admin Profile updating -->
 
<!-- Start Members Profile updating -->
  <script>  
 //This function will upload the data from our db
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_M.php",  
                method:"POST",  
                success:function(data){  
                     $('#Members_data').html(data);  
                }  
           });  
      }  
      fetch_data();     


      //Delete data
      $(document).on('click', '.btn_delete', function(){  
			var id =$(this).data("id5"); 			
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_M.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }					 
                });  			
			}			
      }); 	  
 });  
 </script> 

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Admin Profile</li>
		</ol>

		<div class="row">			
		
			<header class="page-header">
				<h1 class="page-title">Profile</h1>
			</header>
												
			
			<div id="content" class="clearfix">
			
				<div id="userphoto"><img src="assets/images/avatar.png" alt="default avatar"></div>
				
				<h2 class="page-title">Hello, <?PHP echo $_SESSION['Admin']?></h2></br></br>
			
				 <nav id="profiletabs">
					<ul class="clearfix">
					  <li><a href="#bio" >Bio</a></li>
					  <li><a href="#members">Members</a></li>
					  <li><a href="#Admins">Admins</a></li>
					  <li><a href="#settings">Settings</a></li>
					</ul>
				  </nav>
			  
				  <!-- Tab: 1 Bio -->
				<section id="bio">
					</br></br><h3> This is Fresh Air main admin account.  </h3></br>
					<h4> Holder has the authority to manage members and other admins.</h4>
				</section>
			  

				<!-- Tab: 2 Manage members -->
				<section id="members" class="hidden">


					 </br><h2 align="center">Current Members</h2></br>  
					  <!-- Call table -->
					 <div id="Members_data"></div> 
					 <!-- form -->
			 
					<!-- Implment form -->
													 
						   <!-- Note: we need to send users name, password to the intered email? -->  
						</br><h2 align="center">Invite New Members</h2>                                
						<div class="panel-body">

							<form method="post" name="form" action="" onsubmit="return validateForm()">
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name" required>
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email" required>
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input id="password" type="password" id="pwd" class="form-control" name="password" required>
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description" required>
								</div>
								
								<div class="top-margin">
								   <label> Message:<span class="text-danger">*</span></label>
								<br><textarea rows="4" name="message" class="form-control" cols="30"></textarea><br>
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-8">
										 <button class="btn btn-action" type="submit" name="invite2">Register</button>                     
									</div>
									
								</div>
							</form>
						</div>
				</section>
					   
				<!-- Tab:3 Manage Admins -->     
				<section id="Admins" class="hidden">
					</br><h2 align="center">Current Administrators</h2></br>
					
					<!-- Call table -->
					<div id="Admin_data"></div>    

					</br><h2 align="center">Add New Administrator</h2>                                 
						<div class="panel-body">

							<form method="post" name="form" action="" >
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name" required>
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email" required>
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input id="password" type="password" class="form-control" name="password" required>
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description" required>
								</div>
								
								<div class="top-margin">
								   <label> Message:<span class="text-danger">*</span></label>
								<br><textarea rows="4" name="message" class="form-control" cols="30"></textarea><br>
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-8">
										 <button class="btn btn-action" type="submit" name="invite">Register</button>                     
									</div>
									
								</div>
							</form>
						</div>					
				</section>

				<!-- Tab: 4 Admin settings -->          
				<section id="settings" class="hidden"></br></br>				
				
					  <!-- This admin ? -->
					  
					                                  
						<div class="panel-body">					
							<h3 align="left">Your Details:</h3></br> 
							
							
							<p class="setting"><b>Name: </b><?PHP echo $row['Name']; ?></p>
								
							<p class="setting"><b>E-mail Address: </b><?PHP echo $row['Email']; ?></p>
								
							<p class="setting"><b>Description: </b><?PHP echo $row['Description']; ?></p></br>		
							
								
							<h3 align="left">Update Details:</h3></br>

							<form method="post" name="form"  action="adminProfile.php">
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name" required>
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email" required>
								</div>
															
								<div class="top-margin">
										<label>Old Password <span class="text-danger">*</span></label>
										<input id="password" type="password" class="form-control" name="password" required>
								</div>
								
								<div class="top-margin">
										<label>New Password <span class="text-danger">*</span></label>
										<input id="newPassword" type="password" class="form-control" name="newPassword" required>
								</div>
								
								<div class="top-margin">
										<label>Re-enter New Password <span class="text-danger">*</span></label>
										<input id="newPassword1" type="password" class="form-control" name="newPassword1" required>
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description" required>
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-8">
										 <button class="btn btn-action" onclick="validateForm()" type="submit" name="update">Update</button>                     
									</div>
									
								</div>
							</form>
						</div>	
					
				  </section>
			</div>
		</div>
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
		