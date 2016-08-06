<script   src="jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){	
		$("#oke").click(function(){
			var tmp="";
			var name = $("#username").val();
			var pass = $("#password").val();
			var email = $("#email").val();			
			$.get("update_akun.php?nama="+name+"&pass="+pass+"&email="+email, function(data, status){
				alert(data);
			});			 
			
				/* $.post("update_akun.php",{
					nama: name,
					pass: passw,
					email: emailw
				},function(data,status){
					alert("Data: "+status+data);
				}); */
		});		
	});
</script>

<?php 	
	
?>

<center>
<form action="?okei" method="GET">
	<p><h3>Ubah Akun</h3></p>
	<p><input  id="username" value="" placeholder="Username" /></p>
	<p><input id="password" value=""placeholder="Password" /></p>
	<p><input id="email" value="" placeholder="Email" /></p>
	<input type="submit" value="Simpan" id="oke" />
</form>
</center>