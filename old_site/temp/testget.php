<?php

$doc = new DOMDocument;

//we need to validate website first, dunno y lol
$doc->validateOnParse = true;
$content = file_get_contents('http://www.kcpr.org/index.php');
$hi = "hi";

$doc->loadHtml('http://www.google.com/');

echo "hi" . $content;

?>
