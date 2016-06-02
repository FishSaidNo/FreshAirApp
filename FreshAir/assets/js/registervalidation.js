function validateForm() {
            
            var passw = document.forms["form"]["password"].value;
            if (passw != null && !validatePasswor(passw))) {
                alert("Password must be filled out");
                return false;
				
				validatePassword(passw);
            }
            var x2 = document.forms["form"]["newPassword"].value;
			if (x2 != null && !validatePasswor(x2)) {
                alert("Password does not match");
                return false;
            }
			
			var x1 = document.forms["form"]["newPassword1"].value;
			if (x1 != x2) {
                alert("Password does not match");
                return false;
            }
			
			var description = document.forms["form"]["description"].value;
			if (passw != x2) {
                alert("Password does not match");
                return false;
            }

            var email = document.forms["form"]["email"].value;
            if (email != null && !validateEmail(email)) {
                alert("email is not valid");
                return false;
            }

        }

function validateEmail(email) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test(email);
}

 function validatePassword(passw) {
	 var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
	 var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
	 var enoughRegex = new RegExp("(?=.{6,}).*", "g");
	 if (false == enoughRegex.test($(this).val())) {
			 $('#passstrength').html('More Characters');
			 //add elimination of common passwords
	 } else if (strongRegex.test($(this).val())) {
			 $('#passstrength').className = 'ok';
			 $('#passstrength').html('Strong!');
	 } else if (mediumRegex.test($(this).val())) {
			 $('#passstrength').className = 'alert';
			 $('#passstrength').html('Medium!');
	 } else {
			 $('#passstrength').className = 'error';
			 $('#passstrength').html('Weak!');
	 }
 return true;
}