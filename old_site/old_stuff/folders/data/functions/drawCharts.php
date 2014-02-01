<?php
   function drawCharts($day, $month, $year) {
      $columnHeight = 25; //Names in each column.

      include("getCharts.php");
      list ($charts, $adds) = getCharts($day, $month, $year);
      $chartCols = ceil(count($charts) / $columnHeight);
      $addCols = ceil(count($adds) / $columnHeight);

      if ($charts != null) { 
         print "<table class='charts'><tr>\n";
         print "<th colspan=$chartCols>Charts for $month.$day.$year</th>\n";
         print "<th colspan=$addCols>Adds</th></tr><tr><td>\n";
         
         print "<ol>\n";
         foreach($charts as $ndx => $name) {
            if ($ndx != 0 && ($ndx % $columnHeight == 0)) {
               print "</ol></td><td><ol start=".($ndx+1).">\n";
            }
            print "<li>$name</li>\n";
         }

         print "\n</ol></td><td class='adds'><ul>\n";
         foreach($adds as $ndx => $name) {
            if ($ndx != 0 && ($ndx % $columnHeight == 0)) {
               print "</ul></td><td class='adds'><ul>\n";
            }
            print "<li>$name</li>\n";
         }
         print "</ul></td></tr></table>\n";
      }
   }
?>
