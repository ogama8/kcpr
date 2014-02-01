<?php

function drawMusicBanner($skip) {
   print "<table class='musicbanner'><tr><td class='music'><ul>\n";
   if ($skip != 1) {
      print "<li><a href='charts'>current charts</a></li>\n";
   }
   if ($skip != 2) {
      print "<li><a href='oldcharts'>chart archives</a></li>\n";
   }
   if ($skip != 3) {
      print "<li><a href='index'>get added</a></li>\n";
   }
   if ($skip != 4) {
      //print "<li><a href='hire'>hire a DJ<a/></li>\n";
   }
   print "<li><a href ='/'>go home</a></li>\n";
   print "</ul></td><td id='musiclisten'><a href='live'></a></td></tr></table>\n";
   print "\n";
}

?>
