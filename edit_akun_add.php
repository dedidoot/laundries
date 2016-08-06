<?php 		 
	include "koneksi.php";

	$_usrLaundry = $_POST['usrLaundry'];
	$usrLaundry = str_replace(" ","",$_usrLaundry);
	$nmLaundry = $_POST['nmLaundry'];
	$password  = $_POST['password'];
	$alamat    = $_POST['alamat'];
	$kontak    = $_POST['kontak'];//unique
	$email     = $_POST['email'];//unique
	$harga     = $_POST['harga'];
	$logo      = $_POST['logo'];//"12ko.jpeg"; //$_GET['logo'];
	$_idLaundry = $_POST['idNmLaundry'];
	
	$idDry = mysql_query("SELECT username, id_laundry FROM admin_laundry WHERE username='$_idLaundry' ");
	$getlaundry = mysql_fetch_array($idDry);
	$idLaundry = $getlaundry['id_laundry'];	
	
	$laundry = mysql_query("SELECT * FROM admin_laundry WHERE username='$usrLaundry' ");
	
	$cekFoto = mysql_query("SELECT foto_logo FROM admin_laundry WHERE foto_logo='$logo' ");
	$dt = mysql_fetch_array($cekFoto);
	$dataFoto = $dt['foto_logo'];
		
	if($_idLaundry==$usrLaundry){
		if( $logo == $dt['foto_logo']) {
			$kueri = mysql_query("UPDATE admin_laundry SET nama_laundry='$nmLaundry', 
						password='$password', email='$email', alamat='$alamat', 
						kontak='$kontak', harga_kg='$harga' WHERE id_laundry='$idLaundry' ")
						 or die(mysql_error()) ;
			if($kueri==TRUE){			
				echo"Berhasil Update";
			}else{
				echo"Gagal"; 
			}			
		}else{
			$kueri = mysql_query("UPDATE admin_laundry SET nama_laundry='$nmLaundry', 
						password='$password', email='$email', alamat='$alamat', 
						kontak='$kontak', harga_kg='$harga', foto_logo='$logo' WHERE id_laundry='$idLaundry' ")
						 or die(mysql_error()) ;

			if($kueri==TRUE){			
				echo"Berhasil Update";
			}else{
				echo"Gagal Update"; 
			}			
		}		
	}else{
		if(mysql_num_rows($laundry)>0){
			echo"Username sudah ada.";
		}else{
			if( $logo == $dt['foto_logo']) {
				$kueri = mysql_query("UPDATE admin_laundry SET username='$usrLaundry', nama_laundry='$nmLaundry', 
							password='$password', email='$email', alamat='$alamat', 
							kontak='$kontak', harga_kg='$harga' WHERE id_laundry='$idLaundry' ") 
							or die(mysql_error()) ;
				if($kueri==TRUE){			
					echo"Berhasil Update";
				}else{
					echo"Gagal"; 
				}			
			}else{
				$kueri = mysql_query("UPDATE admin_laundry SET username='$usrLaundry', nama_laundry='$nmLaundry', 
							password='$password', email='$email', alamat='$alamat', 
							kontak='$kontak', harga_kg='$harga', foto_logo='$logo' WHERE id_laundry='$idLaundry' ")
							or die(mysql_error()) ;

				if($kueri==TRUE){			
					echo"Berhasil Update";
				}else{
					echo"Gagal Update"; 
				}			
			}
		}
	}
			
?>