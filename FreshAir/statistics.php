<?PHP
session_start();
/**
* Statistics Page
* Page where graphs and statistics are shown to the users
*/
include_once 'db_utility.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author"      content="">
 
<head>
	   <link rel="shortcut icon" href="assets/images/gt_favicon.png">			
	   <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	   <link rel="stylesheet" href="assets/css/font-awesome.min.css">

		<!-- Custom styles for our template -->
		<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
		<link rel="stylesheet" href="assets/css/main.css">	
	
		<title>Fresh Air - Statistics </title> 	    
		
		<meta name="keywords" content="HTML,CSS,XML,JavaScript">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="UTF-8">	 
		
	
		<script src="amcharts/amcharts.js"></script>
		<script src="http://www.amcharts.com/lib/3/serial.js"></script>
		<link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
		<script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
		<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
		<script src="amcharts/plugins/responsive/responsive.min.js" type="text/javascript"></script>
		<script src="https://www.amcharts.com/lib/3/plugins/export/export.js" type="text/javascript"></script>
		<link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">			
					
</head>

<body class="home">   			

	<!-- Menu Insertion (see Menu.php) -->
	<?php include 'menu.php'; ?>

	<!-- Header -->
	<header id="head" class="secondary"></header>
	
	
	<!-- Content -->
	<div class="container">

		
		<!-- Page Indicators -->	
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">Statistics</li>
		</ol>	      

		<h1> Air quality (AQI) Readings </h1> 
<!-- Chart Added -->	
		<div id="chartdiv" style="width: 100%; height: 500px;"></div>	
																				
		</br><br>
		<script>
		var chart = AmCharts.makeChart("chartdiv", {
			"type": "serial",
			"theme": "light",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled":true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth":true
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
					  
				"balloon":{
				  "drop":true,
				  "adjustBorderColor":false,
				  "color":"#ffffff"

				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 5,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "red line",
				"useLineColorForBulletBorder": true,
				"valueField": "AQIval",
				"balloonText": "<span style='font-size:18px;'>[[CO]]</span>"
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis":false,
				"offset":30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount":true,
				"color":"#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha":1,
				"cursorColor":"#258cbb",
				"limitToGraph":"g1",
				"valueLineAlpha":0.2,
				"valueZoomable":true
			},
			"valueScrollbar":{
			  "oppositeAxis":false,
			  "offset":50,
			  "scrollbarHeight":10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": true
			},
			"export": {
				"enabled": true
			},
				"dataLoader": {
			  "url": "http://freshairbrisbane.com/AQI_data.php"
			}
		});



		</script>
            
 		<h1>Air pollutants readings  </h1></br>

                 <!-- Graphs in order are: CO, NO2, SO2, O3, & PM10 -->
		<h2> Carbon Monoxide </h2> 
		<div id="CO_chartdiv" style="width: 100%; height: 500px;"></div>
  
		  <script>
		  AmCharts.makeChart( "CO_chartdiv", {
			"type": "serial",
			"dataLoader": {
			  "url": "http://freshairbrisbane.com/CO_data.php"
			},
			"pathToImages": "http://www.amcharts.com/lib/images/",
			"categoryField": "date",
			"dataDateFormat": "YYYY-MM-DD",
			"title": "date",
			"startDuration": 1,
			"categoryAxis": {
			  "parseDates": true
			},
			"valueAxes":[ {
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Carbon monoxide in ppm "
			}],
			"graphs": [{
			  "type": "column",
			  "title": "Carbon monoxide",
			  "valueField": "CO",
			   "lineAlpha": 0,
			   "fillAlphas": 1

			}],
			  "export": {
			  "enabled": true
			 },
			  "responsive": {
			   "enabled": true
			 },
			   "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
			   "chartScrollbar": {
					"updateOnReleaseOnly": true,
					"graph": "g1",
					"oppositeAxis":false,
					"offset":30,
					"scrollbarHeight": 60,
				   "backgroundAlpha": 0,
				   "selectedBackgroundAlpha": 0.1,
				   "selectedBackgroundColor": "#888888",
				   "graphFillAlpha": 0,
				   "graphLineAlpha": 0.5,
				   "selectedGraphFillAlpha": 0,
				   "selectedGraphLineAlpha": 1,
				   "autoGridCount":true,
				   "color":"#AAAAAA"
		  }
				
		  } );
		  </script></br>
  
     		<h2> Nitrogen Dioxide </h2> 
			
		<!-- Nitrogen Dioxide Chart -->	
     			
		<div id="NO_chartdiv" style="width: 100%; height: 500px;"></div>
  
		  <script>
		  AmCharts.makeChart( "NO_chartdiv", {
			"type": "serial",
			"dataLoader": {
			  "url": "http://freshairbrisbane.com/NO_data.php"
			},
			"pathToImages": "http://www.amcharts.com/lib/images/",
			"categoryField": "date",
			"dataDateFormat": "YYYY-MM-DD",
			"title": "date",
			"startDuration": 1,
			"categoryAxis": {
			  "parseDates": true
			},
			"valueAxes":[ {
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Nitrogen dioxide in ppm "
			}],
			"graphs": [{
			  "type": "column",
			  "title": "Nitrogen dioxide",
			  "valueField": "NO2",
			   "lineAlpha": 0,
			   "fillAlphas": 1

			}],
			  "export": {
			  "enabled": true
			 },
			  "responsive": {
			   "enabled": true
			 },
			   "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
			   "chartScrollbar": {
					"updateOnReleaseOnly": true,
					"graph": "g1",
					"oppositeAxis":false,
					"offset":30,
					"scrollbarHeight": 60,
				   "backgroundAlpha": 0,
				   "selectedBackgroundAlpha": 0.1,
				   "selectedBackgroundColor": "#888888",
				   "graphFillAlpha": 0,
				   "graphLineAlpha": 0.5,
				   "selectedGraphFillAlpha": 0,
				   "selectedGraphLineAlpha": 1,
				   "autoGridCount":true,
				   "color":"#AAAAAA"
		  }
				
		  } );
		  </script></br>
  
		<h2> Sulfur Dioxide </h2> 
		
		<!-- Sulfur Dioxide Chart-->	
		
		<div id="SO_chartdiv" style="width: 100%; height: 500px;"></div>
  
		  <script>
		  AmCharts.makeChart( "SO_chartdiv", {
			"type": "serial",
			"dataLoader": {
			  "url": "http://freshairbrisbane.com/SO_data.php"
			},
			"pathToImages": "http://www.amcharts.com/lib/images/",
			"categoryField": "date",
			"dataDateFormat": "YYYY-MM-DD",
			"title": "date",
			"startDuration": 1,
			"categoryAxis": {
			  "parseDates": true
			},
			"valueAxes":[ {
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Sulfur dioxide in ppm "
			}],
			"graphs": [{
			  "type": "column",
			  "title": "Sulfur dioxide",
			  "valueField": "S02",
			   "lineAlpha": 0,
			   "fillAlphas": 1

			}],
			  "export": {
			  "enabled": true
			 },
			  "responsive": {
			   "enabled": true
			 },
			   "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
			   "chartScrollbar": {
					"updateOnReleaseOnly": true,
					"graph": "g1",
					"oppositeAxis":false,
					"offset":30,
					"scrollbarHeight": 60,
				   "backgroundAlpha": 0,
				   "selectedBackgroundAlpha": 0.1,
				   "selectedBackgroundColor": "#888888",
				   "graphFillAlpha": 0,
				   "graphLineAlpha": 0.5,
				   "selectedGraphFillAlpha": 0,
				   "selectedGraphLineAlpha": 1,
				   "autoGridCount":true,
				   "color":"#AAAAAA"
		  }
				
		  } );
		  </script></br>
		  
		<h2> Ozone </h2> 
     		
		<!-- Ozone Chart -->	
		
		<div id="O3_chartdiv" style="width: 100%; height: 500px;"></div>
  
		  <script>
		  AmCharts.makeChart( "O3_chartdiv", {
			"type": "serial",
			"dataLoader": {
			  "url": "http://freshairbrisbane.com/O3_data.php"
			},
			"pathToImages": "http://www.amcharts.com/lib/images/",
			"categoryField": "date",
			"dataDateFormat": "YYYY-MM-DD",
			"title": "date",
			"startDuration": 1,
			"categoryAxis": {
			  "parseDates": true
			},
			"valueAxes":[ {
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Ozone in ppm "
			}],
			"graphs": [{
			  "type": "column",
			  "title": "Ozone",
			  "valueField": "O3",
			   "lineAlpha": 0,
			   "fillAlphas": 1

			}],
			  "export": {
			  "enabled": true
			 },
			  "responsive": {
			   "enabled": true
			 },
			   "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
			   "chartScrollbar": {
					"updateOnReleaseOnly": true,
					"graph": "g1",
					"oppositeAxis":false,
					"offset":30,
					"scrollbarHeight": 60,
				   "backgroundAlpha": 0,
				   "selectedBackgroundAlpha": 0.1,
				   "selectedBackgroundColor": "#888888",
				   "graphFillAlpha": 0,
				   "graphLineAlpha": 0.5,
				   "selectedGraphFillAlpha": 0,
				   "selectedGraphLineAlpha": 1,
				   "autoGridCount":true,
				   "color":"#AAAAAA"
		  }
				
		  } );
		   </script></br>
  
			<h2> Particulate matter (PM10) </h2> 
			
			<!-- Particulate Matter (PM10) Chart -->	
			
			<div id="PM_chartdiv" style="width: 100%; height: 500px;"></div>
  
		  <script>
		  AmCharts.makeChart( "PM_chartdiv", {
			"type": "serial",
			"dataLoader": {
			  "url": "http://freshairbrisbane.com/PM_data.php"
			},
			"pathToImages": "http://www.amcharts.com/lib/images/",
			"categoryField": "date",
			"dataDateFormat": "YYYY-MM-DD",
			"title": "date",
			"startDuration": 1,
			"categoryAxis": {
			  "parseDates": true
			},
			"valueAxes":[ {
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "PM "
			}],
			"graphs": [{
			  "type": "column",
			  "title": "PM10",
			  "valueField": "PM10",
			   "lineAlpha": 0,
			   "fillAlphas": 1

			}],
			  "export": {
			  "enabled": true
			 },
			  "responsive": {
			   "enabled": true
			 },
			 
			   "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
			   "chartScrollbar": {
					"updateOnReleaseOnly": true,
					"graph": "g1",
					"oppositeAxis":false,
					"offset":30,
					"scrollbarHeight": 60,
				   "backgroundAlpha": 0,
				   "selectedBackgroundAlpha": 0.1,
				   "selectedBackgroundColor": "#888888",
				   "graphFillAlpha": 0,
				   "graphLineAlpha": 0.5,
				   "selectedGraphFillAlpha": 0,
				   "selectedGraphLineAlpha": 1,
				   "autoGridCount":true,
				   "color":"#AAAAAA"
		  }
				
		  } );
		  
		  
		</script>	
				
	</div>	<!-- /container -->
	
	<!-- Footer Insertion (see footer.php) -->
	<?php include 'footer.php'; ?>
		
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/headroom.min.js"></script>
<script src="assets/js/jQuery.headroom.min.js"></script>
<script src="assets/js/template.js"></script>

</body>	
</html>