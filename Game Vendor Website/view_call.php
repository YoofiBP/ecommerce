<?php

include 'config.php';
include 'includes/classes/products.php';
$sing=$_REQUEST['product_id'];
$single = new Product;
$sql = "SELECT * FROM products WHERE product_id=".$sing;
$sing_arr = $single->getProductByQuery($sql);
$sing_str = "";
while($row=mysqli_fetch_array($sing_arr))
{
	$sing_str=$sing_str."
  <table class='tg'>
    <tr>
      <th class='tg-0lax' colspan='4' rowspan='2'>
        <img id='expandedImg' style='width:400px;height:400px;'/>
        <th class='tg-0lax'>
        <h3>".$row['product_title']."</h3>
        <br>
        <p>Ghc: ".$row['product_price']."</p>
        <br>
        <form action=''>
        <button type='button' onclick='addCart(this.name); goBack();' name=".$row['product_id'].">Add to Cart</button>
        </form>
        <br>
        <p>Category: <a href='#'>".$row['product_keywords']."</p>
      </th>
    </tr>
    <tr>
      <td class='tg-0lax' rowspan='2'>

    <div id='Description'>
    <h2>Description</h2>
      <p>".$row['product_desc']."</p>
    </div>
    <br>
    <div id='Reviews'>
    <h2>Reviews</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam venenatis arcu vel enim ultricies finibus. Sed felis ante, condimentum vitae sem id, tempus sagittis metus. Vestibulum eget nunc enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum blandit purus in tincidunt bibendum. Nullam nisi ex, accumsan ut dolor id, gravida dictum quam. Vivamus luctus sapien ac nibh dignissim, pharetra consequat odio dignissim. Ut sit amet erat sit amet massa convallis</p>
    </div>
		<br>
		<button onclick='goBack()'>Return to previous page</button>

  <br>
      </td>
    </tr>
    <tr>
      <td class='tg-0laxs'><img class='su' src='".$row['product_image']."' onclick='openImg(this);'/></td>
      <td class='tg-0laxs'><img class='su' src='".$row['product_image']."' onclick='openImg(this);'/></td>
      <td class='tg-0laxs'><img class='su' src='".$row['product_image']."' onclick='openImg(this);'/></td>
      <td class='tg-0laxs'><img class='su' src='".$row['product_image']."' onclick='openImg(this);'/></td>    </tr>
  </table>
    </div>";
}
echo $sing_str;
?>
