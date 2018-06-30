<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$nadia=$_POST['nadia'];
		$ket=$_POST['ket'];
		$query=mysql_query("INSERT INTO diagnosa (nama_diagnosa, keterangan) VALUES ('$nadia','$ket')");
		header("location:../media.php?module=diagnosa");
	
	}
	elseif($_GET['module']=='hapus'){		
		$id_diagnosa=$_GET['id_diagnosa'];
		$query=mysql_query("DELETE FROM diagnosa WHERE id_diagnosa='$id_diagnosa'");
		header("location:../media.php?module=diagnosa");		
	}
	elseif($_GET['module']=='edit'){
		$id_diagnosa=$_POST['id_diagnosa'];
		$nadia=$_POST['nadia'];
		$ket=$_POST['ket'];
		$query=mysql_query("UPDATE diagnosa SET nama_diagnosa='$nadia', keterangan='$ket' WHERE id_diagnosa='$id_diagnosa'");
		header("location:../media.php?module=diagnosa");	
		}
?>