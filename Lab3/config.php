<?php

class dbh2
{
private $db_host;
private $db_user;
private $db_pwd;
private $database;


public function __construct()
{
  $this->db_host='localhost';
  $this->db_user='root';
  $this->db_pwd='';
  $this->database='Yofshop';

  if(!mysql_connect($this->db_host,$this->db_user,$this->db_pwd))
  die("can't Connect to Database");

  if(!mysql_select_db($this->database))
  die("can't Select Database");
}


// public function connect()
// {
//
// }

}
?>
