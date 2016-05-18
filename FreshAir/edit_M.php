 <?php  
 $connect = mysqli_connect("localhost", "freshai1_root", "admin123456", "freshai1_freshair");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE invited_members SET ".$column_name."='".$text."' WHERE user_id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  
