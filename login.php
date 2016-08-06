<?php
	include "koneksi.php";
	
	$username  	= $_POST['username'];
	$password   = $_POST['password'];
	$status 	= 'y';
	
	$kueri = mysql_query("SELECT username, password, aktif FROM admin_laundry 
							WHERE username='$username' AND password='$password' AND aktif='$status' ");
	$arrFetch = mysql_fetch_array($kueri);
	
	if( ($username == $arrFetch['username']) and ($password == $arrFetch['password']) 
		 and ($status == $arrFetch['aktif']) ){
		echo "1";
	}else{
		echo "0";
	}
	
?>