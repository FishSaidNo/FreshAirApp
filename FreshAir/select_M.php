<?php 
/* connection: host, user, password, & db schema */ 
 $connect = mysqli_connect("localhost", "freshai1_admin", "Admin123456", "freshai1_freshair"); 
 $output = '';  
 $sql = "SELECT * FROM guest_members ORDER BY Name ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
					 <th width="20%">Email</th>  
                     <th width="25%">Name</th>                      
                     <th width="20%">Password</th>  
                     <th width="25%">Description</th>
                     <th width="10%">Add/Delete</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
      //using html5 contenteditable attribute 
           $output .= '  
                <tr>  
					<td class="Email" data-id2="'.$row["Email"].'" contenteditable>'.$row["Email"].'</td>                      
                     <td class="Name" data-id1="'.$row["Email"].'" contenteditable>'.$row["Name"].'</td>                      
                     <td class="Password" data-id3="'.$row["Email"].'" contenteditable>'.$row["Password"].'</td>  
                     <td class="Description" data-id4="'.$row["Email"].'" contenteditable>'.$row["Description"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["Email"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      } 
	  //Insert data
            $output .= '  
           <tr>  
               	<td id="Email" contenteditable></td>  
                <td id="Name" contenteditable></td>  
                <td id="Password" contenteditable></td>  
                <td id="Description" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';   
 
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