<?php
include 'config.php';
include 'includes/classes/products.php';
$s1=$_REQUEST["n"];
$db = new Product;
//$key = "SELECT * FROM products WHERE product_keywords=".$s1;
$key = $sql = "SELECT * FROM products WHERE product_keywords like '%".$s1."%'";
$arr = $db->getProductByQuery($key);
$s="";
while($row=mysqli_fetch_array($arr))
{
	$s=$s."
    <div class='block'>
    <a href='view.php?product_id=".$row['product_id']."'><img src='".$row['product_image']."'/></a>
      <a href='view.php?product_id=".$row['product_id']."'><p>".$row['product_title']."</p></a>
      <a href='view.php?product_id=".$row['product_id']."' onclick='fx(".$row['product_id'].")'><p>Ghc: ".$row['product_price']."</p></a>
      <button type='button' onclick='window.open('single product view.html')'>View Product</button>
      <button type='button' onclick='doAll(this)' name=".$row['product_id'].">Add to Cart</button>
    </div>";
}
echo $s;
?>
