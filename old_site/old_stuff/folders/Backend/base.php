<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require(ROOT.'/Backend/Page.php');
require(ROOT.'/Backend/AuthPage.php');
require(ROOT.'/Backend/CuteNews.php');
require(ROOT.'/Backend/Database.php');
require(ROOT.'/Backend/URI.php');

function debugOn() {
   define('DEBUG', 1);
   ini_set('display_errors', '1');
   error_reporting(E_ALL);
}

debugOn();
