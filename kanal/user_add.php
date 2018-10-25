<!--Tambah data-->
<div class="panel panel-primary alert alert-dissmisable alert-info" id="panelTambahUser">
        <div class="panel-heading">
        <span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah Data
        <div type="button" class="close" data-dismiss="alert">&times;</div>
        </div>
        <div class="panel-body">
        <form action="" method="POST" role="form" data-toggle="validator">
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
            
                <input type="submit" class="btn btn-primary" name="smp-usr" value="Simpan">
            </form>
        </div>
</div>