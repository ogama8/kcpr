<?php

include "dateCompare.php";
include "listCAFiles.php";

function drawArchives($minHeight, $width) {
   $century = listCAFiles();
   print "<table class='archives'>\n\n";
   foreach ($century as $year => $links) {
      usort($links, "dateCompare");
      $height = max($minHeight, ceil(count($links) / $width));
      print "<tr><th colspan=$width>";
      print "&nbsp Charts for $year";
      print "</th></tr>\n"; 
      print "<tr><td><ul>\n";
      foreach ($links as $count => $date) {
         if ($count != 0 && $count % $height == 0) {
            print "</ul></td><td><ul>\n";
         }
         print "<li><a href='charts.php?month=".$date['m']."&day=".$date['d']."&year=".$date['y']."'>".$date['m']."/".$date['d']."/".$date['y']."</a></li>\n";
      }
      print "</ul></td></tr>\n\n";
   }
   print "</table>\n";
}
?>


