<?php
	session_start();
	include("config/koneksi.php");
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$query=mysql_query("SELECT * FROM user WHERE username='$user' AND password='$pass'");
	$num=mysql_num_rows($query);
	$r=mysql_fetch_array($query);
	
	if($num >= 1){
		$_SESSION['iduser']=$r['id_user'];
		$_SESSION['akses']=$r['level'];
		header("location:media.php?module=home");
	}else{
		echo "
		<script type='text/javascript'>
		alert('Username & Password Anda Salah!');
		history.back(self);
		</script>
		";
	}
?>