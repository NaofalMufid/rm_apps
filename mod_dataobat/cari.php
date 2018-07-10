<?php
include ("../config/koneksi.php");
include ("../config/fungsi_rupiah.php");
$kodepasien=$_POST['q'];
$aksi="mod_dataobat/aksi_dataobat.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
<table class="table table-striped">
					<thead>
						<tr class="head">
							<td>No</td><td>Nama Obat</td><td>Harga Obat</td><td>Keterangan</td><td></td>
						</tr>
					</thead>
					<tbody>
					<?php					
					$query=mysql_query("SELECT * FROM obat WHERE nama_obat LIKE '%".$kodepasien."%'");
					$no=1;					
					$num=mysql_num_rows($query);
					if($num >= 1){
					while($r=mysql_fetch_array($query)){
					?>					
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $r['nama_obat']; ?></td>
							<td><?php echo $r['harga_obat']; ?></td>
							<td><?php echo $r['keterangan']; ?></td>
							<td>
								<a href="media.php?module=dataobat&&act=edit&&kodeobat=<?php echo $r['id_obat']; ?>" class="btn btn-info"><i class="icon-pencil"></i> Edit</a>
							</td>
						</tr>
					
					<?php
					$no++;
					}
					}
					else{
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