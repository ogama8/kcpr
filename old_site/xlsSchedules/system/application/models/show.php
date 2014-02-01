<?php

class Show extends DataMapper {
   public static $showTypes = array(
      'regular',
      'special',
      'rebroadcasted'
   );

   public function __construct($id = null) {
      parent::__construct($id);

      $this->has_many('spot');
   }

   public function typeName($capitalize = false) {
      $name = self::$showTypes[$this->type];

      if ($capitalize)
         $name = ucwords($name);

      return $name;
   }
}
