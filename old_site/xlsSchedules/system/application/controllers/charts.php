<?php

class Charts extends Controller {
   // Archives links are layed out in tables based on these numbers.
   static private $MIN_HEIGHT = 4;
   static private $WIDTH = 5;

   public function __construct() {
      parent::__construct();
      $this->load->library('ChartsLib');
   }

   public function index($date = null) {
      $this->template->write('title', 'Charts & Adds');
      $this->template->write('section', 'charts');

      $this->template->add_css('css/charts.css');
      $this->template->add_css('css/tablist.css');

      $simpleChart = new Simple_chart();

      if ($date == null) {
         $date = $simpleChart->mostRecent(time());
      } else {
         $this->template->write('title', ' - ' . date('m/d/y', $date));
      }

      list($charts, $adds) = $simpleChart->getChartsAndAdds($date);

      $data = array(
         'active' => 'charts',
         'chartsTab' => 'charts',
         'fullWidth' => true,
         'charts' => $charts,
         'adds' => $adds,
         'date' => $date
      );

      $this->template->parse_view('content', 'charts.tpl', $data);

      $this->template->render();
   }

   public function archives($date = null) {
      // HACK to reroute "/archives/date" urls.
      if ($date != null) { 
         $unixtime = strtotime($date);
         $this->index($unixtime);
         return;
      }

      $this->template->write('title', 'Charts & Adds Archives');
      $this->template->write('section', 'charts');

      $this->template->add_css('css/charts.css');
      $this->template->add_css('css/tablist.css');

      $dates = $this->chartslib->getArchives();
      
      // We want to sort by year asceding and then date descending.
      // The dates are already sorted by date descending though.
      $datesByYear = array();
      foreach ($dates as $date) {
         $year = $date['year'];
         $month = $date['month'];

         if (!isset($datesByYear[$year])) {
            $datesByYear[$year] = array();
            if (!isset($datesByYear[$year][$month])) {
               $datesByYear[$year][$month] = array();
            }
         }

         $datesByYear[$year][$month][] = $date;
      }
      ksort($datesByYear);

      $height = max(self::$MIN_HEIGHT, ceil(count($dates) / self::$WIDTH));

      $data = array(
         'chartsTab' => 'archives',
         'fullWidth' => true,
         'height' => null,
         'date' => 0,
         'dates' => $datesByYear
      );

      $this->template->parse_view('content', 'archives.tpl', $data);

      $this->template->render();
   }
}
