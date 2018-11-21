<?php
require_once('proses/obat.php');
$obt = new Obat();

// Simpan obat
if ($_POST['smp-obt']) {
    $namaObat = $_POST['namaObat'];
    $hrgObat = $_POST['hrgObat'];
    $ket = $_POST['ket'];
    $obt->tambahObat($namaObat,$hrgObat,$ket);
    //header("location:index.php?kanal=ms_obat");
}
// Update obat
if ($_POST['upd-obt']) {
    $idObat = $_POST['idObat'];
    $namaObat = $_POST['namaObat'];
    $hrgObat = $_POST['hrgObat'];
    $ket = $_POST['ket'];
    $obt->editObat($idObat,$namaObat,$hrgObat,$ket);
    //header("location:index.php?kanal=ms_obat");
}
// Hapus obat
if ($_GET['act']=='hapus') {
    $idObat = $_GET['id'];
    $obt->hapusObat($idObat);
    header("location:index.php?kanal=ms_obat");
}
?>
<div class="row">
<!--Tambah data-->
    <div class="col-sm-5 col-md-4 col-md-push-8 col-sm-push-7">
    <?php
    if ($_GET['act'] == 'tambah') {
    ?>
        <legend>Tambah Data</legend>
             
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="">Nama Obat</label>
                <input type="text" class="form-control" id="namaObat" name="namaObat">
            </div>
            <div class="form-group">
                <label for="">Harga Obat</label>
                <input type="number" class="form-control" id="hrgObat" name="hrgObat">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="ket" class="form-control" id="ket" cols="30" rows="4"></textarea>
            </div>
        
            <input type="submit" class="btn btn-primary" name="smp-obt" value="Simpan">
        </form>
    <?php } ?>

<!--Edit data-->
    <?php 
    if ($_GET['act'] == 'edit') {
        $id = $_GET['id'];
        $data = $obt->getObat($id);
    ?>
    <div class="row">
    <legend>Edit Data</legend>
                
        <form action="" method="POST" role="form">
            <div class="form-group">
                <label for="" class="control-label">Id Obat</label>
                <input type="text" class="form-control" id="idObat" name="idObat" value="<?=$id?>" readonly>
            </div>
            <div class="form-group">
                <label for="">Nama Obat</label>
                <input type="text" class="form-control" id="namaObat" name="namaObat" value="<?=$data['nama_obat']?>">
            </div>
            <div class="form-group">
                <label for="">Tgl. Lahir</label>
                <input type="number" class="form-control" id="hrgObat" name="hrgObat" value="<?=$data['harga_obat']?>">
            </div>
            <div class="form-group">
                <label for="">Keterangan</label>
                <textarea name="ket" class="form-control" id="ket" cols="30" rows="4"><?=$data['keterangan']?></textarea>
            </div>
        
            <input type="submit" class="btn btn-primary" name="upd-obt" value="Update">
        </form>
    </div>
    <?php }?>
    </div>
    
    <!--Tampil data-->
    <div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
        <legend>Master Obat</legend>
        <a href="?kanal=ms_obat&act=tambah" class="btn btn-primary btn-sm glyphicon glyphicon-plus-sign"> Tambah</a>
        <p></p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Harga Obat</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$obt->tampilObat()?>
                </tbody>
            </table>
        </div>
    </div>
</div>