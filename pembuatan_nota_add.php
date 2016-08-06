<?php
	//session_start();
	include "koneksi.php";
	include "GCM.php";
	$gcm = new GCM();
	
	$berat = $_POST['berat'];
	$tgl_laundry  = $_POST['tglLaundry'];
	$tgl_ambil    = $_POST['tglAmbil'];
	$username     = $_POST['username'];
	$nmLaundry   = $_POST['nm_laundry'];
	$status = 'n';
	
	$idDry = mysql_query("SELECT id_laundry, nama_laundry  FROM admin_laundry WHERE username='$nmLaundry' ");
	$getlaundry = mysql_fetch_array($idDry);
	
	$KuerigetHarga = mysql_query("SELECT harga_kg FROM admin_laundry WHERE id_laundry='$getlaundry[id_laundry]' ");
	$getHarga = mysql_fetch_array($KuerigetHarga);
	$tot_hrg = $getHarga['harga_kg'] * $berat;
	
	$KuerigetId = mysql_query("SELECT id_pelanggan, gcm_regid  FROM pelanggan WHERE username='$username' ");
	$getId = mysql_fetch_array($KuerigetId); 
	$id_gcm = $getId['gcm_regid'];
	$message = "Nota terbaru dari laundry $getlaundry[nama_laundry].";
 
	$registatoin_ids = array($id_gcm);
	$message = array("price" => $message);
	//$respon = $gcm->send_notification($registatoin_ids, $message);
	$respon="Berhasil"; //$gcm->send_notification($registatoin_ids, $message);
	
	if($respon=="Berhasil"){
		$kueri = mysql_query("INSERT INTO nota (id_laundry, id_pelanggan, berat_pakaian, 
					tgl_laundry, tgl_ambil, harga, status) VALUES ('$getlaundry[id_laundry]', '$getId[id_pelanggan]', '$berat', 
					'$tgl_laundry', '$tgl_ambil', '$tot_hrg', '$status')");					
		if($kueri==TRUE){											
			echo"Berhasil";			
		}else{
			echo"Gagal"; 
		}
	}else{
		echo"Gagal"; 
	}
?>