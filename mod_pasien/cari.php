<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodepasien=$_POST['q'];
$aksi="mod_pasien/aksi_pasien.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
<table class="table table-bordered table-striped table-responsive">
					<thead>
						<tr class="head1">
							<td>No</td>
							<td>No. Rekam Medis</td>
							<td>Nama Pasien</td>
							<td>Tanggal Lahir</td>
							<td>Usia</td>
							<td>Alamat</td>
							<td>Jenis Kelamin</td>
							<td>Opsi</td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT *, YEAR(CURDATE()) - YEAR(tgl_lahir) AS usia FROM pasien WHERE nama_pasien LIKE '%".$kodepasien."%'");
					$no=1;
					$banyak = mysql_num_rows($query);
					if ($banyak >= 1) {
						while($r=mysql_fetch_array($query)){
						?>					
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $r['no_rm']; ?></td>
								<td><?php echo $r['nama_pasien']; ?></td>
								<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
								<td><?php echo $r['usia']; ?></td>
								<td><?php echo $r['alamat']; ?></td>
								<td><?php echo $r['jenis_kelamin']; ?></td>
								<td>
									<a href="<?php echo "media.php?module=data_pasien&&act=edit_pasien&&noRm=$r[no_rm]";?>" class="btn btn-info"><i class="icon-edit"></i> Edit</a>
								</td>
							</tr>
						<?php
						$no++;
						}	
					}else{
						?>
							<tr>
								<td colspan="8"><div class="alert alert-error">Data tidak ditemukan</div></td>
							</tr>
							<?php
					}
					?>
					
					</tbody>
				</table>
</div>