<?php
	include "koneksi.php";
	
	$nmLaundry = $_GET['nmLaundry'];
	$id_pelanggan = $_GET['idplg'];
	$ip_address = $_GET['ipaddress'];
	$result1 = array();
	$result2 = array();
	
	$kueri = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan' ");
	
	/* $a = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry'");
	$aa = mysql_fetch_array($a); */
	
	/* $cekpkn = mysql_query("SELECT * FROM pakaian WHERE id_laundry=(SELECT id_laundry FROM admin_laundry
						WHERE username='$nmLaundry') "); */
	/* $cekpkn = mysql_query("SELECT * FROM pakaian WHERE id_laundry='$aa[id_laundry]' "); */
						
	/* $cekwrn = mysql_query("SELECT * FROM warna WHERE id_laundry=(SELECT id_laundry FROM admin_laundry
						WHERE username='$nmLaundry') "); */
	/* $cekwrn = mysql_query("SELECT * FROM warna WHERE id_laundry='$aa[id_laundry]' ");	 */					
	
	if(mysql_num_rows($kueri)>0){
		while($data = mysql_fetch_array($kueri)){
			//$data = mysql_fetch_array($kueri);
			$result1['username'] = $data['username'];
			$result1['foto'] = "http://".$ip_address."/laundry/uploads/".$data['foto'];
			array_push($result2, $result1);
		}	
		$data = json_encode($result2);
		echo "{\"list_data\":" . $data . "}";
	}else{
		echo "none";
	}
?>