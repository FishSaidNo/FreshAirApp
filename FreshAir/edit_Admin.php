 <?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE tbl_sample SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  

