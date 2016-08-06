<?php
	include "koneksi.php";

	$result3 = array();
	$result4 = array();
	
	$usrLan = $_GET['nm_laundry'];
	$getId_=mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrLan' ");
	$getId=mysql_fetch_array($getId_);
	$id=$getId['id_laundry'];
	
	$kueriWrn = mysql_query("SELECT * FROM warna WHERE id_laundry='$id' ORDER BY id_warna desc");

	while($dataWrn = mysql_fetch_array($kueriWrn)){
		$result3['nama_warna'] = $dataWrn['nama_warna']; 
		array_push($result4, $result3);
	}
	$datWrn = json_encode($result4);
	echo "{\"list_warna\":" . $datWrn . "}";
	
?>