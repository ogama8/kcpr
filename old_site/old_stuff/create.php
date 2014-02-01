<?php
require($_SERVER['DOCUMENT_ROOT'].'/Backend/base.php');
require(ROOT.'/Backend/Charts.php');

$page = new AuthPage();

$page->addAllowed(AuthPage::ADMIN);
$page->addAllowed(AuthPage::MD);

$day = isset($_POST["day"]) ? $_POST['day'] : null;
$month = isset($_POST['month']) ? $_POST['month'] : null;
$year = isset($_POST['year']) ? $_POST['year'] : null;
$overwrite = isset($_GET["overwrite"]) ? $_GET['overwrite'] : null;

if ($day != null && $month != null && $year != null) {
   $date = "$month-$day-$year";
   $fileName = ROOT."data/charts/CA$date";
   if (file_exists($fileName)) {
      $fh = fopen($fileName, "r");
      $data = fread($fh, filesize($fileName));
      fclose($fh);
   } else {
      $error = "No charts for $date exist! Check that the date is right or just create it now.";
      $page->addVariable('error', $error);
   }
}  

$page->addVariable('data', isset($data) ? $data : null);
$page->addVariable('day', $day); 
$page->addVariable('month', $month); 
$page->addVariable('year', $year); 
$page->addVariable('overwrite', $overwrite);
$page->addTemplate('old/textcharts.tpl');
$page->addScript('old/checkDate.js');

$page->display();
