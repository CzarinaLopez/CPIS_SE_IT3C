<?php
	require_once 'php_action/core.php';
	session_start();
	$id = $_REQUEST['id'];
	mysql_query("update customer set status = 'Active' where id = '$id'");
	header('location: user_not_active.php');

?>