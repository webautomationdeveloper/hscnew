<?php

class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "hscdb";
    public $conn;
  
    public function __construct(){
      $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
  }

?>