<?php
// include 'classes/dbh.php';
include 'includes/classes/createdb.php';
include 'includes/classes/products.php';
include 'includes/classes/brands.php';

if(isset($_POST['id'])){
  $id = $_POST['id'];
}

if(isset($_POST['cat'])){
  $cat = $_POST['cat'];
}

if(isset($_POST['brand'])){
  $brand = $_POST['brand'];
}

if(isset($_POST['title'])){
  $title = $_POST['title'];
}

if(isset($_POST['price'])){
  $price = $_POST['price'];
}

if(isset($_POST['descr'])){
  $descr = $_POST['descr'];
}

if(isset($_POST['image'])){
  $image = $_POST['image'];
}

if(isset($_POST['keywords'])){
  $keywords = $_POST['keywords'];
}

$uploaddir = 'img/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
  echo "File successfully uploaded.\n";
} else {
   echo "Upload failed";
}

 $prod = new Product();
 $prod->insertProduct($cat,$brand,$title,$price,$descr,$uploadfile,$keywords);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Product Added</title>
</head>
<body>
  <a href="index.php"><p>Go back to home</p></a>
  </body>

</html>