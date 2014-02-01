<?php
   ini_set('display_errors', '1');
   error_reporting(E_ALL);
$home = $_SERVER['DOCUMENT_ROOT'];
require($home.'/Backend/base.php');

$page = new Page();

$page->display();
