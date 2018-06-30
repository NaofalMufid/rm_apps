<?php
$aksi="mod_diagnosa/aksi_diagnosa.php";
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
			 url:"mod_dokter/cari_tarif.php",
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
			<li class="active">Diagnosa</li>			
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12"  style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
				<fieldset>
				<legend class="span9">Tambah Diagnosa</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama Diagnosa</label>
								<div class="controls">
									<input type="text" name="nadia" class="span11">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Keterangan</label>
								<div class="controls">
									<textarea name="ket" class="span11"></textarea>
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
		</div>
		<div class="span6 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Kategori Diagnosa</legend>
				
				<table class="table table-bordered table-striped">
					<thead>
						<tr class="head3">
							<th>No</th><th>Nama Diagnosa</th><th>Keterangan</th><th></th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM diagnosa");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['nama_diagnosa']."<br>"; 
                            $id_diagnosa=$r['id_diagnosa'];
                            ?></td>
                            <td><?php echo $r['keterangan'];?></td>
                            <td>
								<a href="media.php?module=diagnosa&&act=edit&&id_diagnosa=<?php echo $r['id_diagnosa']; ?>" class="btn btn-info"><i class="icon-pencil"></i> Edit</a>
							</td>
						</tr>
					
					<?php
					$no++;
					}
					?>					
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
<?php
break;

case "edit":
$id_diagnosa=$_GET['id_diagnosa'];
$query=mysql_query("SELECT * FROM diagnosa WHERE id_diagnosa='$id_diagnosa'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=diagnosa">Kategori diagnosa</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Ubah diagnosa</li>	
		</ul>
		<div class="control-group pull-left"></div>
		<div class="span6 pull-left">		
			<div class="row-fluid">
			<div class="span12" style="background:#f9f9f9;padding:10px;">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<legend class="span12">Ubah Kategori diagnosa</legend>
				<div class="clear"></div>
				<div class="span8">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Nama diagnosa</label>
								<div class="controls">
									<input type="text" name="nadia" class="span11" value="<?php echo $r['nama_diagnosa']; ?>">
									<input type="hidden" name="id_diagnosa" class="span11" value="<?php echo $r['id_diagnosa']; ?>">
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword"> Keterangan</label>
								<div class="controls">
									<textarea name="ket" class="span11"><?php echo $r['keterangan']; ?></textarea>
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
				
							
						</form>	
			</div>
		</div>
		</div>
		<div class="span7 pull-right">
		<div class="row-fluid">
			<div class="span12">
			<div id="hasil"></div>
				<div id="tabel_awal">
				<fieldset>
				<legend class="span12">Kategori diagnosa</legend>
				<table class="table table-striped">
					<thead>
						<tr class="head3">
							<td>No</td><td>Nama diagnosa</td><td>Keterangan</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM diagnosa");
					$no=1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td><td><?php echo $r['nama_diagnosa']; ?></td><td><?php echo $r['keterangan']; ?></td><td><div class="btn-group">
								<a class="btn btn-danger" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=diagnosa&&act=edit&&id_diagnosa=<?php echo $r['id_diagnosa']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_diagnosa=$r[id_diagnosa]";?>" onclick="return confirm('Apakah anda yakin, ingin menghapus tarif dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>									
								</ul>
							</div></td>
						</tr>
					
					<?php
					$no++;
					}
					?>					
					</tbody>
				</table>
				</fieldset>
				</div>
			</div>
		</div>
		</div>		
	</section>
	
<?php
break;
}
?>