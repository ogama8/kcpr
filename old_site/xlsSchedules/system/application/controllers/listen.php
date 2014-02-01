<?php

class Listen extends Controller {
   public function index() {
      $this->template->write('title', 'Online Stream');
      $this->template->write('section', 'listen');
      $this->template->add_css('css/listen.css');

      $data = array(
         'active' => 'listen'
      );

      $this->template->parse_view('content', 'listen.tpl', $data);
      $this->template->write_view('sidebar', 'sidebar/requests.tpl');
      $this->template->render();
   }
}
