

<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());


if($_POST) {
	$brandName = $_POST['brandName'];
	$brandPrice = $_POST['brandPrice'];
	$brandStock = $_POST['brandStock'];
	$product_image = $_POST['product_image'];


	
	$sql = "INSERT INTO product (product_name, product_image, product_price, quantity) VALUES ('$brandName', '$product_image' , '$brandPrice', '$brandStock')";
	
	if($connect->query($sql) === TRUE){
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Added';
	}else{
		$valid['success'] = false;
		$valid['messages'] = "Error while adding the product";
	}
	
	$connect->close();
	
	echo json_encode($valid);
	
}
