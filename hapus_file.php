<?php

	$pathHps = $_SERVER['DOCUMENT_ROOT']."/laundry/uploads/";
	$dataFoto = $_GET['logo'];
	$tmp = unlink($pathHps.$dataFoto);			
	
	if($tmp==TRUE){
		echo"Berhasil";
	}else{
		echo"Gagal"; 
	}


?>