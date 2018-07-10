<?php
include ("../config/koneksi.php");
include ("../config/fungsi_indotgl.php");
$kodeuser=$_POST['q'];
$aksi="mod_datauser/aksi_datauser.php";
?>
<div class="hasil_cari">
<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
<table class="table table-striped">
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
					$query=mysql_query("SELECT * FROM user WHERE username LIKE '%".$kodeuser."%' OR nama LIKE '%".$kodeuser."%'");
					$no=1;
					$num=mysql_num_rows($query);
					if($num>=1){
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
					}
					else{
						?>
						<tr>
							<td colspan="7"><div class="alert alert-error">Data tidak ditemukan</div></td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
</div>