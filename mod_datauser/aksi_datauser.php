<?php
include ("../config/koneksi.php");
include ("../config/fungsi_thumb.php");
	if($_GET['module']=='tambah'){
		$nama=$_POST['nama'];
		$kontak=$_POST['kontak'];
		$email=$_POST['email'];
		$uname=$_POST['uname'];
		$upass=$_POST['upass'];
		$cek=mysql_query("SELECT username FROM user WHERE username='$nama'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data user $nama sudah ada!');
            window.location.href='../media.php?module=data_user)';
            </script>";
        }
        else{
			$query=mysql_query("INSERT INTO user(nama,kontak,email,username,password) VALUES ('$nama','$kontak','$email','$uname','$upass')");
			header("location:../media.php?module=data_user");
        }
	}
	elseif($_GET['module']=='edit'){
		$id=$_POST['id'];
		$nama=$_POST['nama'];
		$kontak=$_POST['kontak'];
		$email=$_POST['email'];
		$uname=$_POST['uname'];
		$upass=$_POST['upass'];
		$cek=mysql_query("SELECT username FROM user WHERE username='$nama'");
        $num=mysql_num_rows($cek);
        if($num>=1){
            echo "<script>
            alert('Data user $nama sudah ada!');
            window.location.href='../media.php?module=data_user)';
            </script>";
        }
        else{
			$query=mysql_query("UPDATE user SET nama='$nama',kontak='$kontak',email='$email',username='$uname',password='$upass' WHERE id_user='$id'");
			header("location:../media.php?module=data_user");
        }
	}
?>