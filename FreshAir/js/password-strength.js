/*
 checks password strength
- Password has at least 6 characters 
- Strong password contain a symbol, Uppercase leer and number
*/

$(document).ready(function() {
    $('#PW').keyup(function() {
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
    });
});
