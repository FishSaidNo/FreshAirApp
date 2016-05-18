function validateForm() {
            var x = document.forms["form"]["username"].value;
            if (x == null || x == "") {
                alert("User Name must be filled out");
                return false;
            }

            var x1 = document.forms["form"]["password"].value;
            if (x1 == null || x1 == "") {
                alert("Password must be filled out");
                return false;
            }

            var x2 = document.forms["form"]["confirmpassword"].value;
            if (x2 == null || x2 == "") {
                alert("Password must be filled out");
                return false;
            }

            if (x1 != x2) {
                alert("Password does not match");
                return false;
            }
            
            if(isNaN(x1)||isNaN(x2)){
                alert("Password must be numeric");
                return false;
            }

            var email = document.forms["form"]["email"].value;
            if (email != null && !validateEmail(email)) {
                alert("email is not valid");
                return false;
            }

            // regular expression to match required date format
            re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
             var birtdate=document.forms["form"]["birthdate"].value;
             if (!birthdate.match(re)) {
                alert("Invalid date format: " + birtdate.value);                
                return false;
            }

        }

        function validateEmail(email) {
            var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
            return re.test(email);
        }