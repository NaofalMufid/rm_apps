<?php
$aksi="proses/medis.php";
switch($_GET['act']){
	default:
	?>
	<script type="text/javascript">
		 $(document).ready(function() {
		  <!-- event textbox keyup
		  // cari pasien
		  $("#txtkdpasien").keyup(function() {
		   var strcari = $("#txtkdpasien").val();
		   if (strcari != "")
		   {
			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"ms_pasien.php",
			 data:"q="+ strcari,
			 success: function(data){
			 	
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "block");
		   }
		  });
		  //================
		  $("#txtkdpasien").click(function() {
		   var strcari = $("#txtkdpasien").val();
		   if (strcari != "")
		   {
			$("#hasil").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"ms_pasien.php",
			 data:"q="+ strcari,
			 success: function(data){
			 $("#hasil").css("display", "block");
			  $("#hasil").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasil").css("display", "block");
		   }
		  });

		  // cari obat		  		
		  $("#txtobat").click(function() {
		   var strobat = $("#txtobat").val();
		   if (strobat != "")
		   {
			$("#hasils").html("<img src='img/loader.gif'/>")
			$.ajax({
			 type:"post",
			 url:"ms_obat.php",
			 data:"q="+ strobat,
			 success: function(data){
			 $("#hasils").css("display", "block");
			$("#inpt").css("display", "block");
			  $("#hasils").html(data);			  
			 }
			});
		   }
		   else{
		   $("#hasils").css("display", "block"); 
		   }
		  });
             
		});
	</script>	
	<section>
		<div class="row-fluid">
			<div class="span2 pull-left">
				<div class="span12" style="background:#fff;">
				
				<?php
				$kode=$_GET['kodepasien'];
				$status=$_GET['status'];
				$tgl_skrg = date('Y-m-d');
				if($kode!='' AND $status=='pasien'){
					$qupas=mysql_query("SELECT * FROM pasien WHERE no_rm='$kode'");
					$rpas=mysql_fetch_array($qupas);
				?>
					<div class="control-group">				
						<div class="rm_text">
						<label class="control-label" for="inputText">NO. PASIEN</label>
							<div class="controls">
							<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['no_rm'] ?>" disabled>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputText">Nama Lengkap</label>
						<div class="controls">
						<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_pasien']; ?>" disabled>
						</div>
					<div class="control-group">
						<label class="control-label" for="inputText">Jenis Kelamin</label>
						<div class="controls">
						<input type="text" class="span12" id="inputText"  value="<?php echo $rpas['jenis_kelamin']; ?>" disabled>
						</div>
					</div>
						<?php
							$tgl=$rpas['tgl_lahir'];
							$ambil_thn=substr($tgl,0,4);
							$thn_sekarang=date('Y');
							$umur=$thn_sekarang-$ambil_thn;
						?>
					<div class="control-group">
						<label class="control-label" for="inputText">Umur</label>
						<div class="controls">
						<input type="text" class="span12" id="inputText" value="<?php echo $umur." Tahun"; ?>" disabled>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputText">Alamat</label>
						<div class="controls">
						<textarea class="span12" disabled><?php echo $rpas['alamat']; ?></textarea>
						</div>
					</div>
					</div>						
				<?php
				}else{
				?>
				<div class="control-group">						
					<div class="rm_text">
						<div class="controls">
							<input type="text" class="span12" id="txtkdpasien" placeholder="Masukkan Kode Pasien" min="1" max="999999" maxlength="6" onkeyup="angka(this);"/>
						</div>
					</div>
				</div>
				<?php
				}
				?>
				</div>
			</div>
			<div class="span10 thumb pull-right">
				<?php
				if(isset($kode)){
				$bukadiag=$_GET['diagnosa'];
				$koderm=$_GET['koderm'];
				$inobat = $_GET['input_obat'];
				$waktu=date('dmy');
				$querm=mysql_query("SELECT * FROM transaksi");
				$num=mysql_num_rows($querm)+1;
				$cek=mysql_query("SELECT * FROM detail_transaksi_obat WHERE id_transaksi='$koderm'");
				$banyak=mysql_num_rows($cek)+1;
				$nounik=$waktu.$num;
				?>
				<div class="tabbable" style="margin-bottom: 18px;">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab"><span class="fa fa-medkit"></span> Data Rekam Medik</a></li>
						<li><a href="media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>"><span class="fa fa-refresh"></span> Reload</a></li>
                        
                        <li><a href="media.php?module=rekam_medik"><span class="fa fa-close"></span> Exit</a></li>
					</ul>
				<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
		<!--Data Racik Obat-->
		<?php
		if($inobat=='on'){
		?>
		<h4>Racik Obat</h4>
		<hr>
			<div class="tab-pane active" id="tab4">
			<div class="span12">
				<table class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>NO</th>
							<th align="center">Nomor Rekam Medik</th>
							<th align="center">Diagnosa</th>
							<th align="center">Nama Obat</th>
							<th align="center">Pemakaian</th>
							<th align="center">QTY</th>
							<th align="center">Harga</th>
							<th align="center">Total Harga</th>
							<th align="center">Bayar</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$qobt=mysql_query("SELECT detail_transaksi_obat.id_detail_transaksi, detail_transaksi_obat.id_transaksi,diagnosa.nama_diagnosa,obat.nama_obat,detail_transaksi_obat.pemakaian,detail_transaksi_obat.tgl_transaksi_detail, detail_transaksi_obat.qty,detail_transaksi_obat.harga,detail_transaksi_obat.jumlah FROM detail_transaksi_obat,obat,transaksi,diagnosa WHERE transaksi.id_transaksi='$koderm' AND detail_transaksi_obat.id_transaksi=transaksi.id_transaksi AND detail_transaksi_obat.id_obat=obat.id_obat AND transaksi.id_diagnosa=diagnosa.id_diagnosa ORDER BY detail_transaksi_obat.tgl_transaksi_detail DESC");
						$no=1;
						while($robt=mysql_fetch_array($qobt)){
						
						?>
						<tr bgcolor="#fff">
							<td><?php echo $no; ?>.</td>
							<td><?php echo $robt['id_transaksi']; ?></td>
							<td><?php echo $robt['nama_diagnosa']; ?></td>
							<td><?php echo $robt['nama_obat']; ?></td>
							<td><?php echo $robt['pemakaian']; ?></td>							
							<td><?php echo $robt['qty']; ?></td>
							<td><?php echo $robt['harga']; ?></td>
							<td><?php echo $robt['jumlah']; ?></td>
							<td><button class="btn btn-danger" onclick="window.location='mod_rm/cetak_racik.php?module=cetak&&idrc=<?php echo $robt['id_detail_transaksi']; ?>&&idrm=<?php echo $robt['id_transaksi'] ?>'"><i class="icon-trash icon-white"></i>Bayar</button></td>
						</tr>
						<?php
						$no++;
						}
						?>
						<tr>
							<td colspan="3"></td>
							<td colspan="4">Total Obat<b> 							
							<?php 
							$jmlh=mysql_num_rows($qobt);
							echo $jmlh;
							?>
							</b></td>
							<td colspan="2">Total Transaksi : </td>	
						</tr>
						</tbody>
					</table>
		<!--Form Racik Obat-->			
		<!--Racik Obat-->
			<div class="tab-pane" id="addRacik">
				<h3>Tambah Obat Racik</h3>
				<form method="post" action="<?php echo $aksi."?module=tambahracik" ?>">
				<input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
				<input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">
				<div class="span12">
				<div class="control-group">
				<label class="control-label" for="inputPassword">Kode Resep</label>
				<div class="controls">
					<input type="text" class="span5" name="kode_resep" value="<?php echo $koderm.'#'.$banyak; ?>" readonly="" required="">
				</div>
				</div>
				<div class="control-group">
					<label for="obat" class="control-label">Nama Obat</label>
					<div class="controls">
						<input type="text" class="span5" id="obat" name="obat" value="">
						<input type="hidden" id="id_obt" name="id_obt" value="">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Aturan Pemakaian</label>
					<div class="controls">
						<textarea class="span5" name="pemakaian"></textarea>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">ID Transaksi</label>
					<div class="controls">
						<input type="hidden" id="idTrs" name="idTrs" class="span5" value="<?=$_GET['koderm']?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Tanggal Transaksi</label>
					<div class="controls">
						<input type="date" id="tgl_td" name="tgl_td" class="span5" value="<?=$tgl_skrg?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Harga</label>
					<div class="controls">
						<input type="number" id="harga" name="harga" class="span5" value="" readonly="" onchange="total()">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">QTY</label>
					<div class="controls">
						<input type="number" id="qty" name="qty" class="span5" min="1" onkeyup="total();">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputPassword">Jumlah</label>
					<div class="controls">
						<input type="number" id="jumlah" name="jumlah" class="span5" value="0" readonly>
					</div>
				</div>
					<hr>
					<button class="btn btn-danger" data-toggle="tab" href="#racikObt"><i class="icon-arrow-left icon-white"></i> Back</button>
					<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
				</form>
				</div>
			</div>
			</div> <!-- /tabbable -->
			<!-- End Racik Obat  -->
		<?php
		}
		else{
		?>
		<!--End Data Rekam Medik-->

		<!-- Data Rekam Medik  -->
		<div class="tab-pane active" id="tab1">
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-info" data-toggle="tab" href="#tab2"><i class="icon-chevron-right icon-white"></i> Input Rekam Medik</button>
					<hr>
				</div>
			</div>
			<?php
			$p      = new Paging;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);
			?>
			<table class="table table-bordered table-hover table-striped">
			<caption> Data Rekam Medik <?=$error?> </caption>
			<thead>
			<tr>
				<th align="center">No. Rekam Medik</th>
				<th align="center">Tanggal Berobat</th>
				<th align="center">Anamesa</th>
				<th align="center">Diagnosa</th>
				<th align="center">Obat</th>
				<th align="center" colspan="2">Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$qrm=mysql_query("SELECT transaksi.id_transaksi,transaksi.anamesa,transaksi.tanggal_transaksi,diagnosa.nama_diagnosa FROM transaksi, pasien, diagnosa WHERE pasien.no_rm='$kode' AND transaksi.no_rm=pasien.no_rm AND transaksi.id_diagnosa=diagnosa.id_diagnosa ORDER BY transaksi.tanggal_transaksi DESC LIMIT $posisi,$batas");
			$no=$posisi+1;
			while($rrm=mysql_fetch_array($qrm)){
				$tgl=$rrm['tgl_lahir'];
				$ambil_thn=substr($tgl,0,4);
				$thn_sekarang=date('Y');
				$umur=$thn_sekarang-$ambil_thn;
			?>
			<tr>
				<td><?php echo $rrm['id_transaksi']; ?></td>
				<td><?php echo $rrm['tanggal_transaksi']; ?></td>
				<td><?php echo $rrm['anamesa']; ?></td>
				<td><?php echo $rrm['nama_diagnosa']; ?></td>
				<td>
					<?php
					$no=1;
					$obate = mysql_query("SELECT transaksi.no_rm,detail_transaksi_obat.id_transaksi, obat.nama_obat FROM detail_transaksi_obat,obat,transaksi,pasien WHERE pasien.no_rm='$kode' AND transaksi.no_rm=pasien.no_rm  AND transaksi.id_transaksi='$rrm[id_transaksi]' AND detail_transaksi_obat.id_transaksi=transaksi.id_transaksi AND detail_transaksi_obat.id_obat=obat.id_obat ORDER BY obat.nama_obat DESC");
					?>
					<a href="#" class="btn btn-obat" data-toggle="popover" data-placement="bottom" data-content="
					<?php while ($kie = mysql_fetch_array($obate)) {
						echo $no.'. '.$kie['nama_obat'].' ';
					$no++;
					}
					?>
					" title="" data-original-title="List Obat">Lihat Obat</a>
				</td>
				<td>
					<button class="btn btn-success btnTrs" data-toggle="tab" href="#tab4" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&input_obat=on&&koderm=<?php echo $rrm['id_transaksi']; ?>'"><i class="icon-tint icon-white"></i> Obat Pasien</button>
				</td>
				<td>	
					<button class="btn btn-info" data-toggle="tab" href="#tab3" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&editrm=on&&koderm=<?php echo $rrm['id_transaksi']; ?>'"><i class="icon-chevron-right icon-white"></i> Edit Rekam Medik</button>
				</td>
			</tr>
			<?php
			$no++;
			}
			$totrm = mysql_num_rows($qrm);
			?>
			<tr>
				<td colspan="5">
				<?php
				$jmldata=$totrm;
				$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
				$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman); 
				echo "$linkHalaman";
				?><td colspan="2">Jumlah Record <?php echo $jmldata; ?></td>
			</tr>
			</tbody>
		</table>
		</div>	
		<!-- End Data Rekam Medik  -->								
			
			<div class="tab-pane" id="tab2">
			<hr>
			<!-- Diagnosa Rekam Medik  -->
			<h4>Input Rekam Medik</h4>
			<form method="post" action="<?php echo $aksi."?module=tambahrm" ?>">
				<div class="span6">
				
					<div class="control-group">
						<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
						<div class="controls">
						<input type="text" class="span8" value="<?php echo $nounik ?>" readonly name="nounik" required="">
						<input type="hidden" class="span8" value="<?php echo $_GET['kodepasien'] ?>" name="norm">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inputEmail">Tanggal :</label>
						<div class="controls">
						<input type="date" class="span8" value="<?php echo $tgl_skrg;?>" name="tgl_trs" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail">Masukkan Anamnesa</label>
						<div class="controls">
						<textarea class="span8" name="anamnesa" required=""></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="dgns" class="control-label">Diagnosa</label>
						<div class="controls">
							<input type="text" class="span8" id="diagnosa" name="diagnosa" value="" required="">
							<input type="hidden" id="id_dgs" name="id_dgs" value="">
						</div>
					</div>															
					<div class="control-group">
						<div class="controls span12 offset4">
						<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" name="simpan-trs" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
						</div>
					</div>
				</div>					
				<div class="span4">								
				<div id="tampil"></div>
				</div>	
				</form>							
				</div>					
				<!-- End Diagnosa Rekam Medik  -->		

			<!--Edit Rekam medik-->
			<div class="tab-pane" id="tab3">
			<hr>
			<h4>Edit Rekam Medik</h4>
			<form method="post" action="<?php echo $aksi."?module=editrm" ?>">
				<div class="span6">
					<div class="control-group">
						<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
						<div class="controls">
						<input type="text" class="span8" value="<?php echo $nounik ?>" readonly name="nounik" required="">
						<input type="hidden" class="span8" value="<?php echo $_GET['kodepasien'] ?>" name="norm">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="inputEmail">Tanggal :</label>
						<div class="controls">
						<input type="date" class="span8" value="<?php echo $tgl_skrg;?>" name="tgl_trs" required="">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputEmail">Masukkan Anamnesa</label>
						<div class="controls">
						<textarea class="span8" name="anamnesa" required=""></textarea>
						</div>
					</div>
					<div class="control-group">
						<label for="dgns" class="control-label">Diagnosa</label>
						<div class="controls">
							<input type="text" class="span8" id="diagnosa" name="diagnosa" value="" required="">
							<input type="hidden" class="span8" id="id_dgs" name="id_dgs" value="">
						</div>
					</div>															
					<div class="control-group">
						<div class="controls span12 offset4">
						<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
						<button type="submit" name="simpan-trs" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
						</div>
					</div>
				</div>					
				<div class="span4">								
				<div id="tampil"></div>
				</div>	
				</form>							
				</div>					
				<!--end edit rekam medik-->
		<?php 
		}
		?>				
				</div>	
		<?php
		}
		else{
		?>		
		<div id="hasil"></div>	
		<?php
		}
		?>
		</div>
	</div>
	</section>
<?php
break;
}
?>