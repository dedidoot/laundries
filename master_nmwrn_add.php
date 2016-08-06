<?php
	include "koneksi.php";
	
	$nama_warna = $_POST['nama_warna'];
	$usrnmLaundry = $_POST['nm_laundry'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$usrnmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$qy = mysql_query("SELECT * FROM warna WHERE 
						id_laundry='$idLaundry[id_laundry]' AND nama_warna='$nama_warna' ");	
	
	if(mysql_num_rows($qy)>0){
		echo"Data sudah ada.";
	}else{
		$kueri = mysql_query("INSERT INTO warna (nama_warna, id_laundry) 
								VALUES ('$nama_warna','$idLaundry[id_laundry]')");
					
		if($kueri==TRUE){			
			echo "Berhasil";//" tambah nama warna $nama_warna";
		}else{
			echo"Gagal"; 
		}
	}
?>