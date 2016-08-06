<?php
	include "koneksi.php";
	
	$idplg = $_GET['id_pelanggan'];
	$idnota = $_GET['id_nota'];
	$result1 = array();
	$result2 = array();
	/* $kueriPkn = mysql_query("SELECT jumlah 
						FROM detail_nota dnt JOIN nota nt ON nt.id_nota=dnt.id_nota 
						WHERE id_pelanggan='$idplg' AND nt.id_nota='$idnota' "); */
						
	$kueriPkn = mysql_query("SELECT pkn.nama_pakaian, wrn.nama_warna, dnt.jumlah, nt.harga 
						FROM nota nt JOIN detail_nota dnt ON dnt.id_nota=nt.id_nota
						JOIN pakaian pkn ON dnt.id_pakaian=pkn.id_pakaian JOIN warna wrn 
						ON dnt.id_warna=wrn.id_warna 
						WHERE nt.id_pelanggan='$idplg' AND nt.id_nota='$idnota' ");
	
	while($dataPkn = mysql_fetch_array($kueriPkn)){
		$result1['harga'] = $dataPkn['harga']; 
		$result1['nama_pakaian'] = $dataPkn['nama_pakaian']; 
		$result1['nama_warna'] = $dataPkn['nama_warna']; 
		$result1['jumlah'] = $dataPkn['jumlah']; 
		array_push($result2, $result1);
	} 
	$datPkn = json_encode($result2);
	echo "{\"list_nota\":" . $datPkn . "}";	
?>