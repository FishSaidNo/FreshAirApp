 <?php  
include_once 'db_utility.php';
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE freshair.invited_members SET ".$column_name."='".$text."' WHERE user_id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  

