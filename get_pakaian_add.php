<?php 
	include "koneksi.php";
	
	$nmLaundry 		= $_POST['nameLaundry'];
	$id_pelanggan 	= $_POST['idPelanggan'];
	$nmPkn  = $_POST['nmPkn'];
	$nmWrn  = $_POST['nmWrn'];
	$jum    = $_POST['jum'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$qw = mysql_query("SELECT id_nota FROM nota WHERE id_laundry='$idLaundry[id_laundry]' AND id_pelanggan='$id_pelanggan' 
						ORDER BY id_nota DESC LIMIT 1");	
	$qwri = mysql_fetch_array($qw);
	$idNota = $qwri['id_nota'];
	
	$cekIdPkn = mysql_query("SELECT id_pakaian FROM pakaian WHERE nama_pakaian='$nmPkn' ");
	$idPkn = mysql_fetch_array($cekIdPkn);
	
	$cekIdWrn = mysql_query("SELECT id_warna FROM warna WHERE nama_warna='$nmWrn' ");
	$idWrn = mysql_fetch_array($cekIdWrn);
	 
	$kueri = mysql_query("INSERT INTO detail_nota (id_nota, id_pakaian, id_warna, jumlah) 
						VALUES ('$idNota', '$idPkn[id_pakaian]', '$idWrn[id_warna]', '$jum') ");
						
	if($kueri==TRUE){			
		echo"Berhasil tambah pakaian $nmPkn ";
	}else{
		echo"Gagal"; 
	}
	
?>