<?php

/**
 * A simple Database class to abstract the PDO/SQLite3 code.
 */

define(T_I, PDO::PARAM_INT);
define(T_S, PDO::PARAM_STR);

class Database {
   const DB_PATH = 'data/kcpr.db';
   static private $singleton;
   private $pdo;

   
   public function __construct() {
      $this->pdo = new PDO('sqlite:'.ROOT.self::DB_PATH);
      if (defined('DEBUG'))
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
   }

   /**
    * Don't try to call this function. Use execute, getVal, getCol, or getAll.
    */
   private function accessDB($query, $paramVars) {
      if ($paramVars != null) {

         $statement = $this->pdo->prepare($query);

         $num = 1;
         while (!empty($paramVars)) {
            $type = array_shift($paramVars);
            $var = array_shift($paramVars);
            
            if ($type == null)
               throw new Exception ('Not enough bind params');

            $ret = $statement->bindValue($num++, $var, $type);
            if (!$ret) 
               throw new Exception ("Couldn't bind variable $var as $type");
         }

         $statement->execute();
         return $statement;

      } else {
         $result = $this->pdo->query($query);
      }

      return $result;
   }

   /**
    * Execute a query and returns the id of the last inserted row.
    * Main reason to use this is when inserting a single row,  
    * or doing a delete. 
    */
   public function execute($query, $paramVars = null) {
      $this->accessDB($query, $paramVars);
      return $this->pdo->lastInsertID();
   }

   public function getAll($query, $paramVars = null) {
      $result = $this->accessDB($query, $paramVars);
      return $result->fetchAll();
   }

   public function getCol($query, $paramVars = null) {
      $result = $this->accessDB($query, $paramVars);
      return $result->fetchColumn();
   }

   /**
    * Return just the first column in the first row.
    * (by wittling the result array down).
    */
   public function getVal($query, $paramVars = null) {
      $result = $this->accessDB($query, $paramVars);
      $result = $result->fetchColumn();
      if (is_array($result))
         $result = $result[0];

      return $result;
   }

   /**
    * Look up Singleton design on Wikipedia for what this accomplishes.
    */
   public static function db() {
      if (empty(self::$singleton)) {
         $class = __CLASS__;
         self::$singleton = new $class; 
      }

      return self::$singleton;
   }
}
