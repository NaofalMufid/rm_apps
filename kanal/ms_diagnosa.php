<?php
require_once('proses/diagnosa.php');
$dgs = new Diagnosa();

// Simpan diagnosa
if ($_POST['smp-dgs']) {
    $nama = $_POST['nama_dgs'];
    $keterangan = $_POST['keterangan'];
    $dgs->tambahDiagnosa($nama,$keterangan);
    //header("location:index.php?kanal=ms_diagnosa");
}
// Update diagnosa
if ($_POST['upd-dgs']) {
    $iddgs = $_POST['iddgs'];
    $nama = $_POST['nama_dgs'];
    $keterangan = $_POST['keterangan'];
    $dgs->editDiagnosa($iddgs,$nama,$keterangan);
    //header("location:index.php?kanal=ms_diagnosa");
}
// Hapus diagnosa
if ($_GET['act']=='hapus') {
    $iddgs = $_GET['id'];
    $dgs->hapusDiagnosa($iddgs);
    header("location:index.php?kanal=ms_diagnosa");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Diagnosa</title>
</head>
<body>

<div class="row">
<!--Tambah data-->
    <div class="col-sm-5 col-md-4 col-md-push-8 col-sm-push-7">
    <?php
    if ($_GET['act'] == 'tambah') {
    ?>
        <legend>Tambah Data</legend>
             
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Nama Diagnosa</label>
                <input type="text" class="form-control" id="nama_dgs" name="nama_dgs">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
                    
            <input type="submit" class="btn btn-primary" name="smp-dgs" value="Simpan">
        </form>
    <?php } ?>

<!--Edit data-->
    <?php 
    if ($_GET['act'] == 'edit') {
        $id = $_GET['id'];
        $data = $dgs->getDiagnosa($id);
    ?>
    <legend>Edit Data</legend>
                
        <form action="" method="POST" role="form">
            <div class="form-group">
                <input type="hidden" class="form-control" id="iddgs" name="iddgs" value="<?=$id?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Diagnosa</label>
                <input type="text" class="form-control" id="nama_dgs" name="nama_dgs" value="<?=$data['nama_diagnosa']?>">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?=$data['keterangan']?>">
            </div>
            <input type="submit" class="btn btn-primary" name="upd-dgs" value="Update">
        </form>
    <?php }?>
    </div>
    
    <!--Tampil data-->
    <div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
        <legend>Master Diagnosa</legend>
        <a href="?kanal=ms_diagnosa&act=tambah" class="btn btn-primary btn-sm glyphicon glyphicon-plus-sign"> Tambah</a>
        <p></p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Diagnosa</th>
                        <th>keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$dgs->tampilDiagnosa()?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>