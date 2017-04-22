<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body align="center">

<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysql_query("select * from product where product_id=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form class='form' method='get'>";
echo "<h2>Update Product</h2>";
echo "<hr/>";
echo "<input class='input' type='hidden' name='did' value='{$row1['product_id']}' />";
echo "<br />";
echo "<img src='{$row1['product_image']}' class='img-rounded' width='300' height='270' /><br />";
echo "<br />";
echo "<br />";
echo "<label>" . "Product Name:" . "</label>" . "<br /><br />";
echo"<input class='input' type='text' name='dname' value='{$row1['product_name']}' /><br />";
echo "<br />";
echo "<label>" . "Product Price:" . "</label>" . "<br /><br />";
echo"<input class='input' type='text' name='dprice' value='{$row1['product_price']}' /><br />";
echo "<br />";
echo "<label>" . "Category:" . "</label>" . "<br /><br />";
echo "<select class='input' type='text' name='dcat'><br />;
	<option value='Diagnostic and Test'> Diagnostic and Test </option>
  <option value='Car Parts and Accessories'> Car Parts and Accessories </option>
  <option value='Tools'> Tools </option>
  <option value='Light and Bulbs'> Light and Bulbs </option>
  </select>";
echo "<br />";
echo "<br />";
echo "<label>" . "Description:" . "</label>" . "<br /><br />";
echo "<textarea rows='10' cols='30' name='ddes'>{$row1['des']}";
echo "</textarea>";
echo "<br />";
echo "<br />";
echo "<label>" . "Stock:" . "</label>" . "<br />";
echo "<input class='input' type='text' name='dstock' value='{$row1['quantity']}' />";
echo "<br />";
echo "<br />";
echo "<input type='submit' name='back' value='        Back       ' style='background-color:lightblue;padding:5px;font-size:20px;' />";
echo "&nbsp&nbsp&nbsp&nbsp";
echo "<input class='submit' type='submit' name='submit' id='submit' onclick='return confirm('Product Updated!')' value='       Update       ' style='background-color:lightgreen;padding:5px;font-size:20px;' />";
echo "</form>";
}
}
if(isset($_GET['submit'])) {
$file = $_FILES['file'];
$id = $_GET['did'];
$name = $_GET['dname'];
$price = $_GET['dprice'];
$cat = $_GET['dcat'];
$des = $_GET['ddes'];
$stock = $_GET['dstock'];
$query = mysql_query("update product set
product_name='$name', product_price='$price', category='$cat',
des='$des', quantity='$stock' where product_id='$id'");
header('location:products.php');
}
if(isset($_GET['back'])) {
header('location:products.php');
}

?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysql_close($connection);
?>
</body>
</html>