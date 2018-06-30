<?php
include ("../config/koneksi.php");
$kode=$_POST['q'];
$query=mysql_query("SELECT * FROM rekammedik, dokter WHERE rekammedik.nomorRm='$kode' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
$r=mysql_fetch_array($query);
$nomrm=$r['nomorRm'];
?>
<hr>
