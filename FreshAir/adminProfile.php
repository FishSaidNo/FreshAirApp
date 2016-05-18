<?PHP
session_start();
/**
 * index page
 * default page for user
 */
if(!isset($_SESSION['Yes'])){
echo("<script>location.href = '/index.php?msg=$msg';</script>");
echo("<script>alert('Admin permission needed');</script>");
}
include_once 'db_utility.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] && $_POST['email']) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $text = $_POST['message'];
        $id= $_POST['text'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $query = "INSERT INTO invited_members (User_Name,PW, Description, user_id) "
                . " VALUES ( '" . $firstname . "','" . md5($password) . "','" . $text. "','" . $id. "')";
        $mysqli->query($query);
        echo("<script>alert('Data Sent');</script>");
    }

    $to = $_POST['email']; // this is your Email address
    $from = "freshairbne@gmail.com"; // this is the sender's Email address
    $first_name = $_POST['firstname'];  
    $link = "http://freshairbrisbane.com/signinTemp.php";
    $last_name = $_POST['lastname'];
    $subject = "Data Access Invitation";
    $message = "Please go to this link: " . $link . "\n\n  and log in using the credentials below:\n\n Email: " . $to . "\n\n Password: " . $_POST['password'] . "\n\n Message: " . $text;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
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
	
	  <script type="text/javascript" src="js/jquery-profile.min.js"></script>
  <script src="js/password-strength.js"></script>

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>
<!-- MINI NAVIGATION BAR-->
	<style>
	#topbar {
 	 background: #006666;
 	 padding: 10px 0 10px 0;
 	 text-align: center;
 	 height: 36px;
 	 overflow: hidden;
 	 -webkit-transition: height 0.5s linear;
 	 -moz-transition: height 0.5s linear;
 	 transition: height 0.5s linear;
	}
	#topbar a {
 	 color: #FFFFFF;
 	 font-size:1.3em;
  	line-height: 1.25em;
  	text-decoration: none;
 	 opacity: 1;
 	 font-weight: bold;
	}
	#topbar a:hover {
 	 color: #000000;
         opacity: 0.6;
	}
	</style>
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
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "last_name");  
      }); 
       
      $(document).on('blur', '.pw', function(){  
           var id = $(this).data("id3");  
           var pw = $(this).text();  
           edit_data(id, pw, "pw");  
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
                data:{id: user_id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      
      //UPDATE User_name field replace the entered w the exist in the db
      $(document).on('blur', '.User_Name', function(){  
           var id = $(this).data("id1");  
           var User_Name = $(this).text();  
           if(User_Name == '')  
           {  
                alert("Please Enter User Name");  
                return false;  
           } else {
                edit_data(id, User_Name, "User_Name");  
                }
      }); 
      
     //UPDATE PASSWORD (PW) 
      $(document).on('blur', '.PW', function(){  
           var id = $(this).data("id2");  
           var PW = $(this).text();  
           if(PW == '')  
           {  
                alert("Please Enter Password");  
                return false;  
           }  else {
                 edit_data(id, PW, "PW");  
           }
      });  
      
     //UPDATE Description
      $(document).on('blur', '.Description', function(){  
           var id = $(this).data("id3");  
           var Description = $(this).text();  
           edit_data(id, Description, "Description");  
      });  
      
      //Delete data
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id4");  
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
					<div class="">
						
		<!-- mini navigation to profile/website/table -->		
			  <div id="topbar">
			  <a href="http://freshairbrisbane.com">Back to the website</a>
			  </div>
			  <div id="topbar">
			  <a href="adminProfile.php">Go to Profile</a>
			  </div></br></br></br>
					 <div id="w">
						<div id="content" class="clearfix">
						  <div id="userphoto"><img src="images/avatar.png" alt="default avatar"></div>
			  <h1>Admin Profile</h1>

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
				<p> This is Fresh Air's main admin account.  </p>
				<p> Holder has the authority to manage members and other admins.    </p>
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
												<label>User ID: <span class="text-danger">*</span></label>
												<input type="text" id="cpwd" class="form-control"  name="id">
										</div>
                                                                                <div class="top-margin">
                                                                                   <label> Message:<span class="text-danger">*</span></label>
                                                                                         <br><textarea rows="4" name="message" cols="30"></textarea><br>
							                        </div>
										<hr>

										<div class="row">
											<div class="col-lg-8">
												 <button class="btn btn-action" type="submit" onclick="return CheckPasswordNew();">Register</button>                     
											</div>
											
										</div>
									</form>
					</div>
				</section>
			</div>

		</div>
	
	 
			   
			   <!-- Tab:3 Manage Admins -->     
			  <section id="Admins" class="hidden">
				<h3 align="center">Admins Table</h3><br />  
				<p>Tab to update</p>
				<!--
				<ul id="friendslist" class="clearfix">
				  <li><a href="#"><img src="images/avatar.png" width="22" height="22"> Username</a></li>
				  <li><a href="#"><img src="images/avatar.png" width="22" height="22"> SomeGuy123</a></li>
				  <li><a href="#"><img src="images/avatar.png" width="22" height="22"> PurpleGiraffe</a></li>
				</ul>
				-->
							  <!-- Call table -->
							 <div id="Admin_data"></div>         
			  </section>

						   <!-- Tab: 4 Admin settings -->          
			  <section id="settings" class="hidden">
			  <br><br>
				<p>Edit your user settings:</p>
				  <!-- This admin ? -->
				
				<p class="setting"><span>E-mail Address <img src="images/edit.png" alt="*Edit*"></span> lolno@gmail.com</p>
				
				<p class="setting"><span>First Name <img src="images/edit.png" alt="*Edit*"></span> Admin_first</p>
				
				<p class="setting"><span>Last Name <img src="images/edit.png" alt="*Edit*"></span> Admin_last</p>
				
				<p class="setting"><span>Password <img src="images/edit.png" alt="*Edit*"></span> Password</p>

				
			  </section>
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
		