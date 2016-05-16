 <?php  
include_once 'db_utility.php';
 $sql = "INSERT INTO tbl_sample(first_name, last_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."')";  
      echo 'Data Inserted';   
 ?>