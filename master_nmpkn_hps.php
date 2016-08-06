<?php 
	include "koneksi.php";

	$idNmWrn  	  = $_POST['id_pakaian'];
	$usrnmLaundry = $_POST['nm_laundry'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$kueriNm = mysql_query("SELECT nama_pakaian FROM pakaian WHERE id_pakaian='$idNmWrn' 
						AND id_laundry='$idLaundry[id_laundry]' ");
						
	$GetNm = mysql_fetch_array($kueriNm); 
	
	$kueri = mysql_query("DELETE FROM pakaian WHERE id_pakaian='$idNmWrn' ");
						
	if($kueri==TRUE){			
		echo "Berhasil hapus pakaian $GetNm[nama_pakaian]";
	}else{
		echo"Gagal"; 
	}
	
?>