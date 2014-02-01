<?php

/**
 * If a Page needs authentication, use this!
 * By default, an AuthPage is closed to everyone.
 * Call addAllow to add permission for a user level.
 *
 * To add another user level, add a class constant for the 
 * username of that level, and then add a password to
 * the $passwords array.
 */

class AuthPage extends Page {
   // These constants are the possible usernames.
   const ADMIN = 'admin';
   const MD = 'md';
   const DJ = 'dj';

   // And this array is the hard-coded passwords.
   private static $passwords = array( 
    self::ADMIN => 'wkw2mwb?',
    self::MD => 'B0N3RZ',
    self::DJ => 'test3'
   ); // mmmmm hard coded passwords

   private $allowed = array(); // Who's allowed to use the page.
   private $userIs;

   // Global templates, stylesheets, and scripts.
   protected $templates = array();
   protected $stylesheets = array();
   //protected $scripts = array();

   public function __construct() {
      parent::__construct();
      
   }   
 
   public function addAllowed($allowed) {
      $this->allowed[] = $allowed;
   }

   public function display() {
      if (!$this->authenticate()) { // GTFO
         // Reset templates and scripts.
         $this->templates = array('main' => 'admin/login.tpl');
         $this->scripts = array();
         $this->stylesheets = array();
         if (isset($this->errorMsg))
            $this->addVariable('errorMsg', $this->errorMsg);
      }

      parent::display();
   }

   /**
    * First function that gets called in the authentication process.
    */
   private function authenticate() {
      session_start(); // Retreive session info

      if (isset($_SESSION['loggedIn'])) {
         $this->userIs = $_SESSION['loggedIn'];
      }

      if (isset($_POST['user']) && isset($_POST['pword'])) {
         // loop through the hard coded username/password combinations.
         foreach (self::$passwords as $username => $password) {
            if ($_POST['user'] == $username && $_POST['pword'] == $password) {
               $this->userIs = $username;   
            }
         }

         if ($this->userIs == null)  {
            // Completely wrong user/password
            $this->errorMsg = "That user/password combination doesn't exist.";
            return false;
         }
      } 

      if (!isset($this->userIs)) // They haven't even tried to log in yet.
         return false;

      // Store the user as being logged in.
      $_SESSION['loggedIn'] = $this->userIs;

      // Check if the privilege level is good enough to see the page. 
      if (in_array($this->userIs, $this->allowed)) {
         return true;
      } else  {
         $this->errorMsg = "You're logged in as {$this->userIs}, "
          . "but you don't have permission to use this page.";
         return false;
      }
   }
}
