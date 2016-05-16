<?php 
/* connection: host, user, password, & db schema */ 
include_once 'db_utility.php';
 $output = '';  
 $query = "SELECT * FROM invited_members ORDER BY user_id ASC";  
$result = $mysqli->query($query);
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

      while ($row = $result->fetch())
      {  
      //using html5 contenteditable attribute 
           $output .= '  
                <tr>  
                     <td>'.$row["user_id"].'</td>  
                     <td class="User_Name" data-id1="'.$row["user_id"].'" contenteditable>'.$row["User_Name"].'</td> 
                     <td class="PW" data-id2="'.$row["user_id"].'" contenteditable>'.$row["PW"].'</td>  
                     <td class="Description" data-id3="'.$row["user_id"].'" contenteditable>'.$row["Description"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["user_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
 
 // o rows 

 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  