<?php 
	include "koneksi.php";
	
	$transaksi = $_POST['transaksi'];
	$bayar     = $_POST['jum_byr'];
	$cek       = $_POST['cek'];
	$idplg     = $_POST['idplg'];
	$idnota    = $_POST['idnota'];
	
	$kueri = mysql_query("UPDATE nota SET status='$cek' WHERE id_pelanggan='$idplg' 
							AND id_nota='$idnota' ");
	
	$kueri2 = mysql_query("INSERT INTO faktur (id_nota, transaksi, total_bayar) 
							VALUES ('$idnota','$transaksi','$bayar') ");
						
	if(($kueri==TRUE)AND($kueri2==TRUE)){			
		echo"Berhasil update";
	}else{
		echo"Gagal"; 
	}
	
?>