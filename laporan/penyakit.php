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
        <title>Laporan Data Penyakit</title>
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
                    <th colspan="2">Laporan Data Penyakit</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Nama Penyakit</th>
                    <th>Keterangan</th>
                </tr>
        <?php
        $query=mysql_query("SELECT * FROM diagnosa");
        $num = mysql_num_rows($query);
        $no=1;
        while ($r=mysql_fetch_array($query)) {
        ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$r['nama_diagnosa']?></td>
                    <td><?=$r['keterangan']?></td>
                </tr>
        <?php
        $no++;
        }
        ?>        
                <tr>
                    <th colspan="3">Total data : <?=$num?></th>
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