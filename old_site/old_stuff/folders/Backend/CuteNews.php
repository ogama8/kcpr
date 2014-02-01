<?php

/**
 * Wrapper functions for many CuteNews calls
 * Most of these functions return big chunks of html. 
 * These aren't in a class because they work by requiring files.
 * See 3P/CuteNews/README.html for good info.
 */

define('CUTENEWS_PATH', ROOT.'/3P/cutenews');


function getNews($num = null) {
   ob_start();

   if ($num)
      $number = $num;

   include(CUTENEWS_PATH.'/show_news.php');
   $result = ob_get_contents();
   ob_end_flush();

   return $result;
}
/*
class CuteNews {
   static function getNews($num = null) {
      ob_start();

      if ($num)
         $number = $num;

      require(CUTENEWS_PATH.'/show_news.php');
      $result = ob_get_contents();
      ob_end_flush();

      return $result;
   }
}
 */
