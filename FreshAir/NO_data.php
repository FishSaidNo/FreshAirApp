<?php

// so PHP does not complain about deprectaed functions
//error_reporting( 0 );

//include_once 'db_utility.php'; whyyyy

// Connect to MySQL
$link = new mysqli( 'localhost', 'freshai1_admin', 'Admin123456', 'freshai1_freshair' );
if ( $link->connect_errno ) {
  die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
}


// Fetch the data NO & DATE
$query = "SELECT date, NO2 FROM aqi ORDER BY date ASC";

$result = $link->query( $query );





// Print out rows
$data = array();
while ( $row = $result->fetch_assoc() ) {
  $data[] = $row;
}
echo json_encode( $data );
?>