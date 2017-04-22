<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'stock_se';
	$connection = mysql_connect($server, $username, $password);
	mysql_select_db($database, $connection);
?>