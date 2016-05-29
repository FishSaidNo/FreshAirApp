var globalLatitude;
var globalLongitude;

var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
    },
    // Bind Event Listeners
    //
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    //
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        app.receivedEvent('deviceready');
		generate_geolocation(); 
    },
    // Update DOM on a Received Event
    receivedEvent: function(id) {
        // var parentElement = document.getElementById(id);
        // var listeningElement = parentElement.querySelector('.listening');
        // var receivedElement = parentElement.querySelector('.received');

        // listeningElement.setAttribute('style', 'display:none;');
        // receivedElement.setAttribute('style', 'display:block;');

        console.log('Received Event: ' + id);
    },	
    sendSms: function(number, message) {
        //var number = $('#numberTxt').val();
        //var message = $('#messageTxt').val();
        //alert(number);
        //alert(message);

        //CONFIGURATION
        var options = {
            replaceLineBreaks: false, // true to replace \n by a new line, false by default
            android: {
                //intent: 'INTENT'  // send SMS with the native android SMS messaging
                intent: '' // send SMS without open any other app
            }
        };

        var success = function () { alert('Message sent successfully'); };
        var error = function (e) { alert('Message Failed:' + e); };
        sms.send(number, message, options, success, error);
    }
	
};

app.initialize();

var ourDataset;
var navHistory = [];

$('#btnGeoSend.btn').prop('disabled', true); //disable send button until data generated
$('#btnShowSms.btn').prop('disabled', true);

$('#openWebsite.btn').click(function() {
	window.open('http://freshairbrisbane.com', '_system');
});

$('a.navbar-brand').click(function(e){
	e.preventDefault();
	$('.navbar-toggle').trigger('click');
});

$('a').on('click', function (e) {
	if ($(this).hasClass('appLink')) {
		e.preventDefault(); //Prevent following the link
		var newPage = $(this).attr('href');
		
		if (newPage != 'fakeLink') {
			//Make active selection in menu
			$('#navMenuList > li').removeClass('active');
			$(this).parent('li').addClass('active');
			
			$('#pageContentWrapper .pageContent').hide(0); //Hide all other pageContent divs
			$('#pageContentWrapper .pageContent'+newPage).show(0); //Display/unhide the new page		
		}
		$('.navbar-toggle').trigger('click'); //Close the nav menu
	}
	else {
		//e.preventDefault();
		//alert('Unhandeled link....');
	}
	
})

$('#btnGenerateSample.btn').on('click', function (e) {
	ourDataset = generateDummyDataset();
		
	if (ourDataset) {
		var ourDatasetJSON = JSON.stringify(ourDataset);
		//$('#dataSampleResults').empty();
		//$('#dataSampleResults').append('<p><strong>JSON Format</strong>:<br/>'+ourDatasetJSON+'</p>');

		$('#dataSampleResults #dataDate').text(ourDataset.date);
		$('#dataSampleResults #dataTime').text(ourDataset.time);
		$('#dataSampleResults #dataLat').text(ourDataset.latitude);
		$('#dataSampleResults #dataLong').text(ourDataset.longitude);
		$('#dataSampleResults #dataPM25').text(ourDataset.pm25);
		$('#dataSampleResults #dataPM10').text(ourDataset.pm10);
		$('#dataSampleResults #dataO3').text(ourDataset.o3);
		$('#dataSampleResults #dataSO2').text(ourDataset.so2);
		$('#dataSampleResults #dataNO2').text(ourDataset.no2);
		$('#dataSampleResults #dataCO').text(ourDataset.co);
		$('#dataSampleResults #dataDew').text(ourDataset.dew);
		$('#dataSampleResults #dataHumidity').text(ourDataset.humidity);
		$('#dataSampleResults #dataTemperature').text(ourDataset.temperature);

		$('#btnGeoSend.btn').prop('disabled', false);
		$('#btnShowSms.btn').prop('disabled', false);
	}

});

$('#btnGeoSend.btn').on('click', function (e) {		
	if (ourDataset) {
		
		var request = $.ajax({
			//url: 'http://192.168.178.30:80/receiveDataFromApp.php', //local
			url: 'http://freshairbrisbane.com:80/receiveDataFromApp.php', //server
			type: 'GET',
			//data: {id : menuId},
			data: ourDataset,
			dataType: 'html',
			success: function (resp) {
				alert('Server Response:\n' + resp);
			},
			error: function(e) {
				alert('Ajax error: '+e);
			} 		  
		});		

	}
	$(this).prop('disabled', true);
});

$('#btnShowSms.btn').on('click', function (e) {		
	
	$('#smsOptions').toggle();
	$('#sendSmsTo').val('');
	
});
$('#btnSendSms.btn').on('click', function (e) {		
	
	var num = $('#sendSmsTo').val();
	if (!isFinite(num) || num.toString().length != 10) {
		alert('Invalid mobile number. Please try again...');
		return false;
	}
	var msg = JSON.stringify(ourDataset);
	app.sendSms(num, msg);
	
	$('#btnShowSms.btn').trigger('click');
	
});

//This function will generate an object of data realting to an air quilty sample
function generateDummyDataset() {
	
	var _date;
	var _time;
	var _latitude;
	var _longitude;
	var _pm25; //particle matter 2.5
	var _pm10; //particle matter 10
	var _o3; //surface ozone 
	var _so2; //sulfur dioxide
	var _no2; //nitrogen dioxide
	var _co; //carbon monoxide
	var _dew;
	var _humidity;
	var _temperature;
	//values for AQIval, AQIcat and suburb will be generated on the server side from this data...

	if (!globalLatitude || !globalLongitude) {
		alert('There has been an error obtaining the geolocation data :-( Please wait 5 seconds and try again');
		return false;
	}
	
	_date = generate_date();
	_time = generate_Time();
	_pm25 = generate_pm25();
	_pm10 = generate_pm10();
	_o3 = generate_o3();
	_so2 = generate_so2();
	_no2	= generate_no2();
	_co = generate_co();
	_dew = generate_dew();
	_humidity = generate_humidity();
	_temperature = generate_temperature();
	
	generate_geolocation(); //This will update globalLatitude & globalLongitude
	_latitude = globalLatitude;
	_longitude = globalLongitude;
	
	if (!globalLatitude || !globalLongitude) {
		generate_geolocation(); 
		alert('There has been an error obtaining the geolocation data :-( Please wait 5 seconds and try again');
		return false;
	}
	
	dataset = {date: _date, 
				time: _time,
				latitude: _latitude,
				longitude: _longitude,
				pm25: _pm25,
				pm10: _pm10,
				o3: _o3,
				so2: _so2,
				no2: _no2,
				co: _co,
				dew: _dew,
				humidity: _humidity,
				temperature: _temperature
				}
	
	return dataset;
}

function generate_Time() {
	var currentTime = new Date();
	
	var h = currentTime.getHours();
	var m = currentTime.getMinutes();
	var s = currentTime.getSeconds();
	
	if (h < 10) {
		h = '0' + h;
	}
	if (m < 10) {
		m = '0' + m;
	}
	if (s < 10) {
		s = '0' + s;
	}
	
	return h+':'+m+':'+s;
}
function generate_date() {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;//January is 0, so always add + 1

	var yyyy = today.getFullYear();
	if(dd<10){dd='0'+dd}
	if(mm<10){mm='0'+mm}
	today = yyyy+'-'+mm+'-'+dd;
	
	return today;
}
function generate_geolocation() {
	
	var currentPosition; //will contain our geolocation data

	// onError Callback receives a PositionError object
	function onError(error) {
		//alert('code: '    + error.code    + '\n' +
		//	  'message: ' + error.message + '\n');
	}
	
	// onSuccess Callback
	// This function accepts a Position object, which contains the
	// current GPS coordinates
	var onSuccess = function(position) {
		// alert('Latitude: '          + position.coords.latitude          + '\n' +
			  // 'Longitude: '         + position.coords.longitude         + '\n' +
			  // 'Altitude: '          + position.coords.altitude          + '\n' +
			  // 'Accuracy: '          + position.coords.accuracy          + '\n' +
			  // 'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
			  // 'Heading: '           + position.coords.heading           + '\n' +
			  // 'Speed: '             + position.coords.speed             + '\n' +
			  // 'Timestamp: '         + position.timestamp                + '\n');
			  
		// $('#geolocationData').html('<p><strong>Latitude</strong>: '+position.coords.latitude+'</p>\
									// <p><strong>Longitude</strong>: '+position.coords.longitude+'</p>\
									// <p><strong>Altitude</strong>: '+position.coords.altitude+'</p>\
									// <p><strong>Accuracy</strong>: '+position.coords.accuracy+'</p>\
									// <p><strong>Altitude Accuracy</strong>: '+position.coords.altitudeAccuracy+'</p>\
									// <p><strong>Heading</strong>: '+position.coords.heading+'</p>\
									// <p><strong>Speed</strong>: '+position.coords.speed+'</p>\
									// <p><strong>Timestamp</strong>: '+position.timestamp+'</p>'
		// );
		
		//var currentPosition = {"position":}
		_currentPosition = {latitude: position.coords.latitude, 
						longitude: position.coords.longitude,
						altitude: position.coords.altitude,
						accuracy: position.coords.accuracy,
						altitudeAccuracy: position.coords.altitudeAccuracy,
						heading: position.coords.heading,
						speed: position.coords.speed,
						timestamp: position.timestamp
						}
		//alert(JSON.stringify(currentPosition));	
		//$('#geolocationData').append('<p><strong>JSON Format</strong>: '+JSON.stringify(currentPosition)+'</p>');
		
		//currentPosition = _currentPosition;
		globalLatitude = _currentPosition.latitude;
		globalLongitude = _currentPosition.longitude;
		
	 };
	 
	navigator.geolocation.getCurrentPosition(onSuccess, onError, {maximumAge:3000, timeout:5000, enableHighAccuracy:true});
	
	//return currentPosition;	
}
function generate_pm25() {
	var percentChance = Math.floor(Math.random() * 100 + 1);
	var result;
	
	if (percentChance <= 50) {
		result = getRandomInt(0, 22);		
	}
	else if (percentChance <= 70) {
		result = getRandomInt(23, 50);
	}		
	else if (percentChance <= 90) {
		result = getRandomInt(51, 100);
	}	
	else if (percentChance <= 99) {
		result = getRandomInt(101, 250);
	}
	else {
		result = getRandomInt(251, 500);
	}
	
	return result;
}
function generate_pm10() {
	var result = getRandomInt(0, 604);
	return result;	
}
function generate_o3() {
	var result = getRandomDouble(0, 1.99);
	return result;	
}
function generate_so2() {
	var result = getRandomInt(0, 1004);
	return result;	
}
function generate_no2() {
	var result = getRandomDouble(0, 1.99);
	return result;	
}
function generate_co() {
	var result = getRandomInt(0, 35);
	return result;	
}
function generate_dew() {
	var result = getRandomInt(0, 25);
	return result;
}
function generate_humidity() {
	var result = getRandomInt(0, 100);
	return result;	
}
function generate_temperature () {
	var result = getRandomInt(4, 41);
	return result;	
}

/**
 * Returns a random integer between min (inclusive) and max (inclusive)
 * Using Math.round() will give you a non-uniform distribution!
 */
function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomDouble(min, max) {
    var num = Math.random() < 0.5 ? ((1-Math.random()) * (max-min) + min) : (Math.random() * (max-min) + min);
	return num.toFixed(2);
}



// function getLocation() {

	// // onSuccess Callback
	// // This method accepts a Position object, which contains the
	// // current GPS coordinates
	// //
	// var onSuccess = function(position) {
		// // alert('Latitude: '          + position.coords.latitude          + '\n' +
			  // // 'Longitude: '         + position.coords.longitude         + '\n' +
			  // // 'Altitude: '          + position.coords.altitude          + '\n' +
			  // // 'Accuracy: '          + position.coords.accuracy          + '\n' +
			  // // 'Altitude Accuracy: ' + position.coords.altitudeAccuracy  + '\n' +
			  // // 'Heading: '           + position.coords.heading           + '\n' +
			  // // 'Speed: '             + position.coords.speed             + '\n' +
			  // // 'Timestamp: '         + position.timestamp                + '\n');
			  
		// $('#geolocationData').html('<p><strong>Latitude</strong>: '+position.coords.latitude+'</p>\
									// <p><strong>Longitude</strong>: '+position.coords.longitude+'</p>\
									// <p><strong>Altitude</strong>: '+position.coords.altitude+'</p>\
									// <p><strong>Accuracy</strong>: '+position.coords.accuracy+'</p>\
									// <p><strong>Altitude Accuracy</strong>: '+position.coords.altitudeAccuracy+'</p>\
									// <p><strong>Heading</strong>: '+position.coords.heading+'</p>\
									// <p><strong>Speed</strong>: '+position.coords.speed+'</p>\
									// <p><strong>Timestamp</strong>: '+position.timestamp+'</p>'
		// );
		
		// //var currentPosition = {"position":}
		// var currentPosition = {latitude: position.coords.latitude, 
						// longitude: position.coords.longitude,
						// altitude: position.coords.altitude,
						// accuracy: position.coords.accuracy,
						// altitudeAccuracy: position.coords.altitudeAccuracy,
						// heading: position.coords.heading,
						// speed: position.coords.speed,
						// timestamp: position.timestamp
						// }
		// //alert(JSON.stringify(currentPosition));	
		// $('#geolocationData').append('<p><strong>JSON Format</strong>: '+JSON.stringify(currentPosition)+'</p>');
	 // };

	// // onError Callback receives a PositionError object
	// //
	// function onError(error) {
		// alert('code: '    + error.code    + '\n' +
			  // 'message: ' + error.message + '\n');
	// }

	// navigator.geolocation.getCurrentPosition(onSuccess, onError, {maximumAge:3000, timeout:5000, enableHighAccuracy:true});

// }