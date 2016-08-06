<?php 
	include "koneksi.php";
	
	$nmPkn  = $_POST['nmPkn'];
	$nmWrn  = $_POST['nmWrn'];
	$jum    = $_POST['jum'];
	
	$nmLaundry 		= $_POST['nameLaundry'];
	$id_pelanggan 	= $_POST['idPelanggan'];
	
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
	
	if((mysql_num_rows($qw)>0)&&(mysql_num_rows($cekIdPkn)>0)&&(mysql_num_rows($cekIdWrn)>0)){
		$kueri = mysql_query("DELETE FROM detail_nota WHERE id_nota='$idNota' AND id_pakaian='$idPkn[id_pakaian]'
					AND id_warna='$idWrn[id_warna]' AND jumlah='$jum' ");					
		if($kueri==TRUE){			
			echo"Berhasil hapus pakaian $nmPkn ";
		}else{
			echo"Gagal"; 
		}
	}else{
		echo "none";
	}
	
?>