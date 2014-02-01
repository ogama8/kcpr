<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title> KCPR 91.3fm, San Luis Obispo - Charts & Adds Archives</title>
<link rel=stylesheet href="/kcprstyle.css" type="text/css">
</head>
<body>
<?php
   //ini_set('display_errors', '1');
   //error_reporting(E_ALL);

   include $_SERVER['DOCUMENT_ROOT'].'/data/functions/drawMusicBanner.php' ;
   include $_SERVER['DOCUMENT_ROOT']."/data/functions/drawArchives.php" ;
   include $_SERVER['DOCUMENT_ROOT']."/data/functions/printCopyright.php" ;

   $minHeight = 4;
   $width = 5;

   print "<table class='center'><tr><td>\n";
   drawMusicBanner(2); 
   print "</td></tr><tr><td>\n";
   drawArchives($minHeight, $width); 
   print "</td></tr><tr><td>\n";
   printCopyright(); 
   print "</td></tr></table>\n";

?>
</body>
</html>
