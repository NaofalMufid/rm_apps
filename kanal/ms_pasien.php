<?php
require_once('proses/pasien.php');
$psn = new Pasien();

// Simpan pasien
if ($_POST['smp-psn']) {
    $norm = $_POST['norm'];
    $nama = $_POST['nama'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $psn->tambahPasien($norm,$nama,$tgllahir,$alamat,$jk);
    //header("location:index.php?kanal=ms_pasien");
}
// Update pasien
if ($_POST['upd-psn']) {
    $norm = $_POST['norm'];
    $nama = $_POST['nama'];
    $tgllahir = $_POST['tgllahir'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $psn->editPasien($norm,$nama,$tgllahir,$alamat,$jk);
    //header("location:index.php?kanal=ms_pasien");
}
// Hapus pasien
if ($_GET['act']=='hapus') {
    $norm = $_GET['id'];
    $psn->hapusPasien($norm);
    header("location:index.php?kanal=ms_pasien");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Pasien</title>
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
                <label for="" class="control-label">No. Rekam Medik</label>
                <input type="text" class="form-control" id="norm" name="norm" value="<?=$psn->buatNo()?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="">Tgl. Lahir</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                
                <div class="form-group">
                    <label for="" class="radio-inline"><input type="radio" name="jk" id="jk" value="L">Laki-laki</label>
                    <label for="" class="radio-inline"><input type="radio" name="jk" id="jk" value="P">Perempuan</label>
                </div>
            </div>
            
        
            <input type="submit" class="btn btn-primary" name="smp-psn" value="Simpan">
        </form>
    <?php } ?>

<!--Edit data-->
    <?php 
    if ($_GET['act'] == 'edit') {
        $id = $_GET['id'];
        $data = $psn->getPasien($id);
    ?>
    <div class="row">
    <legend>Edit Data</legend>
                
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="" class="control-label">No. Rekam Medik</label>
                <input type="text" class="form-control" id="norm" name="norm" value="<?=$id?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama_pasien']?>">
            </div>
            <div class="form-group">
                <label for="">Tgl. Lahir</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" value="<?=$data['tgl_lahir']?>">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="4"><?=$data['alamat']?></textarea>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <div class="form-group">
                    <?php
                    if ($data['jenis_kelamin']=='L') {
                        $jk1='checked';$jk2='';
                    } else {
                        $jk1='';$jk2='checked';
                    }
                    ?>
                    <label for="" class="radio-inline"><input type="radio" name="jk" id="jk" value="L" <?=$jk1?>>Laki-laki</label>
                    <label for="" class="radio-inline"><input type="radio" name="jk" id="jk" value="P" <?=$jk2?>>Perempuan</label>
                </div>
            </div>
            
        
            <input type="submit" class="btn btn-primary" name="upd-psn" value="Update">
        </form>
    </div>
    <?php }?>
    </div>
    
    <!--Tampil data-->
    <div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
        <legend>Master Pasien</legend>
        <a href="?kanal=ms_pasien&act=tambah" class="btn btn-primary btn-sm">Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tgl. Lahir</th>
                        <th>Umur</th>
                        <th>J.K.</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$psn->tampilPasien()?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>