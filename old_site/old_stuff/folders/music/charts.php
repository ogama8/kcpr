<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title> KCPR 91.3fm, San Luis Obispo - Charts & Adds</title>
<link rel=stylesheet href="/kcprstyle.css" type="text/css">
</head>
<body>
<?php
   //ini_set('display_errors', '1');
   //error_reporting(E_ALL);

   date_default_timezone_set('America/Los_Angeles');
   $root = $_SERVER['DOCUMENT_ROOT'];
   include $root."/data/functions/drawMusicBanner.php";
   include $root."/data/functions/drawCharts.php";
   include $root."/data/functions/printCopyright.php";

   if (isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year']))  {
      $day = $_GET['day'];
      $month = $_GET['month'];
      $year = $_GET['year'];
      $skip = 0; //show all banner links.
   } else {
      $day = date('d');
      $month = date('m');
      $year = date('y');
      $skip = 1; //don't show 'current charts' link.

   }

   print "<table class='center'><tr><td>\n";
   drawMusicBanner($skip);
   print "</td></tr><tr><td>\n";
   drawCharts($day, $month, $year);
   print "</td></tr><tr><td>\n";
   printCopyright();
   print "</td></tr></table>\n";


?>
</body>
</html>
