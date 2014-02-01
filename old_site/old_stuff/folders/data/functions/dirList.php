<?php
//Found this on a site, nifty!
function dirList($directory) {
   $results = array();

   $handler = opendir($directory);

   while ($file = readdir($handler)) {
      //don't read current and parent!
      if ($file != '.' && $file != '..') {
         $results[] = $file;
      }
   }

   closedir($handler);
   return $results;
}
?>
