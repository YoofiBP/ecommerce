<?php
include 'config.php';
include 'includes/classes/cart.php';

$sql =  "SELECT products.product_id, products.product_image, products.product_title, cart.qty, products.product_price FROM products, cart WHERE products.product_id = cart.p_id";
$cart = new Cart;
$cart_items = $cart->getCart($sql);
$total_price = 0;

echo "<table>
<th>Product Image</th>
    <th>Product Name</th>
    <th>Product Quantity</th>
    <th>Unit Price</th>
    <th>Total (GHS)</th>
<th>Change cart content</th>
<th></th>
    ";
while ($row = mysqli_fetch_array($cart_items)){
  $tot = $row['product_price']*$row['qty'];
  echo "<tr>
  <td><img src=".$row['product_image']." style='width:50px;height:50px;'>
    <td>".$row['product_title']."</td>
    <td>".$row['qty']."</td>
    <td>".$row['product_price']."</td>
    <td>".$tot."</td>
    <td><button onclick='sub(this.name);' name=".$row['product_id'].">-</button>&nbsp&nbsp<button onclick='inc(this.name);' name=".$row['product_id'].">+</button>
    <td><button onclick='remove(this.name)'; name=".$row['product_id'].">Remove from cart</button>
  </tr>";
  $total_price = $total_price+$tot;
}
echo "</table>";
echo "<br>";
echo "<h2 style='float:right;'>Total price is GHS ".$total_price."</h2>";
echo "<br>";
echo "<br>";
echo "<button id='continue' onclick='redirect_to_pay();' style='float:right;'>Checkout</button>";
echo "<button id='continue' onclick='redirect();' style='float:right;'>Continue Shopping</button>";
 ?>
