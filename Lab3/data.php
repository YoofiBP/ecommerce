<?php
include 'includes/classes/products.php';
//getting data from database

$my_prod = new Product();
$prodlist = $my_prod->getProducts();

echo json_encode($prodlist);
?>
