<?php 		 
	include "koneksi.php";

	$getSearch = $_GET['search'];	
	$result1 = array();
	$result2 = array();
	
	$nmLaundry = $_GET['nm_laundry'];
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$cekData = mysql_query("SELECT nama_pakaian FROM pakaian WHERE nama_pakaian LIKE '%$getSearch%' 
					AND id_laundry='$idLaundry[id_laundry]' ");
	//$cekData = mysql_query("SELECT nama_pakaian FROM pakaian WHERE nama_pakaian='$getSearch' ");
	
	if( mysql_num_rows($cekData)>0) {
		while($nmPkn = mysql_fetch_array($cekData)){		
			$result1['nama_pakaian'] = $nmPkn['nama_pakaian']; 
			array_push($result2, $result1);		
		}
		$datPkn = json_encode($result2);
		echo "{\"get_pakaian\":" . $datPkn . "}";	
	} else {
			echo"Data tidak ditemukan";
	}
	
	
	
?>