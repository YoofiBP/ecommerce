<?php
include 'includes/classes/products.php';
include 'config.php';

$dbh = new dbh;
$prodlist = new Product;
$sql = "SELECT * FROM products";
$my_arr = $prodlist->getProductByQuery($sql);
// $my_arr = array_slice($my_arr,0,8);
$str = "";
while($row = mysqli_fetch_array($my_arr))
{
  $str=$str."
    <div class='block'>
    <a href='view.php?product_id=".$row['product_id']."'><img src='".$row['product_image']."'/></a>
      <a href='view.php?product_id=".$row['product_id']."'><p>".$row['product_title']."</p></a>
      <a href='view.php?product_id=".$row['product_id']."' onclick='fx(".$row['product_id'].")'><p>Ghc: ".$row['product_price']."</p></a>
      <button type='button' onclick=location.href='view.php?product_id=".$row['product_id']."'>View Product</button>
      <button type='button' onclick='addCart(this.name);' name=".$row['product_id'].">Add to Cart</button>
    </div>";
}
echo $str;

?>
