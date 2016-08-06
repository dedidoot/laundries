<?php
	include "../koneksi.php";
	
	$id		= $_GET['id'];
	$aktif	= $_GET['aktif'];
	
	$_cek = mysql_query("SELECT * FROM pelanggan WHERE username='$id' AND aktif='n' ");
	$cek = mysql_num_rows($_cek);	
	if(($cek>0) && ($aktif=="y")){		
		$kueri = mysql_query("UPDATE pelanggan SET aktif='$aktif' WHERE username='$id' ")
						or die(mysql_error()) ;			
		if($kueri==TRUE){
			echo "Akun Anda berhasil diaktifkan, silahkan login.";
		}else{
			echo "Akun Anda gagal diaktifkan, mohon dicek kembali.";
		}
	}else{
		echo"Error sistem";
	}
?>