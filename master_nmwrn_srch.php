<?php 
	include "koneksi.php";	 
	
	$nmWrn = $_GET['srchWrn'];
	$result1 = array();
	$result2 = array();	
	
	$usrnmLaundry = $_GET['nm_laundry'];	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$data = mysql_query("SELECT * FROM warna WHERE nama_warna LIKE '%$nmWrn%' 
						AND id_laundry='$idLaundry[id_laundry]' ");	
	
	while($dt = mysql_fetch_array($data)){
		$result1['nama_warna'] = $dt['nama_warna'];
		$result1['id_warna'] = $dt['id_warna'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_warna\":" . $dataku . "}"; 
?>