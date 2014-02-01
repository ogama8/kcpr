<?php
function listCAFiles() {
      
   $handler = opendir($_SERVER['DOCUMENT_ROOT']."/data/charts");
   $century = array();

   while ($file = readdir($handler)) {
      if ($file != '.' && $file != '..') {
         $date = ltrim($file, "CA");
         list($month, $day, $year) = explode('-', $date, 3);
         $YEAR = "20".$year; 
         $century[$YEAR][] = array('d' => $day, 'm' => $month, 'y' => $year);
      }
   }
   krsort($century);
   return $century;
}
?>
