<?php include 'navbar/navvc.php'; ?>
<?php include 'core/connection.php'; ?>
<!DOCTYPE html>
<title>Cart</title>
<head>
<link href="css/bootstrap.css" rel="stylesheet"> 
 <link href="css/jumbotron.css" rel="stylesheet"> 
</head>
 <body style="padding:0px; margin:0px; background-image: -webkit-linear-gradient(top, #D9E2F7, #D9E2F7);
   background-image: -moz-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -ms-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: -o-linear-gradient(top, #D9E2F7, #D9E2F7);
  background-image: linear-gradient(to bottom, #D9E2F7, #D9E2F7);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#ffd65e, endColorstr=#febf04);">

<div style="clear:both"></div>


	<div class="jumbotron">
            <div class="container">
                  <h1 class="itro-text">Your Shopping Cart
                  </h1>
            </div> 
	</div>
	<div class="table-responsive" style="border: 2px solid #333; margin: 1px 19px 3px 19px; box-shadow 0 1px 2px rgba(0,0,0,0.05); padding:10px"; align="center">
	<table class="table table-bordered" align="center">
	<tr style="border: 2px solid #333;">
	<th width"40%" style="border: 2px solid #333;"><h2 class="itro-text text-center">Product Name</h2></th>
	<th width"10%" style="border: 2px solid #333;"><h2 class="itro-text text-center">Quantity</th>
	<th width"20%" style="border: 2px solid #333;"><h2 class="itro-text text-center">Price Details</th>
	<th width"15%" style="border: 2px solid #333;"><h2 class="itro-text text-center">Order Total</th>
	<th width"5%" style="border: 2px solid #333;"><h2 class="itro-text text-center">Action</th>
	</tr>
	
	<?php
	if(!empty($_SESSION["cart"]))
	{
		$total = 0;
		foreach($_SESSION["cart"]as $keys => $values)
		{
			?>
			<tr style="border: 2px solid #333;">
			<td style="border: 2px solid #333;"><h3 class="itro-text text-center"><?php echo $values["item_name"]; ?></h3></td>
			<td style="border: 2px solid #333;"><h3 class="itro-text text-center"><?php echo $values["item_quantity"] ?></h3></td>
			<td style="border: 2px solid #333;"><h3 class="itro-text text-center">$ <?php echo $values["product_price"]; ?></h3></td>
			<td style="border: 2px solid #333;"><h3 class="itro-text text-center">$ <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></h3></td>
		    <td style="border: 2px solid #333;"><h3 class="itro-text text-center"><a href="products.php?action=delete&id=<?php echo $values["product_id"]; ?>" onclick="return confirm('Are you sure want to Delete this Product?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>&nbsp;</h3></td>
			</tr>
			<?php
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
		<tr style="border: 2px solid #333;">
		<td colspan="3" align="right"><h3 class="itro-text text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Amount</h3></td>
		<td align="right" style="border: 2px solid #333;"><h3 class="itro-text text-center">$ <?php echo number_format($total,2); ?></h3></td>
		<td></td>
		</tr>
		<?php
	}
	?>
</table>
<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $find_user = mysql_query("select * from customer where username = '$_SESSION[username]'")or die(mysql_error());
    $user = mysql_fetch_array($find_user);
  ?>
  <form method="POST">
	<input type="hidden" id="user" name="user" value="<?php echo $user[1]; ?>">	
	<input type="hidden" id="hidden_name" name="hidden_name" value="<?php echo $values["item_name"]; ?>">
	<input type="hidden" id="quantity" name="quantity" value="<?php echo $values["item_quantity"] ?>">	
	<input type="hidden" id="hidden_price" name="hidden_price" value="<?php echo $values["product_price"]; ?>">	
<div class="pull pull-right">	
<button href="checkout.php" type="submit" class="btn btn-warning" id="order" data-loading-text="Loading..." name="order">Checkout</button>
</div>
</form>
</div>
  <?php } ?>
<?php
require_once "core/connection.php";
if(isset($_POST['order'])){
  $name = $_POST['hidden_name'];
  $price = $_POST['hidden_price'];
  $quan = $_POST['quantity'];
  $total = $_POST['quantity']*$_POST['hidden_price'];
  $cn = $_POST['user'];
  

  $ord = mysql_query("INSERT INTO orders (item_name, cus_name, item_quantity, product_price, order_total, act) VALUES ('$name', '$cn', '$price', '$quan', '$total', 'Pending')");
  echo "<script type='text/javascript'>location.href = 'http://localhost:90/cps/checkout.php';</script>";
  
  
  
  
}
?>
<?php include 'footer.php'; ?>
</body>
</html>
	