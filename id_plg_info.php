<?php 
	include "koneksi.php";	 
	
	$get_plg = $_GET['idplg'];	
	$result1 = array();
	$result2 = array();	
	$data = mysql_query("SELECT username, alamat, kontak FROM pelanggan WHERE id_pelanggan='$get_plg' ");	
	
	while($dt = mysql_fetch_array($data)){
		$result1['username'] = $dt['username'];
		$result1['alamat'] = $dt['alamat'];
		$result1['kontak'] = $dt['kontak'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_pelanggan\":" . $dataku . "}"; 
?>