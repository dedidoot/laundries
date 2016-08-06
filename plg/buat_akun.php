<?php 
	include "../koneksi.php";
	
	$_nmPlg 	   = $_POST['nmPlg'];
	$nmPlg 	   = str_replace(" ","",$_nmPlg);
	$password  = $_POST['password'];
	$alamat    = $_POST['alamat'];
	$kontak    = $_POST['kontak'];//unique
	$email     = $_POST['email'];//unique
	$foto      = $_POST['foto'];
	$id_gcm      = $_POST['regId'];
	$ip      = $_POST['ipaddress'];
	$aktif     = 'n';	
	 
	$cekKontak = mysql_query("SELECT * FROM pelanggan WHERE kontak='$kontak' ");
	$cekEmail = mysql_query("SELECT * FROM pelanggan WHERE email='$email' ");
	$cekNama = mysql_query("SELECT * FROM pelanggan	 WHERE username='$nmPlg' ");
	
	if(mysql_num_rows($cekNama)>0){
		echo "Nama $nmPlg Sudah Ada. ";
	}if(mysql_num_rows($cekKontak)>0){
		echo "Kontak $kontak Sudah Ada. ";
	}if(mysql_num_rows($cekEmail)>0){
		echo "Email $email Sudah Ada. ";
	}if( (mysql_num_rows($cekEmail)==0) && (mysql_num_rows($cekKontak)==0) && (mysql_num_rows($cekNama)==0)){ 
		$kueri = mysql_query("INSERT INTO pelanggan (username, password, email, 
				alamat, kontak, foto, aktif, gcm_regid) VALUES ('$nmPlg', '$password', '$email', 
				'$alamat', '$kontak', '$foto', '$aktif', '$id_gcm')");
		if($kueri==TRUE){			
			echo"Berhasil";
			$ops = strrchr($email, "gmail");
			if(!$ops=="gmail.com"){
				$opsi = " Salin alamat URL ini jika link diatas tidak bisa diklik
							$ip/laundry/plg/aktifasi_plg.php?id=$nmPlg&aktif=y";
			}else{
				$opsi = "";
			}
			$headers .= "MIME-Version: 1.0\r\n";
			//$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$subject = "Verifikasi Apps Laundroid Pelanggan";
			$body	 = "Silahkan Login dengan data, ";
			$body	 .= "<h1>USERNAME : $nmPlg";
			$body	 .= ", PASSWORD : $password</h1>";
			$body	 .= "dan <a href='$ip/laundry/plg/aktifasi_plg.php?id=$nmPlg&aktif=y'>klik disini</a> untuk mengaktifkan akun.";
			$body    .= $opsi;
			mail($email,$subject,$body,$headers);
		}else{
			echo"Gagal"; 
		}
	}
?>