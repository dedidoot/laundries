<?php
	include "koneksi.php";
	
	$result1 = array();
	$result2 = array();
	
	$usrnmLaundry = $_GET['nm_laundry'];	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$kueriWrn = mysql_query("SELECT * FROM pakaian WHERE id_laundry='$idLaundry[id_laundry]'
					ORDER BY id_pakaian desc ");
	
	while($dataWrn = mysql_fetch_array($kueriWrn)){
		$result1['id_pakaian'] = $dataWrn['id_pakaian']; 
		$result1['nama_pakaian'] = $dataWrn['nama_pakaian']; 		
		array_push($result2, $result1);
	} 
	$datWrn = json_encode($result2);
	echo "{\"list_pakaian\":" . $datWrn . "}";	
?>