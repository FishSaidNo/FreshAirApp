

<?php  
include_once 'db_utility.php';
 $sql = "DELETE FROM invited_members WHERE user_id = '".$_POST["id"]."'";  
      echo 'Data Deleted';  
?> 

