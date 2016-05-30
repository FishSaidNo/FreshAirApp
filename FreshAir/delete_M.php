<?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");  
 $sql = "DELETE FROM guest_members WHERE Email = '".$_POST["email"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?> 