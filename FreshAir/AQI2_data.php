<?php

// so PHP does not complain about deprectaed functions
//error_reporting( 0 );

//include_once 'db_utility.php'; whyyyy

// Connect to MySQL
$link = new mysqli( 'localhost', 'freshai1_root', 'admin123456', 'freshai1_freshair' );
if ( $link->connect_errno ) {
  die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
}


// Fetch the data 
$query = "SELECT Date, AQIcat  FROM aqi ORDER BY date ASC";


$result = $link->query( $query );





// Print out rows
$data = array();
while ( $row = $result->fetch_assoc() ) {
 $data[] = $row;
}
echo json_encode( $data );
?>