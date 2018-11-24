<?php
//include 'includes/classes/dbh.php';
include 'login_validate.php';
include 'includes/classes/customer.php';
include 'includes/classes/createdb.php';
include 'includes/classes/brands.php';
include 'includes/classes/categories.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>E-Commerce Lab Activity</title>
  <link rel="stylesheet" href="css/lab2.css">
  <link rel="stylesheet" href="css/insert product.css">
  <script>


  function displayCart(){
   var xmlhttp2;
   xmlhttp2=new XMLHttpRequest();

   xmlhttp2.onreadystatechange=function()
     {
     if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
       {
       document.getElementById("breadcrumbs").innerHTML=xmlhttp2.responseText;
       }
     }
   xmlhttp2.open("GET","update_cart_every_page.php",true);
   xmlhttp2.send();
  }

  function goToCart(){
    window.location = 'cart_page.php';
  }
  </script>
</head>

<body onload="displayCart();">
  <div id="header"></div>
  <div id="menu">
    <ul class="items">
      <li><a href="index.php">Home</a></li>
      <li><a href="insert product.php">Insert Products</a></li>
      <li><a href="productspage.php">Products</a></li>
      <li><a href="account.html">Account</a></li>
      <li><a href="register.php">Sign Up</a></li>
      <li><a href="cart.html">Shopping Cart</a></li>
      <li><a href="#footer">Contact Us</a></li>
      <li>
      </li>
    </ul>
  </div>
  <div id="midsection">
    <div id="leftside">
      <div id="sidebar">
        <h2>Browse Categories</h>
          <br>
          <br>
          <ul class="cat">
            <a href="#">Laptops</a>
            <br>
            <a href="#">Tablets</a>
            <br>
            <a href="#">Phones</a>
            <br>
            <a href="#">TV Sets</a>
          </ul>
          <br>
          <h2>Browse Top Brands</h>
            <br>
            <br>
            <ul class="cat">
              <a href="#">Apple</a>
              <br>
              <a href="#">Samsung</a>
<br>
              <a href="#">LG</a>
<br>
              <a href="#">Xiaomi</a>
            </ul>

      </div>
          </div>
          <div id="rightside">
            <div id="breadcrumbs">
            </div>
            <div id="content">
              <form method="POST" onsubmit="return validateAll(this)" action="login.php" name="register">
                <h1>Login</h1>
                <?=$error?>
                <br>
                <br>
                Email: <input type="email" name="email" value="<?=@$email?>"/><!--<span class="error">* <?php echo $email_error;?></span> -->
                <br>
                <br>
                Password: <input type="password" name="password" value="<?=@$password?>"/><!--<span class="error">* <?php echo $password_error;?></span> -->
                <br>
                <br>
<input type="submit" value="Login" name="submit">
              </form>
              <br>
              <a href="register.php">Don't have an account? Register here</a>
            </div>
</div>
</div>
  <div id="footer">
    <br>
    <h2>Contact Us</h2>
        <br><br>
        <p>Street Address: 1 University Avenue, Berekuso, E/R</p>
        <br>
        <p>Postal Address: PMB CT3, Cantonments, Accra</p>
        <br>
        <p>Phone & Email: (T) 024 850 6381 (E) <a href="mailto:joseph.brown-pobee@ashesi.edu.gh">joseph.brown-pobee@ashesi.edu.gh</a></p>
        <br>
        <p>&copy; YofShop Electronics. Est 2018. All Rights Reserved</p>
        <br>
            </div>
</body>

</html>
