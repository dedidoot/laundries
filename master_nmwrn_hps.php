<?php 
	include "koneksi.php";

	$idNmWrn  = $_POST['id_warna'];
	$usrnmLaundry = $_POST['nm_laundry'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$kueriNm = mysql_query("SELECT nama_warna FROM warna WHERE id_warna='$idNmWrn' 
							AND id_laundry='$idLaundry[id_laundry]' ");
					
	$GetNm = mysql_fetch_array($kueriNm); 
	
	$kueri = mysql_query("DELETE FROM warna WHERE id_warna='$idNmWrn' ");
						
	if($kueri==TRUE){			
		echo "Berhasil hapus warna $GetNm[nama_warna]";
	}else{
		echo"Gagal"; 
	}
	
?>