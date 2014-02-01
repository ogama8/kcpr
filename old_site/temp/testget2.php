<?php

$html = file_get_contents('http://spinitron.com/radio/playlist.php?station=kcpr&show=schedule')
$html = tidy_repair_string($html);
$doc = new DomDocument();
$doc->loadHtml($html);
$xpath = new DomXPath($doc);
//queery document
foreach ($xpath->query('div id="bigscheddiv"') as $node)
{
   echo $node, "/n";
}

?>
