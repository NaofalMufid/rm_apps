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
        
        <div class="panel panel-primary">
              <div class="panel-heading">
                    <h3 class="panel-title">User Form</h3>
              </div>
              <div class="panel-body none formData" id=addForm>
                    <h4>User Add</h4>
                    <form class="form" id="userForm">
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                            
                            <div class="form-group">
                                <label for="" class="radio-inline"><input type="radio" name="level" id="level" value="2">Petugas</label>
                                <label for="" class="radio-inline"><input type="radio" name="level" id="level" value="1">Admin</label>
                            </div>
                        </div>
                    
                        
                        <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                        <a href="javascript:void(0);" class="btn btn-success" onclick="userAction('add')">Add User</a>
                    </form>
                        </div>
              <div class="panel-body none formData" id=editForm>
                    <h4>User Edit</h4>
                    <form action="" method="POST" role="form">
                            <input type="hidden" class="form-control" id="idusr" name="idusr" value="<?=$id?>" readonly>
                        <div class="form-group">
                            <label for="">Nama User</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?=$data['nama']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" value="<?=$data['kontak']?>">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?=$data['email']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?=$data['username']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="password" class="form-control" value="<?=$data['password']?>">
                        </div>
                        <div class="form-group">
                            <label for="">Level</label>
                        <div class="form-group">
                            <?php
                            if ($data['level']=='2') {
                                $lvl1='checked';$lvl2='';
                            } else {
                                $lvl='';$lvl2='checked';
                            }
                            ?>
                            <label for="" class="radio-inline"><input type="radio" name="level" id="level" value="2" <?=$lvl1?>>Petugas</label>
                            <label for="" class="radio-inline"><input type="radio" name="level" id="level" value="1" <?=$lvl2?>>Admin</label>
                        </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="upd-usr" value="Update">
                    </form>
              </div>
        </div>
        
    </div>
    
    <!--Tampil data-->
    <div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
        <legend>Master User</legend>
        
        <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a>
        
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

        <!--ambah User-->

    </div>
</div>