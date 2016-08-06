<?php 
	include "koneksi.php";	 
	
	$nmWrn = $_GET['srchPkn'];
	$result1 = array();
	$result2 = array();	
	
	$usrnmLaundry = $_GET['nm_laundry'];	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$data = mysql_query("SELECT * FROM pakaian WHERE nama_pakaian LIKE '%$nmWrn%' 
						AND id_laundry='$idLaundry[id_laundry]' ");	
	
	while($dt = mysql_fetch_array($data)){
		$result1['nama_pakaian'] = $dt['nama_pakaian'];
		$result1['id_pakaian'] = $dt['id_pakaian'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_pakaian\":" . $dataku . "}"; 
?>