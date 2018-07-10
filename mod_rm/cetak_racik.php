<?php
    include ("../config/koneksi.php");
    include ("../config/fungsi_indotgl.php");
    $rc=$_GET['idrc'];
    $rm=$_GET['idrm'];
    ?>
<!doctype html>
<html>
    <head>
        <title>Racik Obat</title>
        <link rel="shortcut icon" href="../img/laporan.png">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body>
        <div class="span6 offset2">
            <br>
        <div class="batas"></div>
        <?php
        $query=mysql_query("SELECT detail_transaksi_obat.id_detail_transaksi,detail_transaksi_obat.id_transaksi,pasien.no_rm,pasien.nama_pasien,diagnosa.nama_diagnosa,obat.nama_obat,detail_transaksi_obat.pemakaian,detail_transaksi_obat.tgl_transaksi_detail, detail_transaksi_obat.qty,detail_transaksi_obat.harga,detail_transaksi_obat.jumlah FROM detail_transaksi_obat,obat,transaksi,diagnosa,pasien WHERE detail_transaksi_obat.id_detail_transaksi='$rc' AND transaksi.id_transaksi='$rm' AND detail_transaksi_obat.id_transaksi=transaksi.id_transaksi AND transaksi.no_rm=pasien.no_rm AND detail_transaksi_obat.id_obat=obat.id_obat AND transaksi.id_diagnosa=diagnosa.id_diagnosa");
        $r=mysql_fetch_array($query);
        ?>
        <table class="table table-bordered table-striped">
                <tr>
                    <th colspan="2">Racikan Obat</th>
                </tr>
                <tr>
                    <th>No. Transaksi</th>
                    <td><?=$r['id_detail_transaksi']?></td>
                </tr>
                <tr>
                    <th>Pasien</th>
                    <td><?=$r['nama_pasien']?></td>
                </tr>
                <tr>    
                    <th>Diagnosa</th>
                    <td><?=$r['nama_diagnosa']?></td>
                </tr>
                <tr>    
                    <th>Obat</th>
                    <td><?=$r['nama_obat']?></td>
                </tr>
                <tr>
                    <th>QTY</th>
                    <td><?=$r['qty']?></td>
                </tr>
                <tr>    
                    <th>Harga</th>
                    <td><?=$r['harga']?></td>
                </tr>
                <tr>
                    <th colspan="2">Total Bayar : <?=$r['jumlah']?></th>
                </tr>                
        </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>