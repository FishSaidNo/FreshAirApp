<?php

include_once 'db_utility.php';
//$mysqli = new PDO("mysql:host=localhost;dbname=freshair", 'root', '');
$mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	//To be received from app
	$_date;
	$_latitude;
	$_longitude;
	$_pm25; //particle matter 2.5
	$_pm10; //particle matter 10
	$_o3; //surface ozone 
	$_so2; //sulfur dioxide
	$_no2; //nitrogen dioxide
	$_co; //carbon monoxide
	$_dew;
	$_humidity;
	$_wind;
	//To be computed by this script
	$_AQIval;
	$_AQIcat;
	$_Suburb = 'test';
	
	$AQI_categories = array(
							'Good'=>array(0,50),
							'Moderate'=>array(51,100),
							'Unhealthy for Sensitive Groups'=>array(101,150),
							'Unhealthy'=>array(151,200),
							'Very Unhealthy'=>array(201,300),
							'Hazardous'=>array(301,501)				
	);	
	
	$PM25_indexBreakpoints = array(
									array(0.0,12.0,0,50),
									array(12.1,35.4,51,100),
									array(35.5,55.4,101,150),
									array(55.5,150.4,151,200),
									array(150.5,250.4,201,300),
									array(250.5,350.4,301,400),
									array(350.5,501,401,500)
	);
	
	if(isset($_GET['date']) && isset($_GET['latitude']) && isset($_GET['longitude']) && isset($_GET['pm25']) && isset($_GET['pm10']) && isset($_GET['o3']) && isset($_GET['so2']) 
		&& isset($_GET['no2']) && isset($_GET['co']) && isset($_GET['dew']) && isset($_GET['humidity']) && isset($_GET['wind'])) 
		{
			$_date = $_GET['date'];
			$_latitude = $_GET['latitude'];
			$_longitude = $_GET['longitude'];
			$_pm25 = $_GET['pm25']; //particle matter 2.5
			$_pm10 = $_GET['pm10']; //particle matter 10
			$_o3 = $_GET['o3']; //surface ozone 
			$_so2 = $_GET['so2']; //sulfur dioxide
			$_no2 = $_GET['no2']; //nitrogen dioxide
			$_co = $_GET['co']; //carbon monoxide
			$_dew = $_GET['dew'];
			$_humidity = $_GET['humidity'];
			$_wind = $_GET['wind'];
				
		}
	else {
		//error
		//print('GET VALUES MISSING');
		//print_r($_GET);		
		exit('GET values missing');
	}

	//Values to calculate AQI for PM2.5 concentrations
	$aqi_I; //the result
	$aqi_C = $_pm25;
	$aqi_Clow;
	$aqi_Chigh;
	$aqi_Ilow;
	$aqi_Ihigh;
	
	//calculate Clow & Chigh and Ilow & Ihigh
	foreach ($PM25_indexBreakpoints as $range) {
		if ($aqi_C >= $range[0] && $aqi_C <= $range[1]) {
			
			$aqi_Clow = $range[0];
			$aqi_Chigh = $range[1];
			
			$aqi_Ilow = $range[2];
			$aqi_Ihigh = $range[3];
		}
	}
	
	//now, calculate the aqi value ($aqi_I)
	$aqi_I = ( (($aqi_Ihigh - $aqi_Ilow) / ($aqi_Chigh - $aqi_Clow)) * ($aqi_C - $aqi_Clow) ) + $aqi_Ilow;
	$_AQIval = round($aqi_I, 0, PHP_ROUND_HALF_UP);

	//assign the category
	foreach ($AQI_categories as $key => $values) {
		//If aqi within category, assign that category, else continue to next category
		if ($_AQIval >= $values[0] && $_AQIval <= $values[1]) {
			$_AQIcat = $key;
		}
	}
	
	//find the suburb of given coordinates
	//use curl() request with the following url format
	//http://maps.google.com/maps/api/geocode/json?sensor=false&latlng=40.714224,-73.961452
	
	$query = "INSERT INTO aqi(Date,Latitude,Longitude,`PM2.5`,PM10,O3,S02,NO2,CO,Dew,Humidity,Wind,AQIval,AQIcat,Suburb) VALUES (
			:date,
			:latitude,
			:longitude,
			:pm25,
			:pm10,
			:o3,
			:so2,
			:no2,
			:co,
			:dew,
			:humidity,
			:wind,
			:AQIval,
			:AQIcat,
			:Suburb)";
			
	$stmt = $mysqli->prepare($query);
	
	$stmt->bindParam(':date', $_date, PDO::PARAM_STR);
	$stmt->bindParam(':latitude', $_latitude, PDO::PARAM_STR);
	$stmt->bindParam(':longitude', $_longitude, PDO::PARAM_STR);
	$stmt->bindParam(':pm25', $_pm25, PDO::PARAM_STR);
	$stmt->bindParam(':pm10', $_pm10, PDO::PARAM_STR);
	$stmt->bindParam(':o3', $_o3, PDO::PARAM_STR);
	$stmt->bindParam(':so2', $_so2, PDO::PARAM_STR);
	$stmt->bindParam(':no2', $_no2, PDO::PARAM_STR);
	$stmt->bindParam(':co', $_co, PDO::PARAM_STR);
	$stmt->bindParam(':dew', $_dew, PDO::PARAM_STR);
	$stmt->bindParam(':humidity', $_humidity, PDO::PARAM_STR);
	$stmt->bindParam(':wind', $_wind, PDO::PARAM_STR);
	$stmt->bindParam(':AQIval', $_AQIval, PDO::PARAM_STR);
	$stmt->bindParam(':AQIcat', $_AQIcat, PDO::PARAM_STR);
	$stmt->bindParam(':Suburb', $_Suburb, PDO::PARAM_STR);
	
	$stmt->execute();


	// $data = array('success' => 'true'); /** whatever you're serializing **/
	// header('Content-Type: application/json');
	// echo json_encode($data);
	echo 'pizza!!!';
	print_r($_GET);
	print_r($_AQIval);
	print_r($_AQIcat);
	
}

?>