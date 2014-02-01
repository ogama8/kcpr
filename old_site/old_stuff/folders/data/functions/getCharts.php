<?php
   function getCharts(&$day, &$month, &$year) {
      //returns an array. First element is list of charts, second is adds.
      $folder = $_SERVER['DOCUMENT_ROOT']."/data/charts/";
      $tries = 30; //When searching for charts, how many days to look back at.

      validate($day, $month, $year);
      for ($count = 0; $count < $tries; $count++) {
         $fileName = $folder."CA$month-$day-$year";
         if (file_exists($fileName)) {
            $fh = fopen($fileName, 'r');
            $chartsAndAdds = readCharts($fh);
            fclose($fh);
            return $chartsAndAdds;
         }
         yesterday($day, $month, $year);
      }
      return null;
   }

   function validate(&$day, &$month, &$year) {
      //makes sure dates are two digits each
      $day = sprintf('%02u', $day);
      $month= sprintf('%02u', $month);
      $year= sprintf('%02u', $year);
   }

   function readCharts($fh) {
      $charts = array();
      $adds = array();
      $readAdds = false;
      while(!feof($fh)) {
         $name = fgets($fh);
         if (($name = trim($name)) != "") {
            if ($name == "Adds") {
               $readAdds = true;
               continue;
            }
            if ($readAdds) {
               $adds[] = $name;
            } else {
               $charts[] = $name;

            }
         }
      }
      return array($charts, $adds);
   }

   function yesterday(&$day, &$month, &$year) {
      if (--$day < 0) {
         $day = 31;
         if (--$month < 0) {
            $month = 12;
            if (--$year < 0) {
              $year = 99;
            }
         }
      }
      validate($day, $month, $year);
   }

