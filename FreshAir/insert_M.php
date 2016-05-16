 <?php  
include_once 'db_utility.php';
 $sql = "INSERT INTO invited_members(user_name, pw, description, user_id) VALUES('".$_POST["User_Name"]."', '".$_POST["PW"]."','".$_POST["Description"]."','".$_POST["id"]."')";  
      echo 'Data Inserted';   
 ?>
