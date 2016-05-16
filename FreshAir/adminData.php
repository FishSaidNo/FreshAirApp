<?PHP
session_start();
/**
 * index page
 * default page for user
 */
include_once 'db_utility.php';
if(!isset($_SESSION['Yes'])){
header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Create Your Own Reality</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/jq-2.2.0,pdfmake-0.1.18,dt-1.10.11,b-1.1.2,b-html5-1.1.2,b-print-1.1.2,fh-3.1.1,r-2.0.2,sc-1.4.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/jq-2.2.0,pdfmake-0.1.18,dt-1.10.11,b-1.1.2,b-html5-1.1.2,b-print-1.1.2,fh-3.1.1,r-2.0.2,sc-1.4.1/datatables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/jq-2.2.0,dt-1.10.11,b-1.1.2,b-print-1.1.2/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" media="all" href="css/profilestyle.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css"/>
<script type="text/javascript" src="https:////cdn.datatables.net/buttons/1.1.2/js/buttons.colVis.min.js"></script>

	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	
	  <script type="text/javascript" src="js/jquery-profile.min.js"></script>
  <script src="js/password-strength.js"></script>

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>


<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.php'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head" class="secondary"></header>
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Data</li>
		</ol>
			
		 <div>
  <a href="http://freshairbrisbane.com">Back to the website</a>
  </div>
    <div>
  <a href="adminProfile.php">Go to Profile</a>
  </div>
  
<h2> Welcome Admin </h2>
<p>This table contains all the data we have received. </p>


<!-- Start Table -->
  <?php
include_once 'db_utility.php';
$query = "select * from aqi";
$result = $mysqli->query($query);

    $data = array();
    $data_array = array();

                    
echo '<table id="AirData" class="display" cellspacing="0" width="100%">';
echo '<thead>
            <tr>
                <th>Date</th>
                <th>Humidity</th>
                <th>Wind</th>
                <th>PM2.5</th>
                <th>PM10</th>
                <th>O3</th>
                <th>SO2</th>                
                <th>NO2</th>
                <th>CO</th>
                <th>AQI</th>
                <th>Suburb</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Date</th>
                <th>Humidity</th>
                <th>Wind</th>
                <th>PM2.5</th>
                <th>PM10</th>
                <th>O3</th>
                <th>SO2</th>                
                <th>NO2</th>
                <th>CO</th>
                <th>AQI</th>
                <th>Suburb</th>
            </tr>
        </tfoot>
        <tbody>';

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        $item = array($row["Date"], (float) $row["Humidity"], (float) $row["Wind"], (float) $row["PM2.5"], (float) $row["PM10"], (float) $row["O3"], (float) $row["SO2"], (float) $row["NO2"], (float) $row["CO"], (float) $row["AQI"], (float) $row["Suburb"]);
        array_push($data, $item);
        $data_array[] = $row;
    }
   
                $len = count($data_array);
                for ($x = 0; $x < $len; $x++) {
                    $row= $data_array[$x];
	echo  '<tr> 
 <td>' . $row['Date'] . '</td> 
 <td>' . $row['Humidity'] . '</td>
 <td>' . $row['Wind'] . '</td>
 <td>' . $row['PM2.5'] . '</td>
 <td>' . $row['PM10'] . '</td>
 <td>' . $row['O3'] . '</td>
 <td>' . $row['S02'] . '</td> 
 <td>' . $row['NO2'] . '</td>
 <td>' . $row['CO'] . '</td>
 <td>' . $row['AQI_CAT'] . '</td>
 <td>' . $row['Suburb'] . '</td>
 </tr>';}
echo  '</tbody>
    </table>';
?>
</div>
	
<?php include 'footer.php'; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
	
</body>
</html>