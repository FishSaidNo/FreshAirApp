<html>
<head>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script src="https://www.amcharts.com/lib/3/amstock.js"></script>
<!-- load external data -->
<script src="amcharts/plugins/dataloader/dataloader.min.js" type="text/javascript"></script>
<style>
#chartdiv {
	width	: 100%;
	height	: 500px;
}									
	
</style>
  
</head>
<body>

<div id="chartdiv" style="width:100%; height:400px;"></div>

<script>
AmCharts.makeChart("chartdiv", {
    type: "stock",
    pathToImages: "amcharts/images/",
    dataDateFormat: "YYYY-MM-DD",
    dataSets: [{
        dataProvider: [{
            date: "2016-06-01 00:11:00",
            val: 10
        },{
            date: "2016-06-01 11:11:00",
            val: 20
        }, {
            date: "2016-06-02 11:13:00",
            val: 11
        }, {
            date: "2016-06-03 12:13:00",
            val: 12
        }, {
            date: "2016-06-04 10:13:00",
            val: 11
        }, {
            date: "2016-06-05 08:30:00",
            val: 10
        }, {
            date: "2016-06-06 01:13:00",
            val: 11
        }, {
            date: "2016-06-07 06:00:00",
            val: 13
        }, {
            date: "2016-06-08 11:13:00",
            val: 14
        }, {
            date: "2016-06-09 12:13:00",
            val: 17
        }, {
            date: "2016-06-10 10:13:00",
            val: 13
        }],
        fieldMappings: [{
            fromField: "val",
            toField: "value"
        }],
        categoryField: "date"
    }],

    panels: [{

        legend: {},

        stockGraphs: [{
            id: "graph1",
            valueField: "value",
            type: "column",
            title: "MyGraph",
            fillAlphas: 1
        }]
    }],

    panelsSettings: {
        startDuration: 1
    },

    categoryAxesSettings: {
        dashLength: 5
    },

    valueAxesSettings: {
        dashLength: 5
    },

    chartScrollbarSettings: {
        graph: "graph1",
        graphType: "line"
    },

    chartCursorSettings: {
        valueBalloonsEnabled: true
    },

    periodSelector: {
        periods: [{
            period: "DD",
            count: 1,
            label: "1 day"
        }, {
            period: "DD",
            selected: true,
            count: 5,
            label: "5 days"
        }, {
            period: "MM",
            count: 1,
            label: "1 month"
        }, {
            period: "YYYY",
            count: 1,
            label: "1 year"
        }, {
            period: "YTD",
            label: "YTD"
        }, {
            period: "MAX",
            label: "MAX"
        }]
    }
});
</script> 


   			<h2> date/time visualization </h2> 


        <div id="chartdiv2" style="width:100%; height:400px;"></div> 



<script>
                

var chartData= [
    {date: new Date(2016, 5, 1, 10, 0, 0, 0), val:10},
    {date: new Date(2016, 5, 1, 11, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 1, 12, 0, 0, 0), val:12},
    {date: new Date(2016, 5, 1, 13, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 1, 14, 0, 0, 0), val:10},
    {date: new Date(2016, 5, 1, 15, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 1, 16, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 1, 17, 0, 0, 0), val:14},
    {date: new Date(2016, 5, 1, 18, 0, 0, 0), val:17},
    {date: new Date(2016, 5, 1, 18, 0, 0, 0), val:8},
    {date: new Date(2016, 5, 1, 19, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 2, 19, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 2, 17, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 3, 15, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 4, 19, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 4, 18, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 5, 10, 0, 0, 0), val:10},
    {date: new Date(2016, 5, 6, 11, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 7, 12, 0, 0, 0), val:12},
    {date: new Date(2016, 5, 8, 13, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 9, 14, 0, 0, 0), val:10},
    {date: new Date(2016, 5, 10, 15, 0, 0, 0), val:11},
    {date: new Date(2016, 5, 11, 16, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 12, 17, 0, 0, 0), val:14},
    {date: new Date(2016, 5, 13, 18, 0, 0, 0), val:17},
    {date: new Date(2016, 5, 14, 18, 0, 0, 0), val:8},
    {date: new Date(2016, 5, 15, 19, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 16, 19, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 17, 17, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 18, 15, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 19, 19, 0, 0, 0), val:13},
    {date: new Date(2016, 5, 20, 18, 0, 0, 0), val:30},
    {date: new Date(2016, 5, 21, 19, 0, 0, 0), val:2}
];

            AmCharts.ready(function() {
                var chart = new AmCharts.AmStockChart();
                chart.pathToImages = "amcharts/images/";

                var dataSet = new AmCharts.DataSet();
                dataSet.dataProvider = chartData;
                dataSet.fieldMappings = [{fromField:"val", toField:"value"}];   
                dataSet.categoryField = "date";          
                chart.dataSets = [dataSet];

                var stockPanel = new AmCharts.StockPanel();
                chart.panels = [stockPanel];

                var legend = new AmCharts.StockLegend();
                stockPanel.stockLegend = legend;                

                var panelsSettings = new AmCharts.PanelsSettings();
                panelsSettings.startDuration = 1;
                chart.panelsSettings = panelsSettings;   

                var graph = new AmCharts.StockGraph();
                graph.valueField = "value";
                graph.type = "column";
                graph.title = "MyGraph";
                graph.fillAlphas = 1;
                stockPanel.addStockGraph(graph);

                var categoryAxesSettings = new AmCharts.CategoryAxesSettings();
                categoryAxesSettings.minPeriod = "hh";

                categoryAxesSettings.dashLength = 5;
                chart.categoryAxesSettings = categoryAxesSettings;

                var valueAxesSettings = new AmCharts.ValueAxesSettings();
                valueAxesSettings .dashLength = 5;
                chart.valueAxesSettings  = valueAxesSettings;

                var chartScrollbarSettings = new AmCharts.ChartScrollbarSettings();
                chartScrollbarSettings.graph = graph;
                chartScrollbarSettings.graphType = "line";
                chart.chartScrollbarSettings = chartScrollbarSettings;

                var chartCursorSettings = new AmCharts.ChartCursorSettings();
                chartCursorSettings.valueBalloonsEnabled = true;
                chart.chartCursorSettings = chartCursorSettings;

                var periodSelector = new AmCharts.PeriodSelector();
                periodSelector.periods = [{period:"DD", count:1, label:"1 day"},
                                          {period:"DD", selected:true, count:5, label:"5 days"},
                                          {period:"MM", count:1, label:"1 month"},
                                          {period:"YYYY", count:1, label:"1 year"},
                                          {period:"YTD", label:"YTD"},
                                          {period:"MAX", label:"MAX"}];                
                chart.periodSelector = periodSelector;

                chart.write("chartdiv2");
            }); 

</script>

</body>
</html>