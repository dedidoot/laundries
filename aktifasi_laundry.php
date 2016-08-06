<?php
	include "koneksi.php";//fafap
	
	$id		= $_GET['id'];
	$aktif	= $_GET['aktif'];
	
	$_cek = mysql_query("SELECT * FROM admin_laundry WHERE username='$id' AND aktif='n' ");
	$valid = mysql_fetch_array($_cek);
	$cek = mysql_num_rows($_cek);	
	
	if(($cek>0) && ($aktif=="y")){		
		$kueri = mysql_query("UPDATE admin_laundry SET aktif='$aktif' WHERE username='$id' ")
						or die(mysql_error()) ;				
				mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry)
						VALUES('Kemeja', $valid[id_laundry]) ");
				mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry)
						VALUES('Kaos Polo', $valid[id_laundry]) ");
				mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry)
						VALUES('Jaket', $valid[id_laundry]) ");
				mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry)
						VALUES('Handuk', $valid[id_laundry]) ");
				mysql_query("INSERT INTO pakaian (nama_pakaian, id_laundry)
						VALUES('Levis', $valid[id_laundry]) ");
				mysql_query("INSERT INTO warna (nama_warna, id_laundry)
						VALUES('Putih', $valid[id_laundry]) ");
				mysql_query("INSERT INTO warna (nama_warna, id_laundry)
						VALUES('Hitam', $valid[id_laundry]) ");
				mysql_query("INSERT INTO warna (nama_warna, id_laundry)
						VALUES('Biru', $valid[id_laundry]) ");
				mysql_query("INSERT INTO warna (nama_warna, id_laundry)
						VALUES('Merah', $valid[id_laundry]) ");
				mysql_query("INSERT INTO warna (nama_warna, id_laundry)
						VALUES('Coklat', $valid[id_laundry]) ");
		if($kueri==TRUE){
			echo "Akun Anda berhasil diaktifkan, silahkan login.";
		}else{
			echo "Akun Anda gagal diaktifkan, mohon dicek kembali.";
		}
	}else{
		echo"Error sistem";
	}
?>