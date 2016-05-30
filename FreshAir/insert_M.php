 <?php  
 /**
 * Connection to the DB
 * Insert data to the guest_members table
 */
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair");
 $sql = "INSERT INTO guest_members(Email, Name, Password, Description ) VALUES('".$_POST["email"]."', '".$_POST["name"]."','".$_POST["password"]."','".$_POST["description"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?>
