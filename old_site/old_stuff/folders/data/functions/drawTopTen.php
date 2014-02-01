<?php
   function drawTopTen() {
      include("getCharts.php");
      date_default_timezone_set('America/Los_Angeles');

      $day = date('d');
      $month = date('m');
      $year = date('y');
      $charts = getCharts($day, $month, $year);

      if ($charts != null) {
         $charts = $charts[0]; //0 => charts, 1 => adds
         print "<table id='topten'><tr>\n";
         print "<th>KCPR Top Plays for the last week ($month/$day/$year):</th></tr><tr>\n";
         print "<td><ol>\n";
         for ($ndx = 0; $ndx < 10; $ndx++) {
            print "<li>".$charts[$ndx]."</li>\n";
         }
         print "</ol></td></tr></table>\n";
      }
   }
?>
