<?
include 'includes/classes/products.php';
$prod = new Product();
$mystr = 'product_image, product_title, product_price';
$arr = $prod->displayProduct($mystr);
$marr = mysqli_fetch_array($arr);
while($row = mysqli_fetch_array($arr)){
  echo $row['product_image']." ".$row['product_title']." ".$row['product_price']."<br>";
}

?>
