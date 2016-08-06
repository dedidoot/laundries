<?php 
	include "../koneksi.php";	 
	
	$nmPlg = $_GET['nmPlg'];		
	$result1 = array();
	$result2 = array();	 
	
	$data = mysql_query("SELECT * FROM pelanggan WHERE username='$nmPlg' ");	
	
	while($dt = mysql_fetch_array($data)){
		$result1['id_pelanggan'] = $dt['id_pelanggan'];
		$result1['username'] = $dt['username'];
		$result1['password'] = $dt['password'];
		$result1['alamat'] = $dt['alamat'];
		$result1['kontak'] = $dt['kontak'];
		$result1['email'] = $dt['email'];
		$result1['foto'] = $dt['foto'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_data\":" . $dataku . "}"; 
?>