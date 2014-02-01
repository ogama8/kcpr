<?php

class Simple_chart extends DataMapper {
   const CHART = 0;
   const ADD = 1;

   public function __construct($id = null) {
      parent::__construct($id);
   }

   /**
    * Get the top charts for around a date.
    * @return The top x Charts (not adds).
    */
   public function getTop($amount = 10) {
      $date = $this->mostRecent(time());

      return $this->getCharts(self::CHART, $date, $amount);
   }

   /**
    * Get the charts or adds around a date. 
    * @param $amount if not null then  will limit by an amount.
    * @return filtered Simple_charts object.
    */
   public function getCharts($type, $date, $amount = null) {
      $charts = $this->findByDate($date)->where('type', $type);

      if ($amount != null) {
         $charts = $charts->where('rank <=', $amount);
      }

      return $charts;
   }

   /**
    * Wrapper for getCharts that does charts and adds.
    * Returns objects safe for manipulating.
    * @return array($charts, $adds)
    */
   public function getChartsAndAdds($date) {
      $charts = $this->getCharts(self::CHART, $date)->get()->get_clone();
      $adds = $this->getCharts(self::ADD, $date)->get()->get_clone();

      return array($charts, $adds);
   }

   /**
    * Get the charts from a unitxtime or date.
    */
   public function findByDate($date) {
      if (is_numeric($date)) {
         $date = date('Y/m/d', $date);
      }

      $charts = $this
       ->select_func('*, strftime', "%Y/%m/%d", '@date', 'unixepoch', 'strdate')
       ->where('strdate', $date)
       ->order_by('rank', 'asc')
       ->order_by('type', 'asc');

      $charts = $charts->get_clone();

      return $charts;
   }

   /** 
    * @return array($charts, $adds)
    */
   public function splitByType() {
      $charts = $this->where('type', self::CHART);
      $adds = $this->where('type', self::ADD);

      return array($charts, $adds);
   }

   /**
    * Do charts exist for a certain date?
    */
   public function exists($date) {
      $date = date('m-d-Y', $date);

      $exist = $this
       ->select_func('strftime', '%m-%d-%Y', '@date', 'unixepoch', 'strtime')
       ->where('strtime', $date)
       ->get();

      return $exist;
   }

   /**
    * Finds the most recent charts before a $date
    * @return unixtime of most recent charts entry.
    */
   public function mostRecent($date) {
      if (is_numeric($date))
         $date = date('Y-m-d', $date);
      else 
         $date = $this->db->escape($date);
     

      $mostRecent = 
       $this->select('date')
       ->where('date <=', $date)
       ->order_by('date', 'desc')
       ->limit(1)
       ->get();

      return $mostRecent->date;
   }

   /** 
    * Textual representation of a list of charts.
    */
   public function toString() {
      $text = "Charts\r\n";

      $charts = $this->get_clone()->where('type', self::CHART)->get();
      foreach ($charts as $chart) {
         $text .= "{$chart->rank}. {$chart->artist}";
         $text .= $chart->album != null ? " [{$chart->album}]" : '';
         $text .= $chart->label != null ? " ({$chart->label})" : '';
         $text .= "\r\n";
      } 

      $text .= "\r\nAdds\r\n";

      $adds = $this->get_clone()->where('type', self::ADD)->get();
      foreach ($adds as $add) {
         $text .= "* {$add->artist}";
         $text .= $add->album != null ? " [{$add->album}]" : '';
         $text .= $add->label != null ? " ({$add->label})" : '';
         $text .= "\r\n";
      } 

      return $text;
   }
}
