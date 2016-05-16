function opentoshowgallery(cd, catid) {
                     debugger;
                     if (cd == 1)
                         window.open("https://facebook.com/sharer/sharer.php?u=" + catid);
                     else if (cd == 3)
                         window.open("https://twitter.com/share?url=" + catid);
                     else if (cd == 4)
                         window.open("http://pinterest.com/pin/create/button/?url=" + catid);
                     else if (cd == 2)
                         window.open("https://plus.google.com/u/0/share?url=" + catid);
                     return false;
                 }



                 function opentwitterlink(cd, catid, cattitle) {
                     debugger;
                     if (cd == 1)
                         window.open("https://twitter.com/share?text=" + cattitle + "&url=" + catid);
                     else if (cd == 2)
                         window.open("https://twitter.com/share?text=" + cattitle + "&url=" + catid);
                     else if (cd == 3)
                         window.open("https://twitter.com/share?text=" + cattitle + "&url=" + catid);
                     return false;
                 }


                 function openpinterest(cd, catid, media, desc) {
                     debugger;
                     if (cd == 1)
                         window.open("https://www.pinterest.com/pin/create/button/?url=" + catid + "&media=" + media + "&description=" + desc);
                     else if (cd == 2)
                         window.open("https://www.pinterest.com/pin/create/button/?url=" + catid + "&media=" + media + "&description=" + desc);
                     else if (cd == 3)
                         window.open("https://www.pinterest.com/pin/create/button/?url=" + catid + "&media=" + media + "&description=" + desc);
                     return false;
                 }





 function CheckPassword() {


console.log("check password");
            var txt = document.getElementById("pwd").value;

            if (txt == '' || txt == null || txt == undefined) {
                alert("Please inout the password");
                return false;
            }
           
            
            if(txt.length < 8)
            {
                alert("Password should be 8 char long");
                return false;
            }

            var isNum = true;
            var isChar = true;
            
            for (var i = 0 ; i < txt.length; i++) {
                var num = txt.charCodeAt(i);

                if (num >= 65 && num <= 92)
                    isChar = false;

                if (num >= 48 && num <= 57)
                    isNum = false;
            }

            if (isNum || isChar)
            {
                alert("Password should contain at least 1 upper case character and 1 number");
                return false;
            }

 var ctxt = document.getElementById("cpwd").value;

if( txt != ctxt )
{ alert("Password and confirm password are not same ");
return false;}

            else
            return true;


        }
