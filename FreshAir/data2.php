<html>
<head>
<script src="amcharts/amcharts.js" type="text/javascript"></script>
<script src="amcharts/serial.js" type="text/javascript"></script>
<script src="amcharts/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>


<script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
<script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

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
 echo '  "Date": "' . $row['Date'] . '",' . "\n";
 echo '  "CO": ' . $row['CO'] . "\n";
 echo " }";
 $prefix = ",\n";
}
echo "\n]";

?> 

<script>
//Loading the data in browser via JavaScript
AmCharts.loadJSON = function('http://freshairbrisbane.com/data2.php') {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', http://freshairbrisbane.com/data2.php, false);
  request.send();

  // parse and return the output
  return eval(request.responseText);
};

</script>



<!-- Call CO graph -->
 <div id="chartdiv_CO" style="width: 640px; height: 400px;"></div>
 
 
 
 <script>

 AmCharts.ready(function() {
 
 // load the data
  var chartData = AmCharts.loadJSON('http://freshairbrisbane.com/data2.php');
  var chart;

// SERIAL CHART    
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "Date";
  chart.dataDateFormat = "YYYY-MM-DD";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "CO";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  chart.addGraph(graph1);


  // CATEGORY AXIS 
  chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv_CO");
});

 </script>
</body>
</html>