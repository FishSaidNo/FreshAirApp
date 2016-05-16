<?PHP
session_start();
/**
 * index page
 * default page for user
 */
include_once 'db_utility.php';
if(!isset($_SESSION['Yes'])){
echo("<script>location.href = '/index.php?msg=$msg';</script>");
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
</body>
</html>

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
                data:{id:id, text:text, column_name:column_name},  
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
						
						 <div id="topbar">
  <a href="http://freshairbrisbane.com">Back to the website</a>
  </div>
    <div id="topbar">
  <a href="adminData.php">Back to the Table</a>
  </div>
  
   <!-- profile body -->
  
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
		 
		  <!-- establish php connection -->

		 <?php
				 
		 $sql = "INSERT INTO invited_members(User_Name, PW, Description, user_id)
		  VALUES
		  ('$_POST[User_Name]','$_POST[PW]','$_POST[Description]','$_POST[id]')";  

		
		
		?>                     
							<!-- Implment form -->
												 
					   <!-- Note: we need to send users name, password to the intered email? -->  
				<h3 align="center">Invite New Members</h3><br />                                 
				<div>
			  <form  action="profile.php#members" method="post" >
			  <label for="id">ID</label>
			  <span style="color:blue;font-weight:bold" > Type unique ID</span> 
			  <input type="text" id="id" name="id" required>

			  <label for="User_Name">User Name</label>
			  <input type="text" id="User_Name" name="User_Name" required>

			  <label for="PW">Password</label>
			  <span style="color:blue;font-weight:bold" id="passstrength"></span><br>
			  <input type="text" id="PW" name="PW" required>
			  
			  <label for="Description">Description</label>
			  <input type="text" id="Description" name="Description">
			  
			  <label for="Message">Message</label>
			  <input type="text" id="Message" name="Message" >
			  
			  <label for="email">Email</label>
			  <input type="email" name="email" required>
		  
			 <input type="submit" name="submit_form" value="Invite Member">
			 </form>
			 </div>
			   </section>
			   
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