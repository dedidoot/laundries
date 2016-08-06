<?php
	include "koneksi.php";
	
	$id_pelanggan  = $_POST['id_pelanggan'];
	
	$kueri = mysql_query("SELECT id_pelanggan FROM pelanggan 
							WHERE id_pelanggan='$id_pelanggan' ");
	$arrFetch = mysql_fetch_array($kueri);
	
	if($id_pelanggan == $arrFetch['id_pelanggan']){
		echo "1";
	}else{
		echo "0";
	}
	
?>