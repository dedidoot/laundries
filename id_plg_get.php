<?php
	include "koneksi.php";
		
	$skrg = date("Y/m/d");
	
	$nmLaundry = $_GET['idLaundry'];
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$result1 = array();
	$result2 = array();
	/* $kueriWrn = mysql_query("SELECT plg.id_pelanggan, plg.username, plg.alamat, plg.kontak, nt.id_nota FROM pelanggan 
							 plg JOIN nota nt ON plg.id_pelanggan=nt.id_pelanggan WHERE '$skrg' >= nt.tgl_ambil
							 AND nt.status = 'n' AND nt.id_laundry='$idLaundry[id_laundry]' "); */
		
		$kueriWrn = mysql_query("SELECT plg.id_pelanggan, plg.username, plg.alamat, plg.kontak, nt.id_nota FROM pelanggan 
							 plg JOIN nota nt ON plg.id_pelanggan=nt.id_pelanggan WHERE nt.status = 'n' AND nt.id_laundry='$idLaundry[id_laundry]' 
							 ORDER BY id_nota DESC ");
		
	
	if(mysql_num_rows($kueriWrn)>0){
		while($dataWrn = mysql_fetch_array($kueriWrn)){
			$result1['id_pelanggan'] = $dataWrn['id_pelanggan']; 
			$result1['id_nota'] = $dataWrn['id_nota']; 
			//$result1['nama_pakaian'] = $dataWrn['nama_pakaian']; 		
			array_push($result2, $result1);
		} 
		$datWrn = json_encode($result2);
		echo "{\"list_pelanggan\":" . $datWrn . "}";	
	}else{
		echo "Data tidak ada";
	}
?>