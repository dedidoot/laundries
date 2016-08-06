<?php 
	include "koneksi.php";//wtf
	
	$ip = $_POST['ipaddress'];
	$usrnme = $_POST['userLaundry'];
	$username = str_replace(" ","",$usrnme);
	$nmLaundry = $_POST['nmLaundry'];
	$password  = $_POST['password'];
	$alamat    = $_POST['alamat'];
	$kontak    = $_POST['kontak'];//unique
	$email     = $_POST['email'];//unique
	$harga     = $_POST['harga'];
	$logo      = $_POST['logo'];
	$aktif     = 'n';	
	
	/* $nama = $nmLaundry;		
	$filter = str_replace(" ","",$nama);
	$acak = str_shuffle($filter);	
	$ack = substr($acak,0,3);		
	if(strchr($nama," "," ")){
		$nm = strchr($nama," "," ");
	}else{
		$nm = substr($nama,0,10);
	}
	$str_fix = $nm.$ack; */
	
	$cekKontak = mysql_query("SELECT * FROM admin_laundry WHERE kontak='$kontak' ");
	$cekEmail = mysql_query("SELECT * FROM admin_laundry WHERE email='$email' ");
	$cekUsername = mysql_query("SELECT * FROM admin_laundry WHERE username='$username' ");
	
	if(mysql_num_rows($cekUsername)>0){
		echo "Username $username Sudah Ada. ";;
	}if(mysql_num_rows($cekKontak)>0){
		echo "Kontak $kontak Sudah Ada. ";
	}if(mysql_num_rows($cekEmail)>0){
		echo "Email $email Sudah Ada. ";
	}if( (mysql_num_rows($cekEmail)==0) && (mysql_num_rows($cekKontak)==0) && (mysql_num_rows($cekUsername)==0)){ 
		$kueri = mysql_query("INSERT INTO admin_laundry (nama_laundry, username, password, email, 
				alamat, kontak, harga_kg, foto_logo, aktif) VALUES ('$nmLaundry', '$username', '$password', 
				'$email', '$alamat', '$kontak', '$harga', '$logo', '$aktif')");
		if($kueri==TRUE){			
			echo"Berhasil";
			$ops = strrchr($email, "gmail");
			if(!$ops=="gmail.com"){
				$opsi = " Salin alamat URL ini jika link diatas tidak bisa diklik
							$ip/laundry/aktifasi_laundry.php?id=$username&aktif=y";
			}else{
				$opsi = "";
			}
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			$subject = "Verifikasi Apps Laundroid";
			$body	 = "Silahkan Login dengan data, ";
			$body	 .= "<h1>USERNAME : $username";
			$body	 .= ", PASSWORD : $password</h1>";
			$body	 .= "dan <a href='$ip/laundry/aktifasi_laundry.php?id=$username&aktif=y'>klik disini</a> untuk mengaktifkan akun.";
			$body    .= $opsi;
			mail($email,$subject,$body,$headers);
			
		}else{
			echo"Gagal"; 
		}
	}
?>