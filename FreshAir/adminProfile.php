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

include_once 'db_utility.php';

if(isset($_POST['invite'])){  
    if ($_POST['password'] && $_POST['email']) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $description = $_POST['description'];
		$messageToSend = $_POST['message'];
        $query = "INSERT INTO guest_members (Email, Name, Password, Description) "
                . " VALUES ( '" . $email . "','" . $name . "','" . md5($password) . "','" . $description. "')";
        $mysqli->query($query);
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

if(isset($_POST['update'])){    
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $description = $_POST['description'];
        $query = "UPDATE admin_members SET Name='$name', Password='". md5($password) ."', Description=' $description' WHERE Email='$email'";            
        $mysqli->query($query);
        echo("<script>alert('Data Updated');</script>");
 
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
      
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_Admin.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.Email', function(){  
           var id = $(this).data("id1");  
           var email = $(this).text();  
           edit_data(id, email, "Email");  
      });  
      $(document).on('blur', '.Name', function(){  
           var id = $(this).data("id2");  
           var name = $(this).text();  
           edit_data(email, name, "Name");  
      }); 
       
      $(document).on('blur', '.Description', function(){  
           var id = $(this).data("id3");  
           var description = $(this).text();  
           edit_data(id, description, "Description");  
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
      

      
      //Live update 
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit_M.php",  
                method:"POST",  
                //id IS STABLE PK ID, text is the value for the columns and column is the stable header
                data:{id: id, text: text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      
      //UPDATE User_name field replace the entered w the exist in the db
      $(document).on('blur', '.Email', function(){  
           var id = $(this).data("id1");  
           var email = $(this).text();  
           if(email == '')  
           {  
                alert("Please Enter User Email");  
                return false;  
           } else {
                edit_data(id, email, "Email");  
                }
      }); 
      
     //UPDATE PASSWORD (PW) 
      $(document).on('blur', '.Password', function(){  
           var id = $(this).data("id2");  
           var password = $(this).text();  
           if(password == '')  
           {  
                alert("Please Enter Password");  
                return false;  
           }  else {
                 edit_data(id, password, "Password");  
           }
      });  
      
     //UPDATE Description
      $(document).on('blur', '.Description', function(){  
           var id = $(this).data("id3");  
           var description = $(this).text();  
           edit_data(id, description, "Description");  
      });  
      
      //Delete data
      $(document).on('click', '.btn_delete', function(){  
           var id = $(this).data("id4");  
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
				
				<h2 class="page-title">Welcome, Admin</h2></br></br>
			
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


					 <h3 align="center">Manage Members</h3><br />  
					  <!-- Call table -->
					 <div id="Members_data"></div> 
					 <!-- form -->
			 
					<!-- Implment form -->
													 
						   <!-- Note: we need to send users name, password to the intered email? -->  
						<h3 align="center">Invite New Members</h3><br />                                 
						<div class="panel-body">

							<form method="post" name="form" action="" onsubmit="return validateForm()">
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name">
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email">
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input id="password" type="password" id="pwd" class="form-control" name="password">
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description">
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
					   
				<!-- Tab:3 Manage Admins -->     
				<section id="Admins" class="hidden">
					<h3 align="center">Admins Table</h3><br />  
					
					<!-- Call table -->
					<div id="Admin_data"></div>    

					<h3 align="center">Add New Admin Members</h3><br />                                 
						<div class="panel-body">

							<form method="post" name="form" action="" >
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name">
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email">
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input id="password" type="password" class="form-control" name="password">
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description">
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
					  
					  <h3 align="center">Update Details:</h3><br />                                 
						<div class="panel-body">

							<form method="post" name="form" action="adminProfile.php">
								<div class="top-margin">
									<label>Name</label>
									<input id="name" type="text" class="form-control" name="name">
								</div>					
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control" name="email">
								</div>

								<div class="top-margin">
										<label>Password <span class="text-danger">*</span></label>
										<input id="password" type="password" class="form-control" name="password">
								</div>
								
								<!--<div class="col-sm-6"> -->
								<div class="top-margin">
								   <label> User Description: <span class="text-danger">*</span></label>
									<input id="description" type="text" class="form-control" name="description">
								</div>
								<hr>

								<div class="row">
									<div class="col-lg-8">
										 <button class="btn btn-action" type="submit" name="update">Update</button>                     
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
		