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
	include "GCM.php";
	$gcm = new GCM();
	
	$nmplg = $_GET['nama_pelanggan'];
	$waktu = $_GET['tgl'];
	
	$kueri = mysql_query("SELECT id_pelanggan, gcm_regid FROM pelanggan WHERE username='$nmplg' ");
	$vkueri = mysql_fetch_array($kueri);
	$IDPELANGGAN = $vkueri['id_pelanggan'];
	$IDGCM = $vkueri['gcm_regid'];
	
	$_kueri = mysql_query("SELECT id_nota, id_laundry, id_pelanggan FROM nota WHERE 
							tgl_ambil='$waktu' AND status='n' AND id_pelanggan='$IDPELANGGAN' 
								ORDER BY id_nota DESC LIMIT 1");
	  
	//$id_gcm = "APA91bHOrRSjOaC0mok1ArOkOQO4-pixvlOLTkcO3AWOLkACq7drByxBl3ivJDXBxQWH4rsz2NUxhnDI5aBQozxSvF3HfE-1vc2ApURIuRVuc_tIS9LVL6ZgnQOPqLLj_PqLFjEQGJTcOVUL7vQI4mfqKR0Jbp5U2Q";
	$message = "Silahkan cek status laundry Anda!";
	
	if (mysql_num_rows($_kueri)>0){
		$registatoin_ids = array($IDGCM);
		$message = array("price" => $message);
		$respon = $gcm->send_notification($registatoin_ids, $message);
		
		if($respon=="Berhasil"){
			echo "Berhasil";
		}else{
			echo"Gagal"; 
		}
	}else{}
?>