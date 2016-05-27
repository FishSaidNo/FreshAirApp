<?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");  
 $sql = "DELETE FROM invited_members WHERE user_id = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?> 