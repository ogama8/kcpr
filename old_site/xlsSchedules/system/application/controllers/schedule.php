<?php

class Schedule extends Controller {

   public function __construct() {
      parent::__construct();

      $this->load->library('ShowsLib');
   }

   public function index() {
      $this->template->write('title', 'Schedule');
      $this->template->write('section', 'schedule');
      $this->template->add_css('css/schedule.css');

      $times = $this->showslib->getBlocks();

      $data = array(
         'active' => 'schedule',
         'name' => 'Fall \'11',
         'schedule' => $times 
      );

      $this->template->parse_view('sidebar', 'sidebar/showsidebar.tpl', $data);
      $this->template->parse_view('content', 'schedule.tpl', $data);
      $this->template->render();
   }
}
