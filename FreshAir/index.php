<?PHP
session_start();
/**
* index page
* default page for user
*/
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

 
    <br/>
    <br/>
   
			<!-- Fixed navbar -->
<?php include 'menu.php'; ?>
			
			<div id="location">
          
        </div>        

<div style="text-align:center"> 
      
		 <video width="800" controls><source src="images/video.mp4" type="video/mp4"></video>
		  </div> 
				<div class="container">


								
					<div class="row" style="text-align:center">
						<h1 class="lead">Air Quality Directly Affects Our Quality of Life.</h1>
						<p class="tagline">&nbsp;</p>
						<p><a class="btn btn-default btn-lg" href="statistics.php" role="button">View Statistics</a> </p>
						<p><a class="btn btn-default btn-lg" href="hotspots.php" role="button">View HostSpots</a> </p>
					</div>
				</div>
				
			<!-- Intro -->
			<div class="container text-center">
				<br> <br>
				<h2 class="thin">The best place to tell people why they are here</h2>
				<p class="text-muted">
					The quality of our air directly impacts our health and the natural environment<br> so we want our air to be as clean as possible.
				</p>
			</div>
			<!-- /Intro-->
				
			<!-- Highlights - jumbotron -->
			<div class="jumbotron top-space">
				<div class="container">
					
					<h3 class="text-center thin">Reasons to know Fresh Air</h3>
					
					<div class="row">
						<div class="col-md-3 col-sm-6 highlight">
							<div class="h-caption"><h4><i class="fa fa-truck fa-5"></i> Air Pollution</h4></div>
							<div class="h-body text-center">
								<p>There are many different types of air pollutants from a wide range of sources. The pollutants that most affect health are the gases and particles that contribute to cardiovascular and respiratory disease. These pollutants are often lumped together under the term “smog”.</p>
							</div>
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
				<h2 class="text-center top-space">How is Air Quality Measured?</h2>
				<br>
					<p>ACT Health operates the Territory's air quality monitoring network, which comprises two NEPM Performance Monitoring Stations (PMS) in Monash and Florey, and a smaller station in Civic. The Monash PMS is approximately 300 metres west of Cockcroft Avenue and the Florey PMS is in Neumann Place.<br>ACT Health monitors carbon monoxide (CO), nitrogen dioxide (NO2), photochemical oxidants as ozone (O3), particulate matter less than 10 micrometres (PM10) and particulate matter less than 2.5 micrometres (PM2.5).<br>PM10 and PM2.5 are the pollutants of most concern in the ACT. Elevated levels of particulate matter can arise, for example, in colder months due to wood smoke emitted from the use of wood heaters. They may also occur from bushfire and burn-off events in and around the ACT.<br>Photochemical oxidants, such as ozone, are generally not directly emitted. They are formed by the reaction of pollutants in the atmosphere. Ozone is formed when nitrogen oxides react with a group of air pollutants known as Reactive Organic Compounds (ROC) in the presence of sunlight.<br>Emissions from motor vehicles are the primary source of carbon monoxide and oxides of nitrogen pollution in the ACT.<br>Due to a lack of heavy industry the ACT does not monitor sulfur dioxide for the NEPM. following the phase out of leaded fuel on 1 January 2002, the ACT ceased monitoring lead in July 2002.</p>
					<p class="text-right"><a class="btn btn-primary btn-large">Learn more »</a></p>
				</div>

			</div>	<!-- /container -->     
		</div>		
		<?php include 'footer.php'; ?>
	
	
 </html>
