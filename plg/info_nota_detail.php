<?php
	include "../koneksi.php";
	
	$idnota = $_GET['idNota'];
	$result1 = array();
	$result2 = array();
	
	$kueri = mysql_query("SELECT pkn.nama_pakaian, wrn.nama_warna, dn.jumlah 
				FROM nota nt
				JOIN detail_nota dn ON nt.id_nota=dn.id_nota
				JOIN pakaian pkn ON pkn.id_pakaian=dn.id_pakaian
				JOIN warna wrn ON wrn.id_warna=dn.id_warna
				WHERE nt.id_nota='$idnota'");
	
	while($data = mysql_fetch_array($kueri)){	
		$result1['nama_pakaian'] = $data['nama_pakaian'];	
		$result1['nama_warna'] = $data['nama_warna'];	
		$result1['jumlah'] = $data['jumlah'];	
		array_push($result2, $result1);
	}
	
	$data = json_encode($result2);
	echo "{\"list_data\":" . $data . "}";
?>