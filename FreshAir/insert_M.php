 <?php  
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");
 $sql = "INSERT INTO invited_members(User_Name, PW, Description, user_id ) VALUES('".$_POST["email"]."', '".$_POST["PW"]."','".$_POST["Description"]."','".$_POST["id"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
