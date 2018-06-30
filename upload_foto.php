<?php
include ("config/koneksi.php");
include ("config/fungsi_thumb.php");
$kodeuser=$_POST['kodeuser'];
$photo=$_FILES['fupload']['name'];
uploadPhoto($photo);
$query=mysql_query("UPDATE user_man SET photo='$photo' WHERE kodeUser='$kodeuser'");
header("location:media.php?module=home");
?>