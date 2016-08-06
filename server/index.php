<!DOCTYPE html>
<html>
<head>
    <title>Admin Server Laundroid</title>
	
	
</head>
<body>
<center>
	<table cellspacing="20" cellpadding="10" border="1" height="70%" width="70%">
		<tr align='center'>
			<td colspan="2">Admin Server Apps Laundroid</td>
		</tr>
		<tr>
			<td width="18%"><a href="?#">Home<a/></td>
			<td rowspan="5">
				<?php 
					switch($_GET['klik']){
						case "home" : include "home.php"; break;
						case "tmpt" : include "produktif_laundry.php"; break;
						case "pkn" : include "produktif_pkn.php"; break;
						case "akun" : include "akun.php"; break;
						case "keluar" : include "home.php"; break;
						default : echo"<center><h2>Selamat datang admin server!</h2></center>"; break;
						//default : include "login.php"; break;
					}
				?>
			</td>
		</tr>
		<tr>
			<td><a href="?klik=tmpt">Produktif Laundry<a/></td>			
		</tr>
		<tr>
			<td><a href="?klik=pkn">Produktif Pakaian<a/></td>			
		</tr>
		<tr>
			<td><a href="?klik=akun">Ubah Akun<a/></td>			
		</tr>
		<tr>
			<td><a href="?klik=keluar">Keluar<a/></td>			
		</tr>
	</table>
</center>	
</body>
</html>
