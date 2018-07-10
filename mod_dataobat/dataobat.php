<?php
$aksi="mod_dataobat/aksi_dataobat.php";
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
			 url:"mod_dataobat/cari.php",
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
			<li class="active">Data Obat</li>
			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=dataobat&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Obat</button>
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
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="head">
							<td>No</td>
							<td>Nama Obat</td>
							<td>Harga Obat</td>
							<td>Keterangan</td>
							<td>Opsi</td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM obat ORDER BY nama_obat ASC LIMIT $posisi,$batas");
					$no=$posisi+1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td><td><?php echo $r['nama_obat']; ?></td><td><?php echo $r['harga_obat']; ?></td><td><?php echo $r['keterangan']; ?></td>
							<td>
							<a href="media.php?module=dataobat&&act=edit&&kodeobat=<?php echo $r['id_obat']; ?>" class="btn btn-info"><i class="icon-pencil"></i> Edit</a>
							</td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="4">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM obat"));
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
case "tambah":
	?>
		<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dataobat">Data Obat</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Obat</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah Obat</legend>
				<div class="clear"></div>
				<div class="span5 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Obat</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" name="namaObat" required="">
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Harga Obat</label>
								<div class="controls">
								<input type="number" class="span6" id="inputText" name="hargaObat" required="">
								</div>
							</div>
					
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Keterangan</label>
								<div class="controls">
								<textarea class="span12" name="keterangan" required=""></textarea>
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
				
						
							</div>
							</fieldset>
						</form>	
			</div>
		</div>
	</section>
	
	<?php
break;

case "edit":
$kodeobat=$_GET['kodeobat'];
$query=mysql_query("SELECT * FROM obat WHERE id_obat='$kodeobat'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dataobat">Data Obat</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Obat</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
				<legend class="span7 offset1">Update Obat</legend>
				<div class="clear"></div>
				<div class="span5 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Obat</label>
								<div class="controls">
								<input type="text" class="span12" id="inputText" required="" name="namaObat" value="<?php echo $r['nama_obat']; ?>">
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Harga Obat</label>
								<div class="controls">
								<input type="number" class="span3" id="inputText" required="" name="hargaObat" value="<?php echo $r['harga_obat']; ?>">
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="inputPassword">Keterangan</label>
								<div class="controls">
								<textarea class="span12" required="" name="keterangan"><?php echo $r['keterangan']; ?></textarea>
								</div>
							</div>
				
							
						<input type="hidden" class="span12" id="inputText" name="idObat" value="<?php echo $r['id_obat']; ?>">
							<hr>
							<div class="control-group">
								<div class="controls">								
								<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
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