<?php

/**
 * URI generator for the entire site. Keeps the linkage in one place
 */

class URI {
   public static function charts($date) {
      return '/charts';
   }

   // $date has keys month, day, year.
   public static function editCharts($date) {
      $unixtime = mktime(0, 0, 0, $date['month'], $date['day'], $date['year']);
      return "/admin/charts/simple_charts.php?date=$unixtime&overwrite=true";
   }
}
