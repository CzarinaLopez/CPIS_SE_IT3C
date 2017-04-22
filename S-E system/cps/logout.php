<?php
	include 'core/connection.php';
	session_start();
	session_unset();
	session_destroy();
	echo '<script>alert("Successfully logout.");location.replace("index.php");</script>';
?>