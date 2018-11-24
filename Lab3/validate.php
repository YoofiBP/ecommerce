<?php
$error = ""; // Initialize error as blank

$user_error = '';
$email_error = '';
$password_error = '';
$confirm_password_error = '';
$phone_error = '';
$address_error = '';
$country_error = '';
$city_error = '';
$image_error = '';
$i_error = '';
if (isset($_POST['submit'])) { // check if the form is submitted
	#### removing extra white spaces & escaping harmful characters ####
	$username 			= trim($_POST['username']);
  $email 				= $_POST['email'];
  $password 			= $_POST['password'];
  $confirm_password 	= $_POST['confirm_password'];
  $country		= $_POST['country'];
	$phone				= $_POST['number'];
  $city 		= trim($_POST['city']);
  $address 		= trim($_POST['address']);
  $uploaddir = 'img/';
  $image = $uploaddir . basename($_FILES['file']['name']);
	#### start validating input data ####
	#####################################

	# Validate Username #
		// if its not alpha numeric, throw error
		if (!ctype_alnum($username)) {
			$user_error= 'Username should be alpha numeric characters only.';
      $error .= '<p class="error">Username should be alpha numeric characters only.</p>';
		}
		// if username is not 3-20 characters long, throw error
		if (strlen($username) < 3 OR strlen($username) > 20) {
			$user_error= 'Username should be within 3-20 characters long.';
      $error .= '<p class="error">Username should be within 3-20 characters long.</p>';
		}

	# Validate Password #
		// if first_name is not 3-20 characters long, throw error
		if (strlen($password) < 3 OR strlen($password) > 20) {
      $password_error = 'Password should be within 3-20 characters long.';
      $error .= '<p class="error">Password should be within 3-20 characters long.</p>';
		}

	# Validate Confirm Password #
		// if first_name is not 3-20 characters long, throw error
		if ($confirm_password != $password) {
      $confirm_password_error = 'Confirm password mismatch';
      $error .= '<p class="error">Confirm password mismatch.</p>';
		}

	# Validate Email #
		// if email is invalid, throw error
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // you can also use regex to do same
      $email_error = 'Enter a valid email address.';
      $error .= '<p class="error">Enter a valid email address.</p>';
		}
    $select_emails = "SELECT * FROM customer WHERE customer_email LIKE '%".$email."%'";
    $con=mysqli_connect("localhost","root","","shoppn");
    if ($result=mysqli_query($con,$select_emails)){
      $rowcount = mysqli_num_rows($result);
    }
    if($rowcount >0){
      $email_error = 'Email already exists';
      $error .='<p class="error">Email already exists.</p>';
    }
	# Validate Phone #
		// if phone is invalid, throw error
		if (!ctype_digit($phone) OR strlen($phone) != 10) {
      $phone_error = 'Enter a valid phone number.';
      $error .= '<p class="error">Enter a valid phone number.</p>';
		}

    // if city is empty, throw error
		if (strlen($city) < 1) {
      $city_error = 'Enter a city';
      $error .= '<p class="error">Enter city.</p>';
		}

    # Validate Country Group #
		// if country is not selected, throw error
		if ($country == "0") {
      $country_error = 'Please select a country';
			$error .= '<p class="error">Please select a country.</p>';
		}

	# Validate Address #
		if (strlen($address)==0) {
      $address_error = 'Please enter a valid address';
			$error .= '<p class="error">Please enter a valid address.</p>';
		}

    if (isset($_FILES["file"])) {
	$allowedExts = array("jpg", "jpeg", "png");
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

	if ($_FILES["file"]["error"] > 0) {
		$i_error .= "Error opening the file<br />";
	}
	if (!in_array($extension, $allowedExts)) {
		$i_error .= "Extension not allowed<br />";
	}
	if ($_FILES["file"]["size"] > 204800) {
		$i_error .= "File size_ shoud be less than 200 kB<br />";
	}

	if ($error == "") {
	//	echo "uploaded successfully";
	} else {
		$image_error = $i_error;
	}
}

    if(empty($error)){
      $ip = $_SERVER['REMOTE_ADDR'];
$customer = New Customer();
$customer->createCustomer($ip,$username,$email,$password,$country,$city,$phone,$image,$address);
header('Location: index.php');


}
}
