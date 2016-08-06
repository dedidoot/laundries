<?php

	$pathHps = $_SERVER['DOCUMENT_ROOT']."/laundry/uploads/";
	$dataFoto = $_GET['foto'];
	$tmp = unlink($pathHps.$dataFoto);			
	
	if($tmp==TRUE){
		echo"Berhasil Update Semua";
	}else{
		echo"Gagal Update Semua"; 
	}


?>