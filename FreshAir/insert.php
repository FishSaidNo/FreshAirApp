 <?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");   
 $sql = "INSERT INTO tbl_sample(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
