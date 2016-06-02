<?PHP

/**
 * index page
 * default page for user
 */
session_start();
include_once 'db_utility.php';
if(!isset($_SESSION['Admin'])){
echo("<script>location.href = '/index.php?msg=$msg';</script>");
echo("<script>alert('Admin permission needed');</script>");
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          
	
	<script type="text/javascript" src="js/jquery-profile.min.js"></script>
	<script src="assets/js/password-strength.js"></script>

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
                url:"select_A.php",  
                method:"POST",  
                success:function(data){  
                     $('#Members_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      
 //This function will insert data and test for null 
      $(document).on('click', '#btn_add', function(){  
           var email = $('#email').text();  
           var password = $('#password').text();  
		   var name = $('#name').text(); 
           var description = $('#description').text();  
//Test and show appropriate msg (FOR ONLY NAME & PW, DESCRIPITION CAN BE NULL
           if(email == '')  
           {  
                alert("Please Enter User Email");  
                return false;  
           }  
           if(password == '')  
           {  
                alert("Please Enter Password");  
                return false;  
           }  
           $.ajax({  
                url:"insert_A.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  

      
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
	    //UPDATE name field replace the entered w the exist in the db
      $(document).on('blur', '.name', function(){  
           var id = $(this).data("id2");  
           var name = $(this).text();  
           if(name == '')  
           {  
                alert("Please Enter User Name");  
                return false;  
           } else {
                edit_data(id, name, "Name");  
                }
      }); 
      
      //UPDATE email field replace the entered w the exist in the db
      $(document).on('blur', '.email', function(){  
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

      
     //UPDATE Description
      $(document).on('blur', '.description', function(){  
           var id = $(this).data("id3");  
           var description = $(this).text();  
           edit_data(id, description, "Description");  
      });  
      
      //Delete data
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id6");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete_A.php",  
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

		<div class="row"> <br /><br /><br />  
			<div class="table-responsive">  
								 <h3 align="center">Manage Members</h3><br />  
								  <!-- Call table -->
								 <div id="Members_data"></div> 
																		 
			 
				<!-- Implment form -->
														 
				<!-- Note: we need to send users name, password to the entered email? -->  
					<h3 align="center">Invite New Members</h3><br />                                 
				<div>
					<form  action="adminManagement.php" method="post" >
						<label for="name">Name</label>
						<span style="color:blue;font-weight:bold">blue</span> 
						<input type="text" id="name" name="name">

						<label for="email">Email</label>
						<input type="text" id="email" name="email">

						<label for="password">Password</label>
						<input type="text" id="password" name="password">					

						<label for="description">Description</label>
						<input type="text" id="description" name="description">

						<label for="message">Message</label>
						<input type="text" id="message" name="message">

						<input type="submit" name="submit_form" value="Submit">
					 </form>
				 </div>
             
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