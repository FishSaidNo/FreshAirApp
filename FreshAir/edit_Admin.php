
 <?php  
include_once 'db_utility.php';
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE tbl_sample SET ".$column_name."='".$text."' WHERE id='".$id."'";  
      echo 'Data Updated';  
 ?>  

