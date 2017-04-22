<?php
	require_once 'php_action/core.php';
	session_start();
	$id = $_REQUEST['id'];
	mysql_query("update orders set act = 'Completed' where id = '$id'");
	header('location: manage_order.php');

?>