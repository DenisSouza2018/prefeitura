<?php
    require_once 'DB.php';

    abstract class Crud extends DB{

        protected $table;

        abstract public function insert();
       
 

    }
?>
 