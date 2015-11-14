<?php
  class RequestsDB{
    public $first_name = "";
    public $last_name = "";
    public $complex_name = "";
    public $user_name = "";

    function __construct($first_name, $last_name, $complex_name, $user_name){
      $this->first_name = $first_name;
      $this->last_name = $last_name;
      $this->complex_name = $complex_name;
      $this->user_name = $user_name;
    }


  }
 ?>
