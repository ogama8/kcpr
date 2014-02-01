<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ShowsLib {
   public function __construct() {
      $this->controller =& get_instance(); 
   }

   public function getScheduleArray() {
      $spots = new Spot();
      $spots->get();

      foreach ($spots as $spot) {
         $spot->show->get();
         $result[$spot->getClockTime()][$spot->day] = $spot;
      }

      uksort($result, "ShowsLib::sortTimes");
      return $result;
   }

   public static function sortTimes($time1, $time2) {
      list($hours1, $minutes1) = explode(':', $time1);
      list($hours2, $minutes2) = explode(':', $time2);

      if ($hours1 == $hours2) {
         return $minutes1 > $minutes2;
      }

      // We like to put 12AM at the bottom of the schedule.
      if ($hours1 == "0") {
         return 1;
      }

      if ($hours2 == "0") {
         return -1;
      }

      return $hours1 > $hours2;
   }

   /** Get start times and length of all shows. */
   public function getBlocks() {
      $times = $this->getScheduleArray();

      for ($day = 0; $day < 7; $day++) {
         $prevTime = null;
         foreach ($times as $time => $days) {
            if ($prevTime != null) {
               $prev = &$times[$prevTime][$day];

               if ($prev->show_id == $times[$time][$day]->show_id) {
                  if (isset($prev->blocks)) {
                     $prev->blocks++;
                  } else {
                     $prev->blocks = 2;
                  }
                  
                  // Unset self, current block is absorbed by previous.
                  unset($times[$time][$day]);
                  $time = $prevTime;
               }

            } 
            $prevTime = $time;
         }
      }

      return $times;
   }

   /** 
    * Convert the times into a nicer looking 12 hour format
    */
   public function use12Hour($times) {
      $newTimes = array();

      foreach ($times as $time => $days) {
         $currentTime = strtotime($time);
         $minutes = date('i', $currentTime);
         if ($minutes > 0) 
            $newTime = date('g:ia', strtotime($time));
         else 
            $newTime = date('ga', strtotime($time));

         $newTimes[$newTime] = $days;
      }

      return $newTimes;
   }
}
