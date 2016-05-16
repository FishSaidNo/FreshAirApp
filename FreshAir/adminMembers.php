<?PHP
session_start();
/**
 * index page
 * default page for user
 */
include_once 'db_utility.php';
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
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          
	
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
			<li class="active">Facts</li>
		</ol>

		<div class="row">
			
		  <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Manage Members</h3><br />  
                      <!-- Call table -->
                     <div id="Members_data"></div> 
                     

                                           <!-- establish php connection -->

 
 <?php
//establish connection only when form is submitted
if (isset ($_POST['submit_form'])){
include_once 'db_utility.php';

 $sql = "INSERT INTO freshair.invited_members(User_Name, PW, Description, user_id )
  VALUES 
  ($_POST[User_Name]','$_POST[PW]','$_POST[Description]','$_POST[id]')";  


 
mysql_close($con);
}
?>
 
                    <!-- Implment form -->
                                         
               <!-- Note: we need to send users name, password to the intered email? -->  
        <h3 align="center">Invite New Members</h3><br />                                 
		<div>
	  <form  action="managmembers.php" method="post" >
	  <label for="id">ID</label>
	  <span style="color:blue;font-weight:bold">blue</span> 
      <input type="text" id="id" name="id">

	  <label for="User_Name">User Name</label>
      <input type="text" id="User_Name" name="User_Name">

      <label for="PW">Password</label>
      <input type="text" id="PW" name="PW">
      
      <label for="PW">Email</label>
      <input type="email" name="email">
      
      <label for="Description">Description</label>
      <input type="text" id="Description" name="Description">
      
      <label for="Message">Message</label>
      <input type="text" id="Message" name="Message">
  
     <input type="submit" name="submit_form" value="Submit">
     </form>
     </div>
     </section>
             
                </div>  
           </div>  
				
							
					
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