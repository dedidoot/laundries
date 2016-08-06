<?php

	include "../koneksi.php";
  
	//$skrg = date("Y/m/d");
	$nm_laundry = $_GET['id_laundry'];
	$idDry = mysql_query("SELECT nama_laundry, id_laundry, alamat FROM admin_laundry WHERE username='$nm_laundry' ");
	$id_laundry = mysql_fetch_array($idDry);
	
	$waktu1 = $_GET['waktu1'];
	$waktu2 = $_GET['waktu2'];
	 
	$result1 = array();
	$result2 = array();
	$hasil = mysql_query("SELECT nt.id_pelanggan, plg.username, fk.transaksi, fk.total_bayar FROM nota nt
					JOIN faktur fk ON fk.id_nota=nt.id_nota JOIN pelanggan plg ON nt.id_pelanggan=plg.id_pelanggan 
					WHERE nt.id_laundry='$id_laundry[id_laundry]' 
					AND (fk.transaksi BETWEEN '$waktu1' AND '$waktu2') AND nt.status='y' ");	
	
	$jum1 = strlen($waktu1);
	$jum2 = strlen($waktu2);
	
	if(($jum1==10)AND($jum2==10)){	
		$time1 = substr($waktu1,5,2);
		$time2 = substr($waktu2,5,2);	
		$tgl1 = substr($waktu1,8,2);
		$tgl2 = substr($waktu2,8,2);
	}else{
		$time1 = substr($waktu1,5,1);
		$time2 = substr($waktu2,5,1);	
		$tgl1 = substr($waktu1,7,2);
		$tgl2 = substr($waktu2,7,2);
	}
		$th1 = substr($waktu1,0,4);
		$th2 = substr($waktu2,0,4);
	
	switch($time1){
		case "01": $time1="Januari"; break; case "1": $time1="Januari"; break;
		case "02": $time1="Februari"; break; case "2": $time1="Februari"; break;
		case "03": $time1="Maret"; break; case "3": $time1="Maret"; break;
		case "04": $time1="April"; break; case "4": $time1="April"; break;
		case "05": $time1="Mei"; break; case "5": $time1="Mei"; break;
		case "06": $time1="Juni"; break; case "6": $time1="Juni"; break;
		case "07": $time1="Juli"; break; case "7": $time1="Juli"; break;
		case "08": $time1="Agustus"; break; case "8": $time1="Agustus"; break;
		case "09": $time1="September"; break; case "9": $time1="September"; break;
		case "10": $time1="Oktober"; break;
		case "11": $time1="November"; break;
		case "12": $time1="Desember"; break;
	}switch($time2){
		case "01": $time2="Januari"; break; case "1": $time2="Januari"; break;
		case "02": $time2="Februari"; break; case "2": $time2="Februari"; break;
		case "03": $time2="Maret"; break; case "3": $time2="Maret"; break;
		case "04": $time2="April"; break; case "4": $time2="April"; break;
		case "05": $time2="Mei"; break; case "5": $time2="Mei"; break;
		case "06": $time2="Juni"; break; case "6": $time2="Juni"; break;
		case "07": $time2="Juli"; break; case "7": $time2="Juli"; break;
		case "08": $time2="Agustus"; break; case "8": $time2="Agustus"; break;
		case "09": $time2="September"; break; case "9": $time2="September"; break;
		case "10": $time2="Oktober"; break;
		case "11": $time2="November"; break;
		case "12": $time2="Desember"; break;
	}

	if (mysql_num_rows($hasil)>0) {
		
		//Definisi
		define('FPDF_FONTPATH','font/');
		require('fpdf.php');

		class PDF extends FPDF{
		   function FancyTable(){	
		   
				$nm_laundry = $_GET['id_laundry'];
				$idDry = mysql_query("SELECT nama_laundry, id_laundry, alamat FROM admin_laundry WHERE username='$nm_laundry' ");
				$id_laundry = mysql_fetch_array($idDry);			
				 				 
				$waktu1 = $_GET['waktu1'];
				$waktu2 = $_GET['waktu2'];
				 
				$result1 = array();
				$result2 = array();
				
				$hasil = mysql_query("SELECT nt.id_pelanggan, plg.username, fk.transaksi, fk.total_bayar FROM nota nt
						JOIN faktur fk ON fk.id_nota=nt.id_nota JOIN pelanggan plg ON nt.id_pelanggan=plg.id_pelanggan 
						WHERE nt.id_laundry='$id_laundry[id_laundry]' 
						AND (fk.transaksi BETWEEN '$waktu1' AND '$waktu2') AND nt.status='y' ");					

				$w=array(10,25,30,40,40);
				$no = 1;
				$jumlah = 0;
				while($data = mysql_fetch_array($hasil)){		
					$this->Ln();
					$this->SetX(40);
					$this->Cell($w[0],6,$no,1,0,'C');
					$this->Cell($w[1],6,$data['id_pelanggan'],1,0,'C');
					$this->Cell($w[2],6,$data['username'],1,0,'C');
					$this->Cell($w[3],6,$data['transaksi'],1,0,'C');
					$this->Cell($w[4],6,$data['total_bayar'],1,0,'C');           
					$jumlah = $jumlah + $data['total_bayar'];
					$no++;
				}
				$this->Ln(); 			
				$this->SetX(39); 	
				$this->Cell(100,10,"Pendapatan yang didapat sebesar: ");			
				$this->SetFont('arial','B',10); 
				//$this->SetX(95); 
				$this->Cell(45,10,"Rp. ".$jumlah,0,1,'C');
				$this->Cell(array_sum($w));			
			}
		}
		
		//Instanciation of inherited class
		$A4[0]=210;
		$A4[1]=297;
		$Q[0]=216;
		$Q[1]=279;
		$pdf=new PDF('P','mm',$A4);
		$pdf->Open();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetTitle('Pendapatan periode');
		$pdf->SetAuthor('(c) laundroid'.$y);
		$pdf->SetCreator('Fushion Apps');
		$pdf->SetFont('arial','B',12);
		$thn = date('Y');
		$tgl = date('d M Y');
		$pdf->Cell(0,5,'DAFTAR PENDAPATAN',0,1,'C');
		$pdf->Cell(0,5,"PERIODE : $tgl1 $time1 $th1 - $tgl2 $time2 $th2",0,1,'C');
		$pdf->Ln(10);
		$pdf->SetFont('arial','B',9);
		$pdf->SetLineWidth(.1);
		$pdf->SetFillColor(229,229,229);
		$pdf->SetX(40);
		$pdf->Cell(10,10,'No.',1,0,'C',true);
		$pdf->Cell(25,10,'ID Pelanggan',1,0,'C',true);
		$pdf->Cell(30,10,'Nama Pelanggan',1,0,'C',true);
		$pdf->Cell(40,10,'Transaksi',1,0,'C',true);
		$pdf->Cell(40,10,'Total',1,0,'C',true);	
		$pdf->SetFont('arial','',9);
		$pdf->FancyTable();
		$pdf->SetFont('arial','',9);
		$pdf->Ln(15);
		$pdf->SetX(135);
		$pdf->Cell(30,5,$id_laundry['alamat'].", ".$tgl,0,1,'L',false);
		$pdf->SetX(135);
		$pdf->Cell(30,5,'Mengetahui, ',0,1,'L',false);
		$pdf->Ln(20);
		$pdf->SetX(135);
		$pdf->Cell(60,5,"Owner Laundry ".$id_laundry['nama_laundry'],0,1,'L',false);
		
		$pdf->Output('Laporan_pendapatan.pdf','I'); //D=Download, I= ,
	} else {
		echo "<h1>Maaf, data tidak ditemukan</h1><br>".$query;
	}
?>