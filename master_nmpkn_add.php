<?php
	include "koneksi.php";
	
	$usrnmLaundry = $_POST['nm_laundry'];
	$nama_pakaian = $_POST['nama_pakaian'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$qy = mysql_query("SELECT * FROM pakaian WHERE 
						id_laundry='$idLaundry[id_laundry]' AND nama_pakaian='$nama_pakaian' ");	
	
	if(mysql_num_rows($qy)>0){
		echo"Data sudah ada.";
	}else{
		$kueri = mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry) 
								VALUES ('$nama_pakaian','$idLaundry[id_laundry]')");
					
		if($kueri==TRUE){			
			echo "Berhasil";// tambah nama pakaian $nama_pakaian";
		}else{
			echo"Gagal"; 
		}
	}
?>