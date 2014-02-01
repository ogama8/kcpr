<?php

class Spot extends DataMapper {
   public function __construct($id = null) {
      parent::__construct($id);

      $this->has_one('show');
   }

   public function getClockTime() {
      $hours = (int)($this->time / 60); 
      $minutes = $this->time % 60;

      if ($minutes < 10) {
         $minutes = '0' . $minutes;
      }

      return $hours . ':' . $minutes;
   }

   public function setClockTime($timeString) {
      list($hours, $minutes) = explode(':', $timeString);

      $this->time = $hours * 60 + $minutes;
   }

   public function getHour() {
      return (int)($this->time  / 60);
   }

   public function getMinutes() {
      return $this->time % 60;
   }
}
