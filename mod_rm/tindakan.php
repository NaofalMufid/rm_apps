<?php
include ("../config/koneksi.php");
$kode=$_POST['q'];
if($kode==5){
    ?>
    <select name="spesialis" id="tindakan">
										<option disabled selected>Pilih Tindakan</option>
										<?php
										$qtind=mysql_query("SELECT * FROM tindakan,konsul_spesial WHERE konsul_spesial.id_tindakan=tindakan.id_tindakan");
										while($rtind=mysql_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_spesialis']; ?>"><?php echo $rtind['nama_spesialis']; ?></option>
										<?php
										}
										?>
									</select>
    <?php
}
elseif($kode==9){
     ?>
    <select name="rs" id="tindakan" required>
										<option disabled selected>Pilih Rumah Sakit</option>
										<?php
										$qtind=mysql_query("SELECT * FROM rs");
										while($rtind=mysql_fetch_array($qtind)){
										?>
										<option value="<?php echo $rtind['id_rs']; ?>"><?php echo $rtind['nama_rs']; ?></option>
										<?php
										}
										?>
									</select>
    <?php
}
?>