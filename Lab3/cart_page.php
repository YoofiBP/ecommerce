<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Products</title>
  <link rel="stylesheet" href="css/lab2.css">
  <script src="js/cart.js">
  </script>
  <link rel="stylesheet" href="cart.css">
  <!-- <script src="scripts.js">
  </script> -->
  <script>

  var xmlhttp;
    xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","cart_call.php",true);
  xmlhttp.send();


function fx(search)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (search.length==0) {
    document.getElementById("livesearch").innerHTML="";
    return;
  }
  xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","call_ajax.php?n="+s1,true);
xmlhttp.send();
}

function addCart(search)
{
//var s1=document.getElementById("qu").value;
var xmlhttp;
if (search.length==0) {
    document.getElementById("livesearch").innerHTML="";
    return;
  }
  xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("breadcrumbs").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","addtocart.php?n="+search,true);
xmlhttp.send();
}

function inc(id){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","cart_inc.php?n="+id,true);
  xmlhttp.send();
}

function sub(id){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","cart_sub.php?n="+id,true);
  xmlhttp.send();
}

function remove(id){
  var xmlhttp;
    xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
      document.getElementById("content").innerHTML=xmlhttp.responseText;
      }
    }
  xmlhttp.open("GET","cart_rmv.php?n="+id,true);
  xmlhttp.send();
}

  function redirect(){
    window.location = 'index.php';
  }

  function redirect_to_pay(){
    window.location = 'checkout.php';
  }

  </script>

</head>

<body>
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
        <form method="post">
        <input type="text" onKeyUp="fx(this.value)" name="qu" id="qu" class="textbox" placeholder="Search here">
        </form>
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
        <h1>Your cart</h1>
        <div class="row" id="tab"></div>
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
