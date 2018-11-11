<?php
//include 'includes/classes/dbh.php';
include 'includes/classes/customer.php';
include 'includes/classes/createdb.php';
include 'includes/classes/brands.php';
include 'includes/classes/categories.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>E-Commerce Lab Activity</title>
  <link rel="stylesheet" href="css/lab2.css">
  <link rel="stylesheet" href="css/insert product.css">
  <script>
    function validateAll(form) {
    var title = document.forms['register']['username'].value;
    if (title == "") {
      var response = "Please enter your name";
      alert(response);
      return false;
    }

    var email = document.forms['register']['email'].value;

    if (email == ""){
      alert("Enter an email");
      return false;
    }

    var re = /^(?:[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&amp;'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/;
    if (re.test(email)==false){
      alert("Invalid email address entered");
    return false;
}
if(form.password.value != "" && form.password.value == form.confirm_password.value) {
if(form.password.value.length < 6) {
       alert("Error: Password must contain at least six characters!");
       form.password.focus();
       return false;
     }

     if(form.password.value == title) {
       alert("Error: Password must be different from Username!");
       form.password.focus()
       return false;
     }

     re = /[0-9]/;
     if(!re.test(form.password.value)) {
       alert("Error: password must contain at least one number (0-9)!");
       form.password.focus
       return false;
     }

     re = /[a-z]/;
     if(!re.test(form.password.value)) {
       alert("Error: password must contain at least one lowercase letter (a-z)!");
       form.password.focus();
       return false;
     }

     re = /[A-Z]/;
      if(!re.test(form.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.password.focus();
        return false;
      }
}
else {
  alert("Error: Please check that you've entered and confirmed your password!");
     form.password.focus();
     return false;
}
if(form.country.value==""){
  alert("Please pick a country");
  return false;
}

if(form.city.value==""){
  alert('Enter a city');
  return false;
}

if (form.number.value != ""){
if(form.number.value.length != 10){
  alert("Enter a 10-digit phone number");
  return false;
}
}
else{
  alert("Enter a phone number");
  return false;
}

if (form.image.value ==""){
  alert("Please upload image");
  return false;
}

if(form.address.value == ""){
  alert("Please enter an address");
  return false;
}
  return true;
}

  function displayCart(){
   var xmlhttp2;
   xmlhttp2=new XMLHttpRequest();

   xmlhttp2.onreadystatechange=function()
     {
     if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
       {
       document.getElementById("breadcrumbs").innerHTML=xmlhttp2.responseText;
       }
     }
   xmlhttp2.open("GET","update_cart_every_page.php",true);
   xmlhttp2.send();
  }

  function goToCart(){
    window.location = 'cart_page.php';
  }
  </script>
</head>

<body onload="displayCart();">
  <div id="header"></div>
  <div id="menu">
    <ul class="items">
      <li><a href="index.php">Home</a></li>
      <li><a href="insert product.php">Insert Products</a></li>
      <li><a href="productspage.php">Products</a></li>
      <li><a href="account.html">Account</a></li>
      <li><a href="signup.html">Sign Up</a></li>
      <li><a href="cart.html">Shopping Cart</a></li>
      <li><a href="#footer">Contact Us</a></li>
      <li>
      </li>
    </ul>
  </div>
  <div id="midsection">
    <div id="leftside">
      <div id="sidebar">
        <h2>Browse Categories</h>
          <br>
          <br>
          <ul class="cat">
            <a href="#">Laptops</a>
            <br>
            <a href="#">Tablets</a>
            <br>
            <a href="#">Phones</a>
            <br>
            <a href="#">TV Sets</a>
          </ul>
          <br>
          <h2>Browse Top Brands</h>
            <br>
            <br>
            <ul class="cat">
              <a href="#">Apple</a>
              <br>
              <a href="#">Samsung</a>
<br>
              <a href="#">LG</a>
<br>
              <a href="#">Xiaomi</a>
            </ul>

      </div>
          </div>
          <div id="rightside">
            <div id="breadcrumbs">
            </div>
            <div id="content">
              <?php
              $valid = true;
              $name = $email = $pass = $con_pass = $country = $city = $contact = $image = $address = "";
              $nameErr = $emailErr = $passErr = $con_passErr = $countryErr = $cityErr = $contactErr = $imageErr = $addressErr = "";

              function test_input($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }


              if($_SERVER["REQUEST_METHOD"] == "POST") {
                if(empty($_POST["username"])) {
                  $nameErr = "Name is required";
                  $valid = false;
                }
                else {
                  $name = test_input($_POST["username"]);
                }
                if(empty($_POST["email"])) {
                  $emailErr = "Email is required";
                  $valid = false;
                }
                else {
                  $email = test_input($_POST["email"]);
                }
                if(empty($_POST["password"])) {
                  $passErr = "Password is required";
                  $valid = false;
                }
                else {
                  $pass = test_input($_POST["password"]);
                }
                if(empty($_POST["confirm_password"])) {
                  $con_passErr = "Please confirm password";
                  $valid = false;
                }
                else {
                  $con_pass = test_input($_POST["confirm_password"]);
                }

                if(isset($_POST["country"]) && $_POST['country'] == "0") {
                  $countryErr = 'Please select a country.';
                }
                else {
                  $country = test_input($_POST["country"]);
                }
                if(empty($_POST["city"])) {
                  $cityErr = "City is required";
                }
                else {
                  $city = test_input($_POST["city"]);
                }
                if(empty($_POST["number"])) {
                  $contactErr = "Phone nummber is required";
                }
                else {
                  $contact = test_input($_POST["number"]);
                }
                if(empty($_POST["image"])) {
                  $imageErr = "Image is required";
                }
                else {
                  $image = test_input($_POST["image"]);
                }
                if(empty($_POST["address"])) {
                  $addressErr = "Address is required";
                }
                else {
                  $address = test_input($_POST["address"]);
                }
                 if($valid){
                   $ip = $_SERVER['REMOTE_ADDR'];
                   $customer = new Customer();
                   $customer->createCustomer($ip, $name, $email, $pass, $country, $city, $contact, $image, $address);
              }
            }

               ?>
              <form enctype="multipart/form-data" method="POST" onsubmit="return validateAll(this)" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="register">
                <h1>Register</h1>
                Name: <input type="text" name="username" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
                <br>
                <br>
                Email: <input type="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <br>
                <br>
                Password: <input type="password" name="password" value="<?php echo $pass;?>">
                <span class="error">* <?php echo $passErr;?></span>
                <br>
                <br>
                Confirm Password: <input type="password" name="confirm_password" value="<?php echo $con_pass;?>">
                <span class="error">* <?php echo $con_passErr;?></span>
                <br>
                <br>
                Country: <select name="country" id="country">
    <option value="0">Select Country</option>
  	<option value="AFG">Afghanistan</option>
  	<option value="ALA">Åland Islands</option>
  	<option value="ALB">Albania</option>
  	<option value="DZA">Algeria</option>
  	<option value="ASM">American Samoa</option>
  	<option value="AND">Andorra</option>
  	<option value="AGO">Angola</option>
  	<option value="AIA">Anguilla</option>
  	<option value="ATA">Antarctica</option>
  	<option value="ATG">Antigua and Barbuda</option>
  	<option value="ARG">Argentina</option>
  	<option value="ARM">Armenia</option>
  	<option value="ABW">Aruba</option>
  	<option value="AUS">Australia</option>
  	<option value="AUT">Austria</option>
  	<option value="AZE">Azerbaijan</option>
  	<option value="BHS">Bahamas</option>
  	<option value="BHR">Bahrain</option>
  	<option value="BGD">Bangladesh</option>
  	<option value="BRB">Barbados</option>
  	<option value="BLR">Belarus</option>
  	<option value="BEL">Belgium</option>
  	<option value="BLZ">Belize</option>
  	<option value="BEN">Benin</option>
  	<option value="BMU">Bermuda</option>
  	<option value="BTN">Bhutan</option>
  	<option value="BOL">Bolivia, Plurinational State of</option>
  	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
  	<option value="BIH">Bosnia and Herzegovina</option>
  	<option value="BWA">Botswana</option>
  	<option value="BVT">Bouvet Island</option>
  	<option value="BRA">Brazil</option>
  	<option value="IOT">British Indian Ocean Territory</option>
  	<option value="BRN">Brunei Darussalam</option>
  	<option value="BGR">Bulgaria</option>
  	<option value="BFA">Burkina Faso</option>
  	<option value="BDI">Burundi</option>
  	<option value="KHM">Cambodia</option>
  	<option value="CMR">Cameroon</option>
  	<option value="CAN">Canada</option>
  	<option value="CPV">Cape Verde</option>
  	<option value="CYM">Cayman Islands</option>
  	<option value="CAF">Central African Republic</option>
  	<option value="TCD">Chad</option>
  	<option value="CHL">Chile</option>
  	<option value="CHN">China</option>
  	<option value="CXR">Christmas Island</option>
  	<option value="CCK">Cocos (Keeling) Islands</option>
  	<option value="COL">Colombia</option>
  	<option value="COM">Comoros</option>
  	<option value="COG">Congo</option>
  	<option value="COD">Congo, the Democratic Republic of the</option>
  	<option value="COK">Cook Islands</option>
  	<option value="CRI">Costa Rica</option>
  	<option value="CIV">Côte d'Ivoire</option>
  	<option value="HRV">Croatia</option>
  	<option value="CUB">Cuba</option>
  	<option value="CUW">Curaçao</option>
  	<option value="CYP">Cyprus</option>
  	<option value="CZE">Czech Republic</option>
  	<option value="DNK">Denmark</option>
  	<option value="DJI">Djibouti</option>
  	<option value="DMA">Dominica</option>
  	<option value="DOM">Dominican Republic</option>
  	<option value="ECU">Ecuador</option>
  	<option value="EGY">Egypt</option>
  	<option value="SLV">El Salvador</option>
  	<option value="GNQ">Equatorial Guinea</option>
  	<option value="ERI">Eritrea</option>
  	<option value="EST">Estonia</option>
  	<option value="ETH">Ethiopia</option>
  	<option value="FLK">Falkland Islands (Malvinas)</option>
  	<option value="FRO">Faroe Islands</option>
  	<option value="FJI">Fiji</option>
  	<option value="FIN">Finland</option>
  	<option value="FRA">France</option>
  	<option value="GUF">French Guiana</option>
  	<option value="PYF">French Polynesia</option>
  	<option value="ATF">French Southern Territories</option>
  	<option value="GAB">Gabon</option>
  	<option value="GMB">Gambia</option>
  	<option value="GEO">Georgia</option>
  	<option value="DEU">Germany</option>
  	<option value="GHA">Ghana</option>
  	<option value="GIB">Gibraltar</option>
  	<option value="GRC">Greece</option>
  	<option value="GRL">Greenland</option>
  	<option value="GRD">Grenada</option>
  	<option value="GLP">Guadeloupe</option>
  	<option value="GUM">Guam</option>
  	<option value="GTM">Guatemala</option>
  	<option value="GGY">Guernsey</option>
  	<option value="GIN">Guinea</option>
  	<option value="GNB">Guinea-Bissau</option>
  	<option value="GUY">Guyana</option>
  	<option value="HTI">Haiti</option>
  	<option value="HMD">Heard Island and McDonald Islands</option>
  	<option value="VAT">Holy See (Vatican City State)</option>
  	<option value="HND">Honduras</option>
  	<option value="HKG">Hong Kong</option>
  	<option value="HUN">Hungary</option>
  	<option value="ISL">Iceland</option>
  	<option value="IND">India</option>
  	<option value="IDN">Indonesia</option>
  	<option value="IRN">Iran, Islamic Republic of</option>
  	<option value="IRQ">Iraq</option>
  	<option value="IRL">Ireland</option>
  	<option value="IMN">Isle of Man</option>
  	<option value="ISR">Israel</option>
  	<option value="ITA">Italy</option>
  	<option value="JAM">Jamaica</option>
  	<option value="JPN">Japan</option>
  	<option value="JEY">Jersey</option>
  	<option value="JOR">Jordan</option>
  	<option value="KAZ">Kazakhstan</option>
  	<option value="KEN">Kenya</option>
  	<option value="KIR">Kiribati</option>
  	<option value="PRK">Korea, Democratic People's Republic of</option>
  	<option value="KOR">Korea, Republic of</option>
  	<option value="KWT">Kuwait</option>
  	<option value="KGZ">Kyrgyzstan</option>
  	<option value="LAO">Lao People's Democratic Republic</option>
  	<option value="LVA">Latvia</option>
  	<option value="LBN">Lebanon</option>
  	<option value="LSO">Lesotho</option>
  	<option value="LBR">Liberia</option>
  	<option value="LBY">Libya</option>
  	<option value="LIE">Liechtenstein</option>
  	<option value="LTU">Lithuania</option>
  	<option value="LUX">Luxembourg</option>
  	<option value="MAC">Macao</option>
  	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
  	<option value="MDG">Madagascar</option>
  	<option value="MWI">Malawi</option>
  	<option value="MYS">Malaysia</option>
  	<option value="MDV">Maldives</option>
  	<option value="MLI">Mali</option>
  	<option value="MLT">Malta</option>
  	<option value="MHL">Marshall Islands</option>
  	<option value="MTQ">Martinique</option>
  	<option value="MRT">Mauritania</option>
  	<option value="MUS">Mauritius</option>
  	<option value="MYT">Mayotte</option>
  	<option value="MEX">Mexico</option>
  	<option value="FSM">Micronesia, Federated States of</option>
  	<option value="MDA">Moldova, Republic of</option>
  	<option value="MCO">Monaco</option>
  	<option value="MNG">Mongolia</option>
  	<option value="MNE">Montenegro</option>
  	<option value="MSR">Montserrat</option>
  	<option value="MAR">Morocco</option>
  	<option value="MOZ">Mozambique</option>
  	<option value="MMR">Myanmar</option>
  	<option value="NAM">Namibia</option>
  	<option value="NRU">Nauru</option>
  	<option value="NPL">Nepal</option>
  	<option value="NLD">Netherlands</option>
  	<option value="NCL">New Caledonia</option>
  	<option value="NZL">New Zealand</option>
  	<option value="NIC">Nicaragua</option>
  	<option value="NER">Niger</option>
  	<option value="NGA">Nigeria</option>
  	<option value="NIU">Niue</option>
  	<option value="NFK">Norfolk Island</option>
  	<option value="MNP">Northern Mariana Islands</option>
  	<option value="NOR">Norway</option>
  	<option value="OMN">Oman</option>
  	<option value="PAK">Pakistan</option>
  	<option value="PLW">Palau</option>
  	<option value="PSE">Palestinian Territory, Occupied</option>
  	<option value="PAN">Panama</option>
  	<option value="PNG">Papua New Guinea</option>
  	<option value="PRY">Paraguay</option>
  	<option value="PER">Peru</option>
  	<option value="PHL">Philippines</option>
  	<option value="PCN">Pitcairn</option>
  	<option value="POL">Poland</option>
  	<option value="PRT">Portugal</option>
  	<option value="PRI">Puerto Rico</option>
  	<option value="QAT">Qatar</option>
  	<option value="REU">Réunion</option>
  	<option value="ROU">Romania</option>
  	<option value="RUS">Russian Federation</option>
  	<option value="RWA">Rwanda</option>
  	<option value="BLM">Saint Barthélemy</option>
  	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
  	<option value="KNA">Saint Kitts and Nevis</option>
  	<option value="LCA">Saint Lucia</option>
  	<option value="MAF">Saint Martin (French part)</option>
  	<option value="SPM">Saint Pierre and Miquelon</option>
  	<option value="VCT">Saint Vincent and the Grenadines</option>
  	<option value="WSM">Samoa</option>
  	<option value="SMR">San Marino</option>
  	<option value="STP">Sao Tome and Principe</option>
  	<option value="SAU">Saudi Arabia</option>
  	<option value="SEN">Senegal</option>
  	<option value="SRB">Serbia</option>
  	<option value="SYC">Seychelles</option>
  	<option value="SLE">Sierra Leone</option>
  	<option value="SGP">Singapore</option>
  	<option value="SXM">Sint Maarten (Dutch part)</option>
  	<option value="SVK">Slovakia</option>
  	<option value="SVN">Slovenia</option>
  	<option value="SLB">Solomon Islands</option>
  	<option value="SOM">Somalia</option>
  	<option value="ZAF">South Africa</option>
  	<option value="SGS">South Georgia and the South Sandwich Islands</option>
  	<option value="SSD">South Sudan</option>
  	<option value="ESP">Spain</option>
  	<option value="LKA">Sri Lanka</option>
  	<option value="SDN">Sudan</option>
  	<option value="SUR">Suriname</option>
  	<option value="SJM">Svalbard and Jan Mayen</option>
  	<option value="SWZ">Swaziland</option>
  	<option value="SWE">Sweden</option>
  	<option value="CHE">Switzerland</option>
  	<option value="SYR">Syrian Arab Republic</option>
  	<option value="TWN">Taiwan, Province of China</option>
  	<option value="TJK">Tajikistan</option>
  	<option value="TZA">Tanzania, United Republic of</option>
  	<option value="THA">Thailand</option>
  	<option value="TLS">Timor-Leste</option>
  	<option value="TGO">Togo</option>
  	<option value="TKL">Tokelau</option>
  	<option value="TON">Tonga</option>
  	<option value="TTO">Trinidad and Tobago</option>
  	<option value="TUN">Tunisia</option>
  	<option value="TUR">Turkey</option>
  	<option value="TKM">Turkmenistan</option>
  	<option value="TCA">Turks and Caicos Islands</option>
  	<option value="TUV">Tuvalu</option>
  	<option value="UGA">Uganda</option>
  	<option value="UKR">Ukraine</option>
  	<option value="ARE">United Arab Emirates</option>
  	<option value="GBR">United Kingdom</option>
  	<option value="USA">United States</option>
  	<option value="UMI">United States Minor Outlying Islands</option>
  	<option value="URY">Uruguay</option>
  	<option value="UZB">Uzbekistan</option>
  	<option value="VUT">Vanuatu</option>
  	<option value="VEN">Venezuela, Bolivarian Republic of</option>
  	<option value="VNM">Viet Nam</option>
  	<option value="VGB">Virgin Islands, British</option>
  	<option value="VIR">Virgin Islands, U.S.</option>
  	<option value="WLF">Wallis and Futuna</option>
  	<option value="ESH">Western Sahara</option>
  	<option value="YEM">Yemen</option>
  	<option value="ZMB">Zambia</option>
  	<option value="ZWE">Zimbabwe</option>
                </select>
                <span class="error">* <?php echo $countryErr;?></span>
                <br>
                <br>
                City: <input type="text" name="city" id="city" value="<?php echo $city;?>"><span class="error">* <?php echo $cityErr;?></span>
                <br>
                <br>
                Contact: <input type="number" name="number" id="number" value="<?php echo $contact;?>"><span class="error">* <?php echo $contactErr;?></span>
                <br>
                <br>
Upload Customer Image: <input type="file" id="upload" name="image" value="<?php echo $image;?>"><span class="error">* <?php echo $imageErr;?></span>
<br>
<br>
Address: <input type="text" name="address" value="<?php echo $address;?>"> <span class="error">* <?php echo $addressErr;?></span>
<br>
<br>
<input type="submit" value="Create Account">
              </form>
            </div>
</div>
</div>
  <div id="footer">
    <br>
    <h2>Contact Us</h2>
        <br><br>
        <p>Street Address: 1 University Avenue, Berekuso, E/R</p>
        <br>
        <p>Postal Address: PMB CT3, Cantonments, Accra</p>
        <br>
        <p>Phone & Email: (T) 024 850 6381 (E) <a href="mailto:joseph.brown-pobee@ashesi.edu.gh">joseph.brown-pobee@ashesi.edu.gh</a></p>
        <br>
        <p>&copy; YofShop Electronics. Est 2018. All Rights Reserved</p>
        <br>
            </div>
</body>

</html>
