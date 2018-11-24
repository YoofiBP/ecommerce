<?php

include 'dbh.php';

class Customer extends dbh {
  public $customer_ip;
  public $customer_name;
  public $customer_email;
  public $customer_pass;
  public $customer_country;
  public $customer_city;
  public $customer_contact;
  public $customer_image;
  public $customer_address;

public function createCustomer($customer_ip, $customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $customer_address){
  $sql = "INSERT INTO customer (customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_image, customer_address)
  VALUES ('$customer_ip', '$customer_name', '$customer_email', '$customer_pass', '$customer_country', '$customer_city', '$customer_contact', '$customer_image', '$customer_address')";
  mysqli_query($this->connect(),$sql);
}
}
