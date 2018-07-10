<?php
include ("../config/koneksi.php");
$kode=$_POST['q'];
$query=mysql_query("SELECT * FROM pasien WHERE no_rm = ".$kode." ");
$r=mysql_fetch_array($query);
$num=mysql_num_rows($query);
if($num>=1){
    $status="pasien";
    ?>
    <div class="rm_info">
                            
        <div>
			<div class="control-group ">
				<label class="control-label" for="inputText">No. Rekam Medis</label>
				<div class="controls">
				<input type="text" class="span4" id="inputText" value="<?php echo $r['no_rm']; ?>" disabled>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputText">Nama Pasien</label>
				<div class="controls">
				<input type="text" class="span4" id="inputText" value="<?php echo $r['nama_pasien']; ?>" disabled>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputText">Tanggal Lahir</label>
				<div class="controls">
				<input type="date" class="span4" id="inputText" value="<?php echo $r['tgl_lahir']; ?>" disabled>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputText">Jenis Kelamin</label>
				<div class="controls">
				<input type="text" class="span4" id="inputText"  value="<?php echo $r['jenis_kelamin']; ?>" disabled>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputText">Alamat</label>
				<div class="controls">
				<textarea class="span4" disabled><?php echo $r['alamat']; ?></textarea>
				</div>
			</div>
			
			<div class="control-group">
				<div class="controls">								
				<button type="button" class="btn btn-success" onclick="window.location='media.php?module=rekam_medik&&status=pasien&&kodepasien=<?php echo $r['no_rm'] ?>'"><i class="icon-ok-circle icon-white"></i> Proses</button>
				</div>
			</div>
		</div>
    <?php
}
?>
                        