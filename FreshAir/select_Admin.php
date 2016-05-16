<?php 
/* connection: host, user, password, & db schema */ 
include_once 'db_utility.php';
 $output = '';  
 $query = "SELECT * FROM tbl_sample";  
$result = $mysqli->query($query);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="30%">First Name</th>  
                     <th width="30%">Last Name</th>  
                     <th width="20%">Email</th>  
                     <th width="10%">Password</th>                       
                </tr>';  

      while ($row = $result->fetch())
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
                     <td class="last_name" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>  
                     <td class="email" data-id4="'.$row["id"].'" contenteditable>'.$row["email"].'</td>  
                     <td class="pw" data-id3="'.$row["id"].'" contenteditable>'.$row["pw"].'</td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="first_name" contenteditable></td>  
                <td id="last_name" contenteditable></td>  
                <td id="email" contenteditable></td>
                <td id="pw" contenteditable></td>
           </tr>  
      ';  

  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>  