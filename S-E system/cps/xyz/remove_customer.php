<?php
	require_once 'php_action/core.php';
	session_start();
	$id = $_REQUEST['id'];
	mysql_query("delete from customer where id = '$id'");
	header('location: user.php');

?>