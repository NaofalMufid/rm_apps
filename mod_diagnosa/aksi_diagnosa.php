<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambah'){
		$nadia=$_POST['nadia'];
		$ket=$_POST['ket'];
		$cek=mysql_query("SELECT nama_diagnosa FROM diagnosa WHERE nama_diagnosa='$nadia'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data diagnosa $nadia sudah ada!');
            window.location.href='../media.php?module=diagnosa';
            </script>";
        }
        else{
			$query=mysql_query("INSERT INTO diagnosa (nama_diagnosa, keterangan) VALUES ('$nadia','$ket')");
			header("location:../media.php?module=diagnosa");
        }
	}
	elseif($_GET['module']=='edit'){
		$id_diagnosa=$_POST['id_diagnosa'];
		$nadia=$_POST['nadia'];
		$ket=$_POST['ket'];
		$cek=mysql_query("SELECT nama_diagnosa FROM diagnosa WHERE nama_diagnosa='$nadia'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data diagnosa $nadia sudah ada!');
            window.location.href='../media.php?module=diagnosa';
            </script>";
        }
        else{
			$query=mysql_query("UPDATE diagnosa SET nama_diagnosa='$nadia', keterangan='$ket' WHERE id_diagnosa='$id_diagnosa'");
			header("location:../media.php?module=diagnosa");	
        }
}
?>