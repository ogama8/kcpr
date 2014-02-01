<?php

class Home extends Controller {
   public function index() {
      $this->template->parse_view('content', 'homepage.tpl');

      $charts = new Simple_chart();
      $date = $charts->mostRecent(time());
      $topten = $charts->getTop(10)->get();

      $data = array(
         'date' => $date,
         'topten' => $topten
      );

      $this->template->parse_view('sidebar', 'sidebar/topten.tpl', $data);
      $this->template->parse_view('sidebar', 'sidebar/followus.tpl');
      //$this->template->parse_view('sidebar', 'sidebar/listennow.tpl');

      $this->template->add_css('css/sidebars.css');

      $this->template->render();
   }
}
