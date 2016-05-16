<?PHP
session_start();
/**
* index page
* default page for user
*/
include_once 'db_utility.php';
if (!isset($_POST['suburb'])){
$query = "select * from items order by item_id";
} else {
$query = "select * from items where suburb like '%" . $_POST['suburb'] . "%' order by item_id";
}
$result = $mysqli->query($query);
$row = $result->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport"    content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author"      content="">

	   <style>
  	
#chartdiv {
	width	: 100%;
	height	: 500px;
}									
				
  </style> 
  
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

<html>
<head>

  <script src="amcharts/amcharts.js"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js"></script>
  <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
  
  <script src="amcharts/plugins/responsive/responsive.min.js" type="text/javascript"></script>
  
 <script src="https://www.amcharts.com/lib/3/plugins/export/export.js" type="text/javascript"></script>
 <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">

 </script>

  
</head>
<body>

			<h1> Air quality (AQI) Readings </h1> 

<div id="chartdiv"></div>																					
</br><br>
<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "dataLoader": {
    "url": "http://freshairbrisbane.com/AQI_data.php"
  },
  "pathToImages": "http://www.amcharts.com/lib/images/",
  "categoryField": "category",
  "dataDateFormat": "YYYY-MM-DD",
  "startDuration": 1,
  "rotate": true,
  "categoryAxis": {
    "parseDates": true
  },
  "graphs": [ {
    "valueField": "AQIval",
    "bullet": "round",
    "bulletBorderColor": "#FFFFFF",
    "bulletBorderThickness": 2,
    "lineThickness ": 2,
    "lineAlpha": 0.5
  }, {
    "valueField": "AQIcat",
    "bullet": "round",
    "bulletBorderColor": "#FFFFFF",
    "bulletBorderThickness": 2,
    "lineThickness ": 2,
    "lineAlpha": 0.5
  } ]
} );

</script> 




            
 			<h1>Air pollutants readings  </h1>           
</br>

                 <!-- Graphs in order are: CO, NO2, SO2, O3, & PM10 -->
   			<h2> Carbon Monoxide </h2> 
  <div id="CO_chartdiv" style="width: 100%; height: 500px;"></div>
  
  <script>
  AmCharts.makeChart( "CO_chartdiv", {
    "type": "serial",
    "dataLoader": {
      "url": "http://freshairbrisbane.com/CO_data.php"
      <!-- http://freshairbrisbane.com/data.php -->
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
       "fillAlphas": 0.6

    }],
      "export": {
      "enabled": true
     },
      "responsive": {
       "enabled": true
     }
        
  } );
  </script>
  
    <br>
  
     			<h2> Nitrogen Dioxide </h2> 
     			
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
       "fillAlphas": 0.6

    }],
      "export": {
      "enabled": true
     },
      "responsive": {
       "enabled": true
     }
        
  } );
  </script>
    <br>
  
  <h2> Sulfur Dioxide </h2> 
     			
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
       "fillAlphas": 0.6

    }],
      "export": {
      "enabled": true
     },
      "responsive": {
       "enabled": true
     }
        
  } );
  </script>
   <br> 
   <h2> Ozone </h2> 
     			
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
       "fillAlphas": 0.6

    }],
      "export": {
      "enabled": true
     },
      "responsive": {
       "enabled": true
     }
        
  } );
   </script> 
   
  <br>
  
  <h2> Particulate matter (PM10) </h2> 
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
       "fillAlphas": 0.6

    }],
      "export": {
      "enabled": true
     },
      "responsive": {
       "enabled": true
     }
        
  } );
  
  
  </script>
</body>
</html>

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