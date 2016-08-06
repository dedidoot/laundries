<?php
	include "koneksi.php";
	
	$result1 = array();
	$result2 = array();
	
	$nmLaundry = $_GET['nm_laundry'];
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$kueriPkn = mysql_query("SELECT * FROM pakaian WHERE id_laundry='$idLaundry[id_laundry]'
					ORDER BY id_pakaian desc");
	
	while($dataPkn = mysql_fetch_array($kueriPkn)){
		$result1['nama_pakaian'] = $dataPkn['nama_pakaian']; 
		array_push($result2, $result1);
	} 
	$datPkn = json_encode($result2);
	echo "{\"list_pakaian\":" . $datPkn . "}";	
?>