<?php 
	include "koneksi.php";	 
	
	$nmWrn = $_GET['srchPlg'];
	$skrg = date("Y/m/d");
	
	$nmLaundry = $_GET['idLaundry'];
	$idDry = mysql_query("SELECT id_laundry FROM admin_laundry WHERE username='$nmLaundry' ");
	$idLaundry = mysql_fetch_array($idDry);
	
	$result1 = array();
	$result2 = array();		
	$data = mysql_query("SELECT plg.id_pelanggan, username, alamat, kontak, id_nota FROM pelanggan 
							 plg JOIN nota nt ON plg.id_pelanggan=nt.id_pelanggan AND nt.status = 'n' 
							 AND nt.id_laundry='$idLaundry[id_laundry]' WHERE plg.id_pelanggan LIKE '%$nmWrn%'");
	
	while($dt = mysql_fetch_array($data)){
		$result1['id_pelanggan'] = $dt['id_pelanggan'];
		$result1['id_nota'] = $dt['id_nota'];
		array_push($result2, $result1);
	}
	
	$dataku = json_encode($result2);
	echo "{\"list_pelanggan\":" . $dataku . "}"; 
?>