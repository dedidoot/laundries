<?php
	include "../koneksi.php";
	
	$id_pelanggan = $_GET['nmPlg'];
	$ip_address = $_GET['ipaddress'];
	$result1 = array();
	$result2 = array();
	
	$kueri = mysql_query("SELECT id_pelanggan FROM pelanggan WHERE username='$id_pelanggan' ");
	$hasil = mysql_fetch_array($kueri);
	$idPlg = $hasil['id_pelanggan'];
	
	$kueri = mysql_query("SELECT nt.id_nota, adm.nama_laundry, nt.tgl_laundry, adm.foto_logo FROM nota nt
			JOIN admin_laundry adm ON nt.id_laundry=adm.id_laundry WHERE nt.id_pelanggan='$idPlg' 
			ORDER BY nt.id_nota desc");
	
	while($data = mysql_fetch_array($kueri)){
		$result1['id_nota'] = $data['id_nota'];
		$result1['nama_laundry'] = $data['nama_laundry'];
		$result1['tgl_laundry'] = $data['tgl_laundry'];
		$result1['foto_logo'] = "http://".$ip_address."/laundry/uploads/".$data['foto_logo'];
		//$result1['foto'] = "http://10.0.2.2/laundry/uploads/".$data['foto'];
		array_push($result2, $result1);
	}
	
	$data = json_encode($result2);
	echo "{\"list_data\":" . $data . "}";
?>