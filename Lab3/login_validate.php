<?php

$error = '';
session_start();
if (isset($_POST['submit'])) {
$con=mysqli_connect("localhost","root","","shoppn");
//$db = New Customer();
$sql = "SELECT * FROM customer WHERE (customer_email = '" . mysql_real_escape_string($_POST['email']) . "') and (customer_pass = '" . mysql_real_escape_string($_POST['password']) . "')";
$login = mysqli_query($con,$sql);
if (mysqli_num_rows($login) == 1) {
  while($row = mysqli_fetch_array($login))
  {
    $id = $row['customer_id'];
    $email = $row['customer_email'];
    $username = $row['customer_name'];
  }
  $_SESSION['id'] = $id;
  $_SESSION['email'] = $email;
  $_SESSION['username'] = $username;
  if(isset($_SESSION['check'])){
    header('Location: checkout.php');
  }
  else{
  header('Location: index.php');
}
}
else{
  $error .= 'Wrong details entered';
}
}

 ?>
