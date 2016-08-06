<?php 
	$server = "localhost";
	$user 	= "root";
	$pass	= "";
	$database = "laundry";
	
	mysql_connect($server, $user, $pass) or die("Server error");
	mysql_select_db($database) or die("Database not found");
	
	define("GOOGLE_API_KEY", "AIzaSyAV_I9gPFqp430vJ4rt8lkjvS8C8qdEEx8");
?>