<?php 
	include "koneksi.php";	 
	
	$idNmLaundry = $_GET['idNmLaundry'];		
	$result1 = array();
	$result2 = array();	
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$idNmLaundry' ");
	$getlaundry = mysql_fetch_array($idDry);
	$idLaundry = $getlaundry['id_laundry'];
	
	$data = mysql_query("SELECT * FROM admin_laundry WHERE id_laundry='$idLaundry' ");	
	
	while($dt = mysql_fetch_array($data)){
		$result1['username'] = $dt['username'];
		$result1['nmLaundry'] = $dt['nama_laundry'];
		$result1['password'] = $dt['password'];
		$result1['alamat'] = $dt['alamat'];
		$result1['kontak'] = $dt['kontak'];
		$result1['email'] = $dt['email'];
		$result1['harga_kg'] = $dt['harga_kg'];
		$result1['foto_logo'] = $dt['foto_logo'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_data\":" . $dataku . "}"; 
?>