<?php

class TupleObject {
   protected static $tableName; // Child classes must specify this.

   private $fresh; // Not from DB, needs to be inserted.
   private $data; // The actual data of the tuple in the DB.
   private $primary; // Column name of the primary key.

   public function __construct($id = null) {
      

   }
}
