<?php
function dateCompare($first, $second) {
   if ($first['y'] > $second['y']) {
      return -1;
   } 
   if ($first['y'] < $second['y']) {
      return 1;
   }
   if ($first['m'] > $second['m']) {
      return 1;
   }
   if ($first['m'] < $second['m']) {
      return -1;
   }
   if ($first['d'] > $second['d']) {
      return 1;
   }
   if ($first['d'] < $second['d']) {
      return -1;
   }
   return 0;
}
?>
