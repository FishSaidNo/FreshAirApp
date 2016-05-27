<?php 
/* connection: host, user, password, & db schema */ 
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair"); 
 $output = '';  
 $sql = "SELECT * FROM invited_members ORDER BY user_id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">ID</th>  
                     <th width="26%">Members</th>  
                     <th width="26%">Password</th>  
                     <th width="28%">Description</th>  
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
      //using html5 contenteditable attribute 
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="User_Name" data-id1="'.$row["id"].'" contenteditable>'.$row["User_Name"].'</td> 
                     <td class="PW" data-id2="'.$row["id"].'" contenteditable>'.$row["PW"].'</td>  
                     <td class="Description" data-id3="'.$row["id"].'" contenteditable>'.$row["Description"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      } 
 
 } 
 // o rows 
  else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  