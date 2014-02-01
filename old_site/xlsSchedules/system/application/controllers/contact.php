<?php

class Contact extends Controller {
   public function index() {
      $this->template->write('title', 'Contact Us');
      $this->template->write('section', 'contact');
      $this->template->add_css('css/contact.css');

      $data = array(
         'active' => 'contact'
      );

      $this->template->parse_view('content', 'contact.tpl', $data);
      $this->template->write_view('sidebar', 'sidebar/mailingaddress.tpl');
      $this->template->write_view('sidebar', 'sidebar/telephone.tpl');

      $this->template->render();
   }
}
