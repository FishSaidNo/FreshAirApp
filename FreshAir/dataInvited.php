<!DOCTYPE html>
<html lang="en">


<!-- /*
*Tables are created using Datatable library, licensed under MIT:
	
*	MIT license
*Copyright (C) 2008-2016, SpryMedia Ltd.

*Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation *files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, *modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software *is furnished to do so, subject to the following conditions:

*The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/


<?PHP

/**
 * index page
 * default page for user
 */
session_start();
include_once 'db_utility.php';
if(!isset($_SESSION['Yes'])){
echo("<script>location.href = '/index.php?msg=$msg';</script>");
echo("<script>alert('Admin permission needed');</script>");
}
?>
-->



<head>

	
	<title> Fresh Air </title>

	
        <!-- mobile/ipad view  --> 
        <meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="">
	
	<title>Fresh Air - Brisbane's air quality in your hands </title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	
	
	
	 <!-- table js and css --> 
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/jq-2.2.0,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.11,b-1.1.2,b-colvis-1.1.2,b-flash-1.1.2,b-html5-1.1.2,b-print-1.1.2,r-2.0.2/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/t/dt/jq-2.2.0,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.11,b-1.1.2,b-colvis-1.1.2,b-flash-1.1.2,b-html5-1.1.2,b-print-1.1.2,r-2.0.2/datatables.min.js"></script>


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
		</ol></br></br>
	
	
		<!-- mini navigation to profile/website/table -->		

<h2> Welcome </h2>
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
 <td>' . $row['PM25'] . '</td>
 <td>' . $row['PM10'] . '</td>
 <td>' . $row['O3'] . '</td>
 <td>' . $row['S02'] . '</td> 
 <td>' . $row['NO2'] . '</td>
 <td>' . $row['CO'] . '</td>
 <td>' . $row['AQIcat'] . '</td>
 <td>' . $row['Suburb'] . '</td>
 </tr>';}
echo  '</tbody>
    </table>';
?>
</div>

  
    <script>   
  $(document).ready(function() {
    $('#AirData').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
            extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
            extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            }, 
             {
            extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
        //Readable by small screens
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,


    } );
} );
  </script>
	
<?php include 'footer.php'; ?>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
	
	
</body>
</html>