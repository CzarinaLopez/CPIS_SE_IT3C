<?php

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'stock_se';
	$connection = mysql_connect($server, $username, $password);
	mysql_select_db($database, $connection);


$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stock_se";


//database connection

$connect = new mysqli($localhost, $username, $password, $dbname);
//check connection
if($connect->connect_error){
	die("Connection Failed:" . $connect->connect_error);
}else{
	//echo "Successfully connected";
}







?>