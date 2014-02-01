<?php
function printCopyright() {
   date_default_timezone_set('America/Los_Angeles');
   $year = date('Y');
   print "<span class='copyright'> Copyright &copy ".$year."  KCPR 91.3fm, San Luis Obispo, California </span>\n";
}

?>
