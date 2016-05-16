<?PHP
session_start();
/**
* index page
* default page for user
*/
include_once 'db_utility.php';
if (!isset($_POST['suburb'])){
	$query = "select * from aqi order by Suburb ASC";
}
$result = $mysqli->query($query);
?>
<!DOCTYPE html>

<html>
    <head>
            <link rel="stylesheet" href="mystyle.css">
			<link rel="shortcut icon" href="assets/images/gt_favicon.png">
			
			<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
			<link rel="stylesheet" href="assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="assets/css/font-awesome.min.css">
			
			

			<!-- Custom styles for our template -->
			<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
			<link rel="stylesheet" href="assets/css/main.css">			
            <title>Fresh Air - Create Your Own Reality</title> 	    
			<meta name="keywords" content="HTML,CSS,XML,JavaScript">
			<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
			<meta charset="UTF-8">	 
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
			
		          		
</head>
<body class="home">   
	
 <script>
                function initialize() {
<?php
/**
 *  following is to generate a markers from php code     
 */
$data = array();
$data_array = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	$item = array($row["Suburb"], (float) $row["Latitude"], (float) $row["Longitude"], (int) $row["AQIval"]);
	array_push($data, $item);
	$data_array[] = $row;
	}
echo "var markers = " . json_encode($data) . ";\n";
?>

                    var myLatlng = new google.maps.LatLng(-27.470125,153.021072);
                    var mapOptions = {
                        zoom: 12,
                        center: myLatlng
                    };

google.maps.event.addDomListener(window, "resize", function() {
   var center = map.getCenter();
   google.maps.event.trigger(map, "resize");
   map.setCenter(center); 
});
						
		

                    var bounds = new google.maps.LatLngBounds();
                    var element = document.getElementById('map-canvas');
                    var map = new google.maps.Map(element, mapOptions);
                    map.setTilt(45);
                    for (i = 0; i < markers.length; i++) {
						
						if (markers[i][3] <= "50"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: "http://maps.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png",
                            title: markers[i][0]
                        });
						
						}
						
						if (markers[i][3] >= "51" && markers[i][3] <= "100"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/yellow-dot.png',
                            title: markers[i][0]
                        });
							
												
						}		

						if (markers[i][3] >= "101" && markers[i][3] <= "150"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/orange-dot.png',
                            title: markers[i][0]
                        });
							
												
						}

						if (markers[i][3] >= "151" && markers[i][3] <= "200"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png',
                            title: markers[i][0]
                        });
							
												
						}							
						
						if (markers[i][3] >= "201" && markers[i][3] <= "300"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/purple-dot.png',
                            title: markers[i][0]
                        });
							
												
						}	
						
						if (markers[i][3] >= "301" && markers[i][3] <= "500"){
						
						var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
							bounds.extend(position);
							marker = new google.maps.Marker({		
							
							position: position,
                            map: map,
                            icon: 'http://labs.google.com/ridefinder/images/mm_20_brown.png',
                            title: markers[i][0]
                        });
							
												
						}	
                        
                    }
                }
                google.maps.event.addDomListener(window, 'load', initialize);

            </script>
    <br/>
    <br/>
   
			<!-- Fixed navbar -->
<?php include 'menu.php'; ?>
			
			<div id="location">
                        </div>
		 
					 <div id="map-canvas"></div>
<img src="images/aqiLevels.jpg" width="450" class="img-responsive" alt="" />



				</div>
     
				<div class="container">
				
					<div class="row">
						<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
						<p class="tagline">&nbsp;</p>
						<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
					</div>
				</div>
				
			<!-- Intro -->
			<div class="container text-center">
				<br> <br>
				<h2 class="thin">Why Brisbane's air quality matters? </h2>
				<p class="text-muted"> "Good outdoor air quality is fundamental to our well-being. On average, a person inhales about 14,000 litres of air every day, and the presence of contaminants in this air can adversely affect people’s health (see figure 4). People with pre-existing respiratory and heart conditions, diabetes, the young, and older people are particularly vulnerable.
Overseas studies have shown poor air quality can also adversely affect the natural environment. Ecological damage may occur when air pollutants come into direct contact with vegetation or when animals inhale them. Pollutants can also settle out of the air onto land and water bodies. From the soil, they can wash into waterways, or be taken up by plants and animals. Poor air quality can also affect our climate: some pollutants have a warming effect while others contribute to cooling (European Environment Agency, 2013). There have been limited studies conducted in New Zealand to explore these impacts.

These effects of poor air quality on human health and the environment can, in turn, have negative economic impacts. We incur major costs, for example, for hospitalisation and medical treatment, premature deaths, and lost work days. Damage to soils, vegetation, and waterways may reduce the productivity of our agriculture and forestry industries. In urban areas, air pollution can be costly when, for example, transport is disrupted (due to large-scale events like volcanic eruptions), or corroded buildings need to be repaired.

The sources of some of these pollutants also have positive effects. For example, having a warm home (from burning wood or coal, or other heating sources) has health benefits, while transport provides people with mobility and the distribution of goods and services." </p>
			</div>
			<!-- /Intro-->
				
			<!-- Highlights - jumbotron -->
			<div class="jumbotron top-space">
				<div class="container">
					
					<h3 class="text-center thin">Fresh Air Goals</h3>
					
					<div class="row">

						</div>
						<div class="col-md-3 col-sm-6 highlight">
							<div class="h-caption"><h4><i class="fa fa-users fa-5"></i>Do I know if I am at risk?</h4></div>
							<div class="h-body text-center">
								<p>People with diabetes, lung disease (such as chronic bronchitis, asthma, emphysema, lung cancer) or heart disease (such as angina, a history of heart attacks, congestive heart failure, arrhythmia or irregular heartbeat) are more sensitive to air pollution. </p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 highlight">
							<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i> Air Quality Health Index</h4></div>
							<div class="h-body text-center">
								<p>The Air Quality Health Index is a scale designed to help you understand what the quality of the air around you means to your health. It is a tool developed by health and environmental professionals to communicate the health risk posed by air pollution.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 highlight">
							<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>Find out about the Health Risks</h4></div>
							<div class="h-body text-center">
								<p>You can better protect yourself and those in your care by understanding how air pollution affects your health, and by checking the Air Quality Health Index on a regular basis to find out what the health risks from air pollution are in your community.</p>
							</div>
						</div>
					</div> <!-- /row  -->
				
				</div>
			</div>
			<!-- /Highlights -->

			<!-- container -->
			<div class="container">

				<h2 class="text-center top-space">What is FreshAir</h2>
				<br>

				<div class="row">
					<div class="col-sm-12">
						Air pollution is a rapidly rising environmental problem that threatens our future. A study shown that air pollution causes the death of more people than malaria and HIV combined (Lelieveld, 2014). Researchers predicts that the number of deaths caused by air pollution will reach to 5.5 million per year by 2050 (EPA, 2016). Nonetheless, the effects of polluted air is not limited to humans health but it also extends to animals, agriculture and constructions.</div> 
						&nbsp;
						<div class="col-sm-12">
						Brisbane air quality matters because, its air quality can impact the air quality in all QLD. This is because it is the center of south QLD airshed, where air pollution can be trapped and only cleared by rain or wind. Beside geography factors, urban growth is also a major element that impact the air quality. In 2016 brisbane population reached 2.46 millions, making it the third most crowded city (Population Of Brisbane In 2016, 2016). Therefore, raising awareness and providing open data portal to users are necessary to keep the city clean.
						</div>
						&nbsp;
						<div class="col-sm-12"> Currently, there are not many technologies that involves reviewing live pollution data or facilitating fast daily data reporting. Many websites represent data collected annually from government owned sensors. Therefore less people are involved in the process. As a result, not many people are aware of the problem size and impacts. We hope on this project we can make air pollution a more talked about topic. And enable Brisbane air quality to be held in user's hand.
					</div>
					
				</div> <!-- /row -->


				<div class="row">
					<div class="col-sm-6">
						<h3>What is the Air Quality Health Index (AQHI)</h3>
						<p>
							The Air Quality Health Index or "AQHI" is a scale designed to help you understand what the air quality around you means to your health.It is a health protection tool that is designed to help you make decisions to protect your health by limiting short-term exposure to air pollution and adjusting your activity levels during increased levels of air pollution. It also provides advice on how you can improve the quality of the air you breathe.
						</p>
					</div>
					<div class="col-sm-6">
						<h3>How the Air Quality Index is calculated?</h3>
						<p>ACT Health collects the data from remote monitoring stations in various scientific units, such as parts per million (ppm) and micrograms per cubic meter (µg/m3). As the units, time frames and exposure standards are different for different pollutants this can make it hard to compare numbers in a meaningful way. Where the standards are reported as more than an hourly average, a rolling average is calculated.</p>
					</div>
				</div> <!-- /row -->

				<div class="jumbotron top-space">
				<h2 class="text-center top-space">How to contrbute to our site?</h2>
				<br>
					<p>   Now we have an application to use on smart phones and tablets whereby users can retrieve their data and visualise pollution ‘hot-spots’. This will be vital as access to this information will be used to help people be aware of, and adjust their exposure to air pollution both at home and their workplaces. The apps accept sms messages, and Airbeam readings, and store data at QUT Database in real-time, a data portal where SMS messages and Airbeam readings are collected at a secure storage location at QUT. Also the functionality within the data portal for access restricted visualization and sending summary data back to the users, moreover the system provide an ability to be accessed and visualised on all smart device. 

Simply click download our apps and you will have a freshairapps on your smartphone in no time. The apps is very simple and easy to use especially for old people and disability people since the apps has only two functions to use. The colour of the apps and all the information added in the apps is short, simple and easy to read. 
  </p>
					<p class="text-right"><a class="btn btn-primary btn-large">Download our App »</a></p>
				</div>

			</div>	<!-- /container -->     
		</div>	

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	
	<script src="assets/js/headroom.min.js"></script> 	
<script src="assets/js/jQuery.headroom.min.js"></script> 	
<script src="assets/js/template.js"></script>

	
		<?php include 'footer.php'; ?>
	
	
 </html>
