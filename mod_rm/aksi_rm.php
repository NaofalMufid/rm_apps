<?php
include ("../config/koneksi.php");
	if($_GET['module']=='tambahrm'){
		$tgl= $_POST['tgl_trs'];
		$id=$_POST['nounik'];
		$anms=$_POST['anamnesa'];
		$id_dgs=$_POST['id_dgs'];
		$norm=$_POST['norm'];
		
		// filter tanggal
		$stmt = mysql_query("SELECT tanggal_transaksi FROM transaksi WHERE no_rm='$norm' AND tanggal_transaksi='$tgl'");
		$row=mysql_fetch_array($stmt);
			
		if($row['tanggal_transaksi']==$tgl) {
			echo "<script>
			alert('Maaf rekam medis tanggal $tgl sudah pernah.');
			history.back(self);
			</script>";
		}else{
			$query=mysql_query("INSERT INTO transaksi VALUES
			('$id','$tgl','$anms','$id_dgs','$norm')");
			echo "<script>history.back(self);</script>";
		}
	}
    elseif($_GET['module']=='tambahracik'){
        $kode_resep=$_POST['kode_resep'];
        $id_obt=$_POST['id_obt'];
        $pemakaian=$_POST['pemakaian'];
        $idTrs=$_POST['idTrs'];
        $tgl=$_POST['tgl_td'];
        $qty=$_POST['qty'];
        $harga=$_POST['harga'];
        $jumlah=$_POST['jumlah'];
        $query=mysql_query("INSERT INTO detail_transaksi_obat VALUES('$kode_resep','$id_obt','$pemakaian','$idTrs','$tgl','$qty','$harga','$jumlah')");
        echo "<script>history.back(self);</script>";
    }
?>