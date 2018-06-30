<?php
$aksi="mod_pasien/aksi_pasien.php";
switch($_GET['act']){
	default:
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  $("#txtcari").keyup(function() {
		   var strcari = $("#txtcari").val();
		   if (strcari != "")
		   {
		   $("#tabel_awal").css("display", "none");

			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"mod_pasien/cari.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);
			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "none");
		   $("#tabel_awal").css("display", "block");
		   }
		  });
			});
	</script>
	<?php
	$p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Data Pasien</li>
			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=data_pasien&&act=tambah_pasien'"><i class="icon-plus icon-white"></i> Tambah Pasien</button>
            
            
		</div>
		<form class="form-search pull-right">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-search"></i></span>
								<input class="span3" id="txtcari" type="text" placeholder="Search">
							</div>
		</form>
		<hr>
		<div class="row-fluid">
			<div class="span12 pull-left">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr class="head1">
							<td>No</td><td>No. Rekam Medis</td><td>Nama Pasien</td><td>Tanggal Lahir</td><td>Usia</td><td>Alamat</td><td>Jenis Kelamin</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT *, YEAR(CURDATE()) - YEAR(tgl_lahir) AS usia FROM pasien ORDER BY nama_pasien ASC LIMIT $posisi,$batas");
					$no=$posisi+1;
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td><td><?php echo $r['no_rm']; ?></td><td><?php echo $r['nama_pasien']; ?></td><td><?php echo tgl_indo($r['tgl_lahir']); ?></td><td><?php echo $r['usia']; ?></td><td><?php echo $r['alamat']; ?></td><td><?php echo $r['jenis_kelamin']; ?></td>
                            
                            <td>
								<a href="<?php echo "media.php?module=data_pasien&&act=edit_pasien&&noRm=$r[no_rm]";?>" class="btn btn-info"><i class="icon-edit"></i> Edit</a>
							</td>
						</tr>
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="9">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
							echo "$linkHalaman";
							?><td>Jumlah Record <?php echo $jmldata; ?></td>
						</tr>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</section>
<?php
break;
case "tambah_pasien":
?>
<?php
// untuk kode unik no rm
$kueri = "SELECT max(no_rm) as maxRm FROM pasien";
$hasil = mysql_query($kueri);
$data  = mysql_fetch_array($hasil);
$kd_rm = $data['maxRm'];

$noUrut = (int) substr($kd_rm, 4, 4);

$noUrut++;

$char = "00";
$newRM = $char.sprintf("%04s",$noUrut);
//end

// untuk
	?>
		<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_pasien">Data Pasien</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Pasien</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" action="<?php echo "$aksi?module=tambah_pasien"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah Pasien</legend>
				<div class="clear"></div>
				<div class="span3 offset1">							
						
							<div class="control-group">
								<label class="control-label" for="inputPassword">No. Rekam Medis</label>
								<div class="controls">
								
								<input type="number" class="span6" value="<?php echo $newRM; ?>" name="no_rm" readonly="readonly">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Pasien</label>
								<div class="controls">
								
								<input type="text" class="span6" name="nama">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								
								<input type="date" class="span6" name="tgl_lahir">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="alamat" class="span6"></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<div class="controls">
								
								<input type="radio" class="span1" value="L" name="jk"> Laki-laki
								<input type="radio" class="span1" value="P" name="jk"> Perempuan
								</div>
							</div>
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
  
<?php
// edit pasien
break;
case "edit_pasien":
$noRm=$_GET['noRm'];
$query=mysql_query("SELECT * FROM pasien WHERE no_rm='$noRm'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_pasien">Data Pasien</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Edit Pasien</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" action="<?php echo "$aksi?module=edit_pasien"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah Pasien</legend>
				<div class="clear"></div>
				<div class="span3 offset1">							
						
							<div class="control-group">
								<label class="control-label" for="inputPassword">No. Rekam Medis</label>
								<div class="controls">
								
								<input type="number" class="span6" value="<?php echo $r['no_rm']; ?>" name="no_rm" readonly="readonly">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Pasien</label>
								<div class="controls">
								
								<input type="text" class="span6" name="nama" value="<?php echo $r['nama_pasien']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Tanggal Lahir</label>
								<div class="controls">
								
								<input type="date" class="span6" name="tgl_lahir" value="<?php echo $r['tgl_lahir']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
								<textarea name="alamat" class="span6"><?php echo $r['alamat']; ?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<div class="controls">
								<?php
								if ($r['jenis_kelamin'] == 'L') {
								echo'<input type="radio" class="span1" value="L" name="jk" checked> Laki-laki
								<input type="radio" class="span1" value="P" name="jk"> Perempuan';
								} else {
									echo'<input type="radio" class="span1" value="L" name="jk"> Laki-laki
									<input type="radio" class="span1" value="P" name="jk" checked> Perempuan';
								}
								
								?>
								</div>
							</div>
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
<?php
break;
}
?>