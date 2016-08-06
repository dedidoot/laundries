<?php
	include "koneksi.php";
	
	//$skrg = date("Y/m/d");
	$nm_laundry = $_GET['id_laundry'];
	$waktu1 = $_GET['waktu1'];
	$waktu2 = $_GET['waktu2'];
	
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nm_laundry' ");
	$id_laundry = mysql_fetch_array($idDry);
	
	$result1 = array();
	$result2 = array();
	$kueri = mysql_query("SELECT nt.id_pelanggan, plg.username, fk.transaksi, fk.total_bayar FROM nota nt
					JOIN faktur fk ON fk.id_nota=nt.id_nota JOIN pelanggan plg ON nt.id_pelanggan=plg.id_pelanggan 
					WHERE nt.id_laundry='$id_laundry[id_laundry]' 
					AND (fk.transaksi BETWEEN '$waktu1' AND '$waktu2') AND nt.status='y' ");			
			
	if(mysql_num_rows($kueri)>0){
		$result1['jum_plg'] = mysql_num_rows($kueri); 
		while($dataWrn = mysql_fetch_array($kueri)){
			$result1['id_pelanggan'] = $dataWrn['id_pelanggan']; 			
			$result1['username'] = $dataWrn['username']; 			
			$result1['transaksi'] = $dataWrn['transaksi']; 			
			$result1['total_bayar'] = $dataWrn['total_bayar']; 		
			array_push($result2, $result1);
		} 
		$datWrn = json_encode($result2);
		echo "{\"list_penghasilan\":" . $datWrn . "}";	
	}else{
		echo "Data tidak ada";
	}
?>