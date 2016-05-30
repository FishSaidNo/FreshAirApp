 <?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");  
 $id = $_POST["email"];  
 $text = $_POST["id"]; 
 $password = $_POST["password"]; 
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE guest_members SET ".$column_name."='".$text."' WHERE Email='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  
