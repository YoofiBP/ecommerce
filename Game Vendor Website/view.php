<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>E-Commerce Lab Activity</title>
  <link rel="stylesheet" href="css/lab2.css">
  <link rel="stylesheet" href="css/single product.css">
  <!-- <script src="scripts.js">
  </script> -->
  <script>
  function goBack() {
    location.href = "index.php";
  }

  function openSub(evt, Name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  document.getElementById(Name).style.display = "block";
  evt.currentTarget.className += " active";
}

function openImg(imgs) {
  var expandImg = document.getElementById("expandedImg");
  expandImg.src = imgs.src;
}

var link = window.location.search;
var xmlhttp;
  xmlhttp=new XMLHttpRequest();

xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","view_call.php"+link,true);
xmlhttp.send();

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

// document.getElementById("cartButton").onclick = goBack(){
//   location.href = "www.google.com";
// };
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
        <form method="post">
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
