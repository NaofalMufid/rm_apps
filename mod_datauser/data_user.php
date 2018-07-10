<?php
$aksi="mod_datauser/aksi_datauser.php";
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
			 url:"mod_datauser/cari.php",
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
			<li class="active">Data User</li>
			
		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=data_user&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah User</button>
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
							<td>Nama</td>
							<td>Kontak</td>
							<td>E-mail</td>
							<td>Username</td>
							<td>Level</td>
							<td>Opsi</td>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$query=mysql_query("SELECT * FROM user ORDER BY username ASC LIMIT $posisi,$batas");
					$no=$posisi+1;					
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['nama']; ?></td>
							<td><?php echo $r['kontak']; ?></td>
							<td><?php echo $r['email']; ?></td>
							<td><?php echo $r['username']; ?></td>
							<td><?php echo $r['level']; ?></td>
							<td>
								<a href="media.php?module=data_user&&act=edit&&kodeuser=<?php echo $r['id_user']; ?>" class="btn btn-info"><i class="icon-pencil"></i> Edit</a>
							</td>
						</tr>
					
					<?php
					$no++;
					}
					?>
					<tr>
							<td colspan="6">
							<?php
							$jmldata=mysql_num_rows(mysql_query("SELECT * FROM user"));
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
$acak1=date('my');
echo "$acak1";
function acakangkahuruf($panjang)
{
    $karakter= 'QWERTYUIOPMNBVCXZASDFGHJKL';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$acak2=acakangkahuruf(4);
$nounik=$acak1.$acak2;
	?>
		<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_user">Data User</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah User</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
				<fieldset>
				<legend class="span7 offset1">Tambah User</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama</label>
								<div class="controls">
								<input type="text" class="span10" id="nama" name="nama" required>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Kontak</label>
								<div class="controls">
								<input type="text" id="kontak" name="kontak" required> 
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">E-mail</label>
								<div class="controls">
								<input type="email" id="email" name="email" required> 
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
				<div class="span3">
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text" id="uname" class="span12" name="uname" required>
								</div>
							</div>
			
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								<input type="text" id="upass" class="span12" name="upass" value="<?=$nounik?>" required="" readonly="">
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
$kodeuser=$_GET['kodeuser'];
$query=mysql_query("SELECT * FROM user WHERE id_user='$kodeuser'");
$r=mysql_fetch_array($query);
?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=data_user">Data User</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update User</li>
		</ul>
		
		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
				<fieldset>
					<input type="hidden" name="id" value="<?=$kodeuser?>">
				<legend class="span7 offset1">Update User</legend>
				<div class="clear"></div>
				<div class="span3 offset1">
				
							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama</label>
								<div class="controls">
								<input type="text" class="span10" id="nama" name="nama" value="<?php echo $r['nama']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Kontak</label>
								<div class="controls">
								<input type="text" id="kontak" name="kontak" value="<?php echo $r['kontak']; ?>">
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">E-mail</label>
								<div class="controls">
								<input type="email" id="email" name="email" value="<?php echo $r['email']; ?>">
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
						<div class="span3">							
							<div class="span12" style="border:1px solid #fff;border-radius:5px;padding:10px;background:#54c7dc">
							<ul class="pop pull-right">
								<li><a href="#" class="btn" data-toggle="popover" data-placement="right" data-content="Username &amp; Password Tidak Boleh Kosong." title="Question"><i class="icon-question-sign"></i></a></li>
							</ul>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Username</label>
								<div class="controls">
								<input type="text" id="uname" class="span12" name="uname"  value="<?php echo $r['username']; ?>" readonly="">
								</div>
							</div>
			
							<div class="control-group">
								<label class="control-label" for="inputPassword">Password</label>
								<div class="controls">
								<input type="text" id="upass" class="span12" name="upass"  value="<?php echo $r['password']; ?>">
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