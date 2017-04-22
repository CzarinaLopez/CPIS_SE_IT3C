<?php
	require_once 'php_action/core.php';
	session_start();
	$product_id = $_REQUEST['product_id'];
	mysql_query("delete from product where product_id = '$product_id'");
	header('location: products.php');

?>