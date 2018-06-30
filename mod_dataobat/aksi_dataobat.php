<?php
include ("../config/koneksi.php");
$kodeobat=$_GET['kode_obat'];
	if($_GET['module']=='tambah'){
		$nabot=$_POST['namaObat'];
		$habot=$_POST['hargaObat'];
		$ket=$_POST['keterangan'];
		$query=mysql_query("INSERT INTO obat (nama_obat, harga_obat, keterangan) VALUES ('$nabot','$habot','$ket')");
		header("location:../media.php?module=dataobat");
	
	}
	elseif($_GET['module']=='hapus'){		
		$query=mysql_query("DELETE FROM obat WHERE id_obat='$kodeobat'");
		header("location:../media.php?module=dataobat");		
	}
	elseif($_GET['module']=='edit'){
		$nabot=$_POST['namaObat'];
		$habot=$_POST['hargaObat'];
		$ket=$_POST['keterangan'];
		$idbat=$_POST['idObat'];
		
		$query=mysql_query("UPDATE obat SET nama_obat='$nabot', harga_obat='$habot',  keterangan='$ket' WHERE id_obat='$idbat'");
		header("location:../media.php?module=dataobat");
	
		
		}
		?>