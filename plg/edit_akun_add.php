<?php 		 
	include "../koneksi.php";

	$_nmPlg     = $_POST['nmPlg'];
	$nmPlg 	   = str_replace(" ","",$_nmPlg);
	$password  = $_POST['password'];
	$alamat    = $_POST['alamat'];
	$kontak    = $_POST['kontak'];//unique
	$email     = $_POST['email'];//unique 
	$foto      = $_POST['foto'];//"12ko.jpeg"; 
	$idNmPlg   = $_POST['idNmPlg'];
	 	
	$cekFoto = mysql_query("SELECT foto FROM pelanggan WHERE foto='$foto' ");
	$dt = mysql_fetch_array($cekFoto);
	$dataFoto = $dt['foto'];
			
	if( $foto == $dt['foto']) {
		$kueri = mysql_query("UPDATE pelanggan SET username='$nmPlg', 
					password='$password', email='$email', alamat='$alamat', 
					kontak='$kontak' WHERE username='$idNmPlg' ")
					or die(mysql_error()) ;
		if($kueri==TRUE){			
			echo"Berhasil Update";
		}else{
			echo"Gagal"; 
		}			
	}else{
		$kueri = mysql_query("UPDATE pelanggan SET username='$nmPlg', 
					password='$password', email='$email', alamat='$alamat', 
					kontak='$kontak', foto='$foto' WHERE username='$idNmPlg' ")
					or die(mysql_error()) ;

		if($kueri==TRUE){			
			echo"Berhasil Update";
		}else{
			echo"Gagal Update"; 
		}			
	}
			
?>