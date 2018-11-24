<?php
session_start();

if(isset($_SESSION['id'])){
  header('Location: payment.php');
}
else{
  $_SESSION['check'] = True;
  header('Location: login.php');
}
 ?>
