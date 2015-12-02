<?php
  class RequestsDB{
    public $first_name = "";
    public $last_name = "";
    public $location_name = "";
    public $user_name = "";

    function __construct($first_name, $last_name, $location_name, $user_name){
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->location_name = $location_name;
      $this->user_name = $user_name;
    }


  }
 ?>
