<?php

class Brand extends dbh {
  private $brand_name;

public function createBrandTable(){
  $this->sql = "CREATE TABLE IF NOT EXISTS 'brands' (
  'brand_id' int(100) NOT NULL,
  'brand_name' text NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
}

public function insertBrand($brand_name){
  $sql = "INSERT INTO brands (brand_name) VALUES ('$brand_name')";
  mysqli_query($this->connect(),$sql);
}

public function dropDownBrands(){
  $sql = "SELECT brand_id, brand_name FROM brands";
  $qwe = mysqli_query($this->connect(),$sql);
  while ($row = mysqli_fetch_array($qwe)){
    echo "<option value=".$row['brand_id']." name=".$row['brand_name'].">".$row['brand_name']."</option>";
  }
}
}

 ?>
