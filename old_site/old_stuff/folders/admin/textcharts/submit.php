<?php
require($_SERVER['DOCUMENT_ROOT'].'/Backend/base.php');
require(ROOT.'/Backend/Charts.php');
require ('cleanUpCharts.php');

$page = new AuthPage();

$page->addAllowed(AuthPage::ADMIN);
$page->addAllowed(AuthPage::MD);

if (empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"])) {
   $msg = "Maybe <a href='create.php'>this</a> is the page you want?";
} else {
   $data = isset($_POST["data"]) ? $_POST['data'] : null;
   $day = $_POST["day"];
   $month = $_POST["month"];
   $year = $_POST["year"];
   $overwrite = isset($_GET["overwrite"]) ? $_GET['overwrite'] : false;

   $fileName = ROOT."/data/charts/CA$month-$day-$year";
   /**
   if (!$overwrite && file_exists($fileName)) {
      $msg = "Woah, a charts&adds file already exists for that date: "
       . "$month/$day/$year."
       . "Continue and overwrite existing file?(Just hit back if no)"
       . "<a href=\"javascript:myPost('submit.php?overwrite=1', "
       . "{data: '$data' day: '$day' month: '$month', year: '$year'});\">"
       . "yes: overwrite</a>";

   } else {
    */
      $data = cleanUpCharts($data);
      $data = htmlentities($data);
      $fh = fopen($fileName, 'w');
      if ($fh) {
         fwrite($fh, $data); 
         fclose($fh);
         $msg = <<<EOT
         Success!
         <ul>What's next?
         <li><a href=/music/charts.php?month=$month&day=$day&year=$year>
                view newly submitted chart</a></li>
         <li><a href='create'>create charts</a></li>
         <li><a href='change'>edit charts</a></li>
         <li><a href='..'>back to admin options</a></li>
EOT;
      } else {
         $msg = "Error opening file. ";
      }
   //}
}

$page->addVariable('msg', $msg);
$page->addTemplate('old/submit.tpl');
$page->addScript('old/myPost.js');
$page->display();

