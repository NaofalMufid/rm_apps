<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$tgl1=$_GET['tgl1'];
$tgl2=$_GET['tgl2'];
$manajer=$_GET['manajer']    
?>
<!doctype html>
<html>
    <head>
        <title>Laporan Data Pemeriksaan</title>
        <link rel="shortcut icon" href="../img/laporan.png">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body>
        <div class="span10 ">
        <br>
            <h2>SYSTEM APLIKASI REKAM MEDIS</h2>
            <p><?=tgl_indo($tgl1)?> / <?=tgl_indo($tgl2)?></p>    
        <div class="batas"></div>
        <table class="table table-bordered">
                <tr>
                    <th colspan="2">Laporan Data Pemeriksaan</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Nama Diagnosa</th>
                    <th>Anamesa</th>
                    <th>Tanggal Transaksi</th>
                </tr>
        <?php
        $query=mysql_query("SELECT pasien.nama_pasien,pasien.jenis_kelamin,diagnosa.nama_diagnosa,transaksi.anamesa,transaksi.tanggal_transaksi FROM transaksi, pasien, diagnosa WHERE transaksi.no_rm=pasien.no_rm AND transaksi.id_diagnosa=diagnosa.id_diagnosa ORDER BY transaksi.tanggal_transaksi DESC");
        $num = mysql_num_rows($query);
        $no=1;
        while ($r=mysql_fetch_array($query)) {
        ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$r['nama_pasien']?></td>
                    <td><?=$r['jenis_kelamin']?></td>
                    <td><?=$r['nama_diagnosa']?></td>
                    <td><?=$r['anamesa']?></td>
                    <td><?=tgl_indo($r['tanggal_transaksi'])?></td>
                </tr>
        <?php
        $no++;
        }
        ?>        
                <tr>
                    <th colspan="6">Total data : <?=$num?></th>
                </tr>
        </table>
        <div class="span4 offset6">
            <p>Wonosobo, <?php echo tgl_indo(date('Y-m-d')); ?></p>
            <p>Jr Manajer Personalia &amp; Kesejahteraan</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p><?php echo $manajer; ?></p>
        </div>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>