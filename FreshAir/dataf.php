<?PHP
session_start();
/**
* index page
* default page for user
*/
include_once 'db_utility.php';
if(!isset($_SESSION['Yes'])){
header('Location: statisticsTemp.php');
}
?><html>
<head>
<script src="amcharts/amcharts.js" type="text/javascript"></script>
<script src="amcharts/serial.js" type="text/javascript"></script>
<script src="amcharts/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>

</head>
<body>

                <!-- establish connection to db -->
                   
                   
<?php
include_once 'db_utility.php';
// Fetch the data C0 & DATE
$query = "SELECT date, CO FROM aqi ORDER BY date ASC";

$result = $mysqli->query($query);



// Print out rows, produce a valid JSON output
$prefix = '';
echo "[\n";
while ($row = $result->fetch()){
 echo $prefix . " {\n";
 echo '  "Date": "' . $row['date'] . '",' . "\n";
 echo '  "CO": ' . $row['CO'] . "\n";
 echo " }";
 $prefix = ",\n";
}
echo "\n]";

?> 



</body>
</html>