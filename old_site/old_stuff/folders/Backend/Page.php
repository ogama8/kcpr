<?php
require(ROOT . '/3P/Smarty/Smarty.class.php');

/**
 * A simple Page class. It abstracts all the Smarty calls.
 */
class Page {
   protected $smarty;
   // Global templates, stylesheets, and scripts.
   protected $templates = array(
    'header' => array('header.tpl'),
    'main' => array(),
    'sidebar' => array(),
    'footer' => array('footer.tpl')
   );
   protected $stylesheets = array(
    'base.css'
   );
   protected $scripts = array(
    'mootools-core.js' 
   );


   public function __construct() {
      $this->smarty = new Smarty();
      $this->smarty->template_dir = ROOT.'/templates';
      $this->smarty->compile_dir= ROOT.'/3P/Smarty/templates_c';
      $this->smarty->cache_dir = ROOT.'/3P/Smarty/cache';
      $this->smarty->config_dir = ROOT.'/3P/Smarty/configs';

      $this->layout = 'base.tpl'; // Main template that links everything.
   }

   public function display() {
      foreach ($this->templates as $section => $templates) {
         $this->smarty->assign($section, $templates);
      }

      $this->smarty->assign('scripts', $this->scripts);
      $this->smarty->assign('stylesheets', $this->stylesheets);
      $this->smarty->display($this->layout);
   }

   public function addTemplate($template, $section = 'main') {
      $this->templates[$section][] = $template; 
   }
   
   public function addVariable($name, $value) {
      $this->smarty->assign($name, $value);
   }

   public function addScript($name) {
      $this->scripts[] = $name;
   }

   public function addStylesheet($name) {
      $this->stylesheets[] = $name;
   }
}
