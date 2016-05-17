

<html>
<head>

  <script src="amcharts/amcharts.js"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js"></script>
  <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">
  <script src="http://www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
  
  <script src="amcharts/plugins/responsive/responsive.min.js" type="text/javascript"></script>
  
 <script src="https://www.amcharts.com/lib/3/plugins/export/export.js" type="text/javascript"></script>
 <link href="https://www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet" type="text/css">

 

  
</head>
<body>

    <h2> Particulate matter (PM10) </h2> 
  <div id="chartdiv" style="width: 100%; height: 500px;"></div>
  
  <script>
  AmCharts.makeChart( "chartdiv", {
    "type": "serial",
    "dataLoader": {
      "url": "http://freshairbrisbane.com/AQI2_data.php"
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
      "valueField": "AQIcat",
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
  
  
  


</body>
</html>