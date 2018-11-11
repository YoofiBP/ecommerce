<?php
include 'includes/classes/dbh.php';
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
    function validateAll() {
    var title = document.forms['prodsearch']['title'].value;
    if (title == "") {
      var response = "Name must be filled out"
      alert(response);
      return false;
    }

    var price = document.forms['prodsearch']['price'].value;
    if (price == "") {
     alert("Please choose a price");
      return false;
    }

    var descr = document.forms['prodsearch']['descr'].value;
    if (descr == "") {
      alert("Please provide a Description");
       return false;
    }

    if(document.getElementById('cat').selectedIndex == "0"){
      alert("Please provide a category");
      return false;
    }

    if(document.getElementById('brand').selectedIndex == "0"){
      alert("Please provide a brand");
      return false;
    }

    if(document.getElementById('upload').value == ""){
      alert("Please upload product images");
      return false;
    }
    return true;
  }

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
      <li><a href="signup.html">Sign Up</a></li>
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
              <form enctype="multipart/form-data" method="POST" onsubmit="return validateAll()" action="productadded.php" name="prodsearch">
                <h1>Insert Product</h1>
                Product title: <input type="text" name="title"></input>
                <br>
                <br>
                Category: <select name="cat" id="cat">
                  <option value="0">Choose Category</option>
                  <?php
                  $yofcat = new Category();
                  $yofcat->dropDownCats();
                   ?>
                </select>
                <br>
                <br>
                Brand: <select name="brand" id="brand">
                  <option value="0">Choose Category</option>
                  <?php
                  $yofbrand = new Brand();
                  $yofbrand->dropDownBrands();
                   ?>
                </select>
<br>
<br>
Price: <input type="number" name="price">
<br>
<br>
Description: <input type="textarea" name="descr">
<br>
<br>
Upload Product Images: <input type="file" id="upload" name="image">
<br>
<br>
Key words: <input type="textarea" name="keywords">
<br>
<br>
<input type="submit" value="Add Product">
              </form>
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
