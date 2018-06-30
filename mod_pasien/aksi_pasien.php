<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah_pasien'){
		$no_rm=$_POST['no_rm'];
        $nama=$_POST['nama'];
		$tgl=$_POST['tgl_lahir'];
		$almt = $_POST['alamat'];
        $jkl= $_POST['jk'];
		$cek=mysql_query("SELECT * FROM pasien WHERE no_rm='$no_rm'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data pasien sudah ada!');
            window.location.href='../media.php?module=data_pasien';
            </script>";
            
        }
        else{
        $query=mysql_query("INSERT INTO pasien (no_rm,nama_pasien,tgl_lahir,alamat,jenis_kelamin) VALUES ('$no_rm','$nama','$tgl','$almt','$jkl')");
		header("location:../media.php?module=data_pasien");	
        }
	}elseif($_GET['module']=='edit_pasien'){
		$no_rm=$_POST['no_rm'];
        $nama=$_POST['nama'];
		$tgl=$_POST['tgl_lahir'];
		$almt = $_POST['alamat'];
		$jkl= $_POST['jk'];	

		$query=mysql_query("UPDATE pasien SET nama_pasien ='$nama',
											tgl_lahir='$tgl',
											alamat='$almt',
											jenis_kelamin='$jkl'
											WHERE no_rm='$no_rm'");
		header("location:../media.php?module=data_pasien");
	}
	?>