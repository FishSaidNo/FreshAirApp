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