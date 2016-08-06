<?php 
	include "../koneksi.php";

	//$nama = $_GET['nama'];
	$nama = $_GET['nama'];
	$pass = $_GET['pass'];
	$email = $_GET['email'];
	
	$kueri = mysql_query("UPDATE admin_server SET username='$nama', password='$pass', email='$email' 
				WHERE id_admin=1 ");
	
	if($kueri==TRUE){
	echo"sip";
		/* echo "<script type='text/javascript'>";
			echo "alert('Berhasil Simpan data')";
		echo "</script>"; */
	}else{
	echo"kagak";
		/* echo "<script type='text/javascript'>";
			echo "alert('Gagal Simpan data')";
		echo "</script>"; */
	}
	
?>