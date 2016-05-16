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
if (!isset($_POST['suburb'])){
$query = "select * from items order by item_id";
$result = $mysqli->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);
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

<!-- Custom styles for our template -->
<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body class="home">

<script>

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawVisualization);
//<?PHP
//$len = count($data_array);
//for ($x = 0; $x < $len; $x++) {
	//$row = $data_array[$x];

	//?>    

	
function drawVisualization() {
// Some raw data (not necessarily accurate)
var data = google.visualization.arrayToDataTable([
['Month', '<?PHP echo $row['suburb']?>'],
['Level of Sound', <?PHP echo $row['sound_levels']?>,],
['Temperature', <?PHP echo $row['temperature']?>,],
['Humidity', <?PHP echo $row['humidity']?>,],
['CO2', <?PHP echo $row['co']?>,],
['NO2', <?PHP echo $row['no2']?>,]
]);

//<?PHP
//}
//?>    

var options = {
title : 'Daily Statistics per Suburb',
vAxis: {title: 'Measurement'},
hAxis: {title: 'Type'},
seriesType: 'bars',
series: {7: {type: 'line'}}
};

var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
chart.draw(data, options);
}


</script>
<script async src="//jsfiddle.net/wjcgLu5e/embed/"></script>
<!-- Fixed navbar -->
<?php include 'menu.php'; ?>
<!-- /.navbar -->

<!-- Header -->
<header id="head" class="secondary"></header>
<div class="container">

<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Statistics</li>
</ol>

<div class="row">

<div id="chart_div" style="width: 1200px; height: 600px;"></div>


</div>
</div>	<!-- /container -->



<?php include 'footer.php'; ?>




<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
<script src="assets/js/template.js"></script>
</body>
</html>