<?php
	include "../koneksi.php";
	
	$ip_address = $_GET['ipaddress'];
	$idnota = $_GET['idNota'];
	$result1 = array();
	$result2 = array(); 
	
	$kueri = mysql_query("SELECT adm.alamat, adm.nama_laundry, nt.tgl_ambil, adm.foto_logo,
				adm.kontak, nt.berat_pakaian, nt.harga, nt.status FROM nota nt
				JOIN admin_laundry adm ON adm.id_laundry=nt.id_laundry 
				JOIN detail_nota dn ON dn.id_nota=nt.id_nota
				WHERE nt.id_nota='$idnota' LIMIT 1 ");
	
	if(mysql_num_rows($kueri)>0){	
		while($data = mysql_fetch_array($kueri)){		
			$result1['nama_laundry'] = $data['nama_laundry'];	
			$result1['alamat'] = $data['alamat'];	
			$result1['kontak'] = $data['kontak'];	
			$result1['tgl_ambil'] = $data['tgl_ambil'];	
			$result1['berat_pakaian'] = $data['berat_pakaian'];	
			$result1['harga'] = $data['harga'];	
			$result1['status'] = $data['status'];	
			$result1['foto_logo'] = "http://".$ip_address."/laundry/uploads/".$data['foto_logo'];
			array_push($result2, $result1);
		}
		$data = json_encode($result2);
		echo "{\"list_data\":" . $data . "}";
    }else{
		echo "Data tidak ada";
	}
?>