<?php

$serverURL = 'https://quickdataautomation.com/test-env/hsc/';
$localHostUrl = 'http://localhost/hscnew/';
$URL = "index.php?&user=";
$admin_url = "http://localhost/hscnew/admin/";

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