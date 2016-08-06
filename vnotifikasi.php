<?php
	//echo getdate("Y/m/d"); //tanggal
	//echo time();
	//print_r (getdate(date("U")));
	//$jam = idate("h");
	//$menit = idate("i");
	//$detik = idate("s");
	//$waktu = $jam.":".$menit.":".$detik;
	//echo $waktu;

	include "koneksi.php";
	
	$nmplg = $_GET['nama_pelanggan'];
	$ip = $_GET['ipaddress'];
	$tmp = array();
	$tmp2 = array();
	
	$kueri = mysql_query("SELECT id_pelanggan FROM pelanggan WHERE username='$nmplg' ");
	$vkueri = mysql_fetch_array($kueri);
	$IDPELANGGAN = $vkueri['id_pelanggan'];
	
	$_kueri = mysql_query("SELECT id_nota, id_laundry, id_pelanggan FROM nota WHERE 
							id_pelanggan='$IDPELANGGAN' ORDER BY id_nota DESC LIMIT 1");							
	$_vkueri = mysql_fetch_array($_kueri);
	$IDLAUNDRY = $_vkueri['id_laundry'];
	
	$__kueri = mysql_query("SELECT * FROM admin_laundry WHERE id_laundry='$IDLAUNDRY' ");
	$__vkueri = mysql_fetch_array($__kueri);
	  
	if (mysql_num_rows($_kueri)>0){
		$tmp['id_pelanggan'] = $_vkueri['id_pelanggan']; 
		$tmp['nama_laundry'] = $__vkueri['nama_laundry'];
		$tmp['kontak'] = $__vkueri['kontak'];
		$tmp['alamat'] = $__vkueri['alamat'];
		$tmp['foto_logo'] = "http://".$ip."/laundry/uploads/".$__vkueri['foto_logo'];
		array_push($tmp2, $tmp);
		$data = json_encode($tmp2);
		echo "{\"list_data\":" . $data . "}";
	}else{}
?>