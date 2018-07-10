<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$tgl1=$_GET['tgl1'];
$tgl2=$_GET['tgl2'];
?>
<!doctype html>
<html>
    <head>
        <title>Laporan Data Pasien</title>
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
                    <th colspan="2">Laporan Kunjungan Pasien</th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Waktu Daftar</th>
                </tr>
        <?php
        $query=mysql_query("SELECT * FROM pasien");
        $num = mysql_num_rows($query);
        $no=1;
        while ($r=mysql_fetch_array($query)) {
            $tgl=$r['tgl_lahir'];
            $ambil_thn=substr($tgl,0,4);
            $thn_sekarang=date('Y');
            $umur=$thn_sekarang-$ambil_thn;
        ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$r['nama_pasien']?></td>
                    <td><?=tgl_indo($r['tgl_lahir'])?></td>
                    <td><?=$umur?></td>
                    <td><?=$r['alamat']?></td>
                    <td><?=$r['jenis_kelamin']?></td>
                    <td><?=tgl_indo($r['waktu_daftar'])?></td>
                </tr>
        <?php
        $no++;
        }
        ?>        
                <tr>
                    <th colspan="7">Total data : <?=$num?></th>
                </tr>
        </table>
        <div class="span4 offset6">
            <p>Wonosobo, <?php echo tgl_indo(date('Y-m-d')); ?></p>
            <p>Jr Manajer Personalia &amp; Kesejahteraan</p>
        </div>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>