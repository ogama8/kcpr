<?php

class About extends Controller {
   public function index() {
      $this->template->write('title', 'About Us');
      $this->template->write('section', 'about');
      $this->template->add_css('css/about.css');

      $data = array(
         'active' => 'about'
      );

      $this->template->parse_view('content', 'about.tpl', $data);
      $this->template->render();
   }
}
