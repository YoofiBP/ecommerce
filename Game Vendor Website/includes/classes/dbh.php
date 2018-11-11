<?php

class dbh
{
  // private $servername;
  private $username;
  private $password;
  private $dbname;
  
  public function connect()
  {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "shoppn";
  
    $conn = new mysqli($this->servername, $this->username,$this->password,$this->dbname);
    return $conn;
  }
  
  public function getDbName(){
    return $this->dbname;
  }

  // private $db_host;
  // private $db_user;
  // private $db_pwd;
  // private $database;


  // public function __construct()
  // {
  //   $this->db_host='localhost';
  //   $this->db_user='root';
  //   $this->db_pwd='';
  //   $this->database='shoppn';

  //   $con = mysqli_connect($this->db_host,$this->db_user,$this->db_pwd,$this->database);
  //   if (!$con)
  //   {
  //     die("connection object not created: ".mysqli_error($con));
  //   }
  //   if(mysqli_connect_errno())
  //   {
  //     die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  //   }
    
  // }

}
 ?>
