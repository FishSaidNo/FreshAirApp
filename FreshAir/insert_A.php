 <?php 
 /**
 * Connection to de DB 
 * to insert data on   the tbl_sample table
 */
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");   
 $sql = "INSERT INTO admin_members (Email, Name, Password, Description) VALUES('".$_POST["email"]."', '".$_POST["name"]."', '".$_POST["password"]."', '".$_POST["description"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
