
var map;

		function initialize() {
			var myLatlng = new google.maps.LatLng(-27.615549,153.030034);

			var mapOptions = {
			zoom: 11							
		  };
		  
		 var map = new google.maps.Map(document.getElementById('map-canvas'),
				 mapOptions);
			
		 var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title: 'Hello World!'
		  });
		  
		  // Try HTML5 geolocation
		  if(navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
			  var pos = new google.maps.LatLng(position.coords.latitude,
											   position.coords.longitude);

			  var infowindow = new google.maps.InfoWindow({
				map: map,
				position: pos,
				content: 'Location found using HTML5.'
			  });

			  map.setCenter(pos);
			}, function() {
			  handleNoGeolocation(true);
			});
		  } else {
			// Browser doesn't support Geolocation
			handleNoGeolocation(false);
		  }

		function handleNoGeolocation(errorFlag) {
		  if (errorFlag) {
			var content = 'Error: The Geolocation service failed.';
		  } else {
			var content = 'Error: Your browser doesn\'t support geolocation.';
		  }

		  var options = {
			map: map,
			position: new google.maps.LatLng(-27.615549,153.030034),
			content: content
		  };

		  var infowindow = new google.maps.InfoWindow(options);
		  map.setCenter(options.position);
		}
	}
	
// Validate Form SignUp
function validate() {
	
  if (checkName() == false || checkLastName() == false  || checkEmail()== false  || checkPassword()== false ) {
	checkName();
	checkLastName();
	checkEmail();
	checkDate();
	checkPassword();	

	}
	 else{		  
		  alert("Your information has been submitted"); 
		  return true;
		   
	  }
 }  
function checkName() {
	var x = document.forms["myForm"]["firstName"].value;
	if (!/([a-zA-Z]{3,30}\s*)+/.test(x)) {
		// name contains a digit
		alert("Name field is incorrect");
		return false;
		}
	else {
		return true;				 
	}
}
function checkLastName() {
	  var x = document.forms["myForm"]["lastName"].value;
	  if (!/[a-zA-Z]{3,30}/.test(x)) {
			// name contains a digit
			alert("Last Name field is incorrect");
			return false;
			}
		else {
			return true;				 
		}
}

function checkPassword() {
	  var x = document.forms["myForm"]["password"].value;
	  var y = document.forms["myForm"]["confirmPassword"].value;

	  if (!/([a-zA-Z0-9@*#]{8,15})$/.test(x) || (x != y)) {
			// name contains a digit
			alert("Password field is incorrect");
			return false;
		}
		else {
			return true;				 
		}
}

function checkEmail() {
	  var x = document.forms["myForm"]["email"].value;
	  if (!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})+$/.test(x)) {
			// name contains a digit
			alert("Email field is incorrect");
			return false; 
		}			
		else {
			return true;				 
		}
}
function checkDate() {
	  var x = document.forms["myForm"]["date"].value;
	  if (!/^[0-3]?[0-9]\/[01]?[0-9]\/[12][90][0-9][0-9]$/.test(x)) {
			// name contains a digit
			alert("Date field is incorrect");
			return false; 
			}			
		else {
			return true;				 
			}
}
		
		