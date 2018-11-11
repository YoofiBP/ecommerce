<?php

include 'config.php';
include 'includes/classes/cart.php';

$sing= $_REQUEST['n'];
$cart = new Cart;
$ip = $_SERVER['REMOTE_ADDR'];
$add_to_cart = $cart->addToCart($sing,$ip,1);
$quantity = 0;
$check_price = "SELECT SUM(product_price) FROM (SELECT product_price FROM products RIGHT JOIN cart ON products.product_id = cart.p_id) as Added";
$joined_price = $cart->getCart($check_price);
while ($pricing = mysqli_fetch_array($joined_price)) {
  $quantity =  $pricing['SUM(product_price)'];
}
$pricing = $cart->getCart($check_price);//mysqli_query($this->connect(), $check_price);
$sql = "SELECT COUNT(p_id) FROM cart";
$arr = $cart->getCart($sql);
$sql2 =  "SELECT products.product_id, products.product_image, products.product_title, cart.qty, products.product_price FROM products, cart WHERE products.product_id = cart.p_id";
$cart_items = $cart->getCart($sql2);
$total_price = 0;

$str = "";

while ($row = mysqli_fetch_array($cart_items)){
    $tot = $row['product_price']*$row['qty'];
    $total_price = $total_price+$tot;
  }

while($row=mysqli_fetch_array($arr))
{
  $str=$str."<h1 style='display:inline'>Welcome!</h1>
  <p>Shopping cart - Total items:".$row['COUNT(p_id)']." Total Price: GHS ".$total_price."</p>
  <button onclick='goToCart();')'>Go To Cart</button>";
}
// echo sizeof($arr);
// echo "<br>";
// echo $ip;
echo $str;
 ?>
