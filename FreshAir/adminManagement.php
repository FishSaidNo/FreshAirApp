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
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Admin</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
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
<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<div class="row">			
		
				<header class="page-header">
					<h1 class="page-title">Facts</h1>
				</header>
					<div class="">
						
					   <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     <h3 align="center">Admins Table</h3><br />  
                      <!-- Call table -->
                     <div id="Admin_data"></div>                 
                </div>  
					</div>
		
		</div>
	</div>	<!-- /container -->

</body>
</html>
  <script>  
 //This function will upload the data from our db
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_A.php",  
                method:"POST",  
                success:function(data){  
                     $('#Admin_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      
 //This function will insert data and test for null 
      $(document).on('click', '#btn_add', function(){  
           var email = $('#email').text();  
           var name = $('#name').text();  
           var password = $('#password').text();  
           var description = $('#description').text();  
//Test and show appropriate msg (FOR ONLY NAME & PW, DESCRIPITION CAN BE NULL
           if(email == '')  
           {  
                alert("Please Enter Admin Email");  
                return false;  
           }  
		   
           if(name == '')  
           {  
                alert("Please Enter Admin Name");  
                return false;  
           }  
           
           if(password == '')  
           {  
                alert("Please Enter Admin Password");  
                return false;  
           }  
           
           if(description == '')  
           {  
                alert("Please Enter Description");  
                return false;  
           }  
           $.ajax({  
                url:"insert_A.php",  
                method:"POST",  
                data:{email:email, name:name, password:password, description:description},  
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
                url:"edit_Admin.php",  
                method:"POST",  
                //id IS STABLE PK ID, text is the value for the columns and column is the stable header
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      
      //UPDATE Email field replace the entered w the exist in the db
      $(document).on('blur', '.Email', function(){  
           var id = $(this).data("id1");  
           var email = $(this).text();  
           if(email == '')  
           {  
                alert("Please Enter Email");  
                return false;  
           } else {
                edit_data(id, email, "email");  
                }
      }); 
      
      
     //UPDATE Name
      $(document).on('blur', '.Name', function(){  
           var id = $(this).data("id2");  
           var name = $(this).text();  
           edit_data(id, lname, "Name");  
      });  
      
      
      
     //UPDATE email
      $(document).on('blur', '.Password', function(){  
           var id = $(this).data("id3");  
           var password = $(this).text();  
           edit_data(id, email, "Password");  
      });  
      
      
     //UPDATE PASSWORD (description) 
      $(document).on('blur', '.Description', function(){  
           var id = $(this).data("id4");  
           var description = $(this).text();  
           if(description == '')  
           {  
                alert("Please Enter Description");  
                return false;  
           }  else {
                 edit_data(id, description, "Description");  
           }
      });  
      
      
      //Delete data
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id5");  
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