<?php
require_once('proses/user.php');
$usr = new User();

// Simpan user
if ($_POST['smp-usr']) {
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $level = $_POST['level'];
    $usr->tambahUser($nama,$kontak,$email,$username,$password,$level);
    //header("location:index.php?kanal=ms_user");
}
// Update user
if ($_POST['upd-usr']) {
    $idusr = $_POST['idusr'];
    $nama = $_POST['nama'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $level = $_POST['level'];
    $usr->editUser($idusr,$nama,$kontak,$email,$username,$password,$level);
    //header("location:index.php?kanal=ms_user");
}
// Hapus user
if ($_GET['act']=='hapus') {
    $idusr = $_GET['id'];
    $usr->hapususer($idusr);
    header("location:index.php?kanal=ms_user");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master User</title>
</head>
<body>

<div class="row">
    <div class="col-sm-5 col-md-4 col-md-push-8 col-sm-push-7">
        <span class="dataDinamis"></span>
    </div>
    
    <!--Tampil data-->
    <div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
        <legend>Master User</legend>
        
        <button type="button" class="btn btn-primary btn-sm" id="tambah-user">
            <span class="glyphicon glyphicon-plus"></span> Tambah Data User
        </button>
        
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kontak</th>
                        <th>E-mail</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?=$usr->tampiluser()?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>