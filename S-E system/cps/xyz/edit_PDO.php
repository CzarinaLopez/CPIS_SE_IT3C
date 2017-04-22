<?php
 
require_once ('db.php');

$get_id=$_REQUEST['product_id'];
 
move_uploaded_file($_FILES["image"]["tmp_name"],"img/img/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];
 
$name = $_POST['dname'];
$price = $_POST['dprice'];
$cat = $_POST['dcat'];
$des = $_POST['ddes'];
$stock = $_POST['dstock'];
 if($location1 == ""){
	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE product SET product_name='$name', product_price='$price', category='$cat', des='$des', quantity='$stock' WHERE product_id = '$get_id' ";
 }else{
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE product SET product_name='$name', product_price='$price', category='$cat', des='$des', quantity='$stock', product_image ='img/img/$location1' WHERE product_id = '$get_id' ";
 }
$conn->exec($sql);
echo "<script>alert('Successfully Updated!!!'); window.location='products.php'</script>";
?>