<?php

function cleanUpCharts($data) {
   $line = preg_split('/\r\n|\r|\n/', $data);
   $count = 1;
   $addsYet = false;
   $newData = "";

   trim($line[0]);
   if ($line[0] == "Charts" || $line[0] == "charts") {
      unset($line[0]);
   }
   //Format each line nicely.
   foreach ($line as $index => &$value) {
      trim($value);
      if ($value == null) {
         unset($line[$index]);
      } else {
         if (!$addsYet && ($value == "Adds" || $value == "adds")) {
            $value = "\nAdds";
            $addsYet = true;
            $count = 1;
         } else {
            $divided = explode(".", $value, 2);
            if ($divided[0] != $value) {
               list($num, $name) = $divided;
               if ($num == $count) {
                  $value = trim($name);
               }
            }
            $count++;
         }
         $value .= "\n";
         $newData .= $value; 
      }
   }
   return $newData;
}
?>
