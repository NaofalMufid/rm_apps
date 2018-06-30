<?php
	include ("../config/koneksi.php");
	include ("../config/fungsi_indotgl.php");
    $tgl1=$_GET['tgl1'];
    $tgl2=$_GET['tgl2'];
    $manajer=$_GET['manajer']
	?>
<!doctype html>
<html>
	<head>
		<title>Laporan Data Pasien</title>
		<link rel="shortcut icon" href="../img/laporan.png">
		<link rel="stylesheet" type="text/css" href="../css/laporan.css">
	</head>
	<body>
		<div class="page">
		<div class="kop">
			<h2>SYSTEM APLIKASI REKAM MEDIS DI INSTANSI</h2>
            <h6><?php
                if($tgl1=='' AND $tgl2==''){
                    
                }
                else{
                    echo tgl_indo($tgl1)." s/d ".tgl_indo($tgl2);
                }
                ?>
            
            </h6>
		</div>
		
            <div class="batas"></div>
            <?php
			
			if($tgl1=='' AND $tgl2==''){
		?>
		<table class="table" border="1px">
			<tr class="head">
				<td width="20">NO. </td><td width="120">NAMA RUMAH SAKIT</td><td width="100">KARYAWAN </td><td width="100">KELUARGA</td><td width="100">UMUM</td>
			</tr>
			
			<?php										
					$query=mysql_query("SELECT * FROM rs ORDER BY id_rs ASC");
					$no=1;
					while($r=mysql_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td>
                            <td><?php echo $r['nama_rs']; ?></td>
                            <td align="center">
                            <?php 
                            $id_rs=$r['id_rs']; 
                            $queryKaryawan=mysql_query("SELECT * FROM rs, rekammedik, pasien WHERE rs.id_rs=rekammedik.id_rs AND rs.id_rs='$id_rs' AND pasien.kodePasien=rekammedik.kodepasien");
                            echo $nKaryawan=mysql_num_rows($queryKaryawan);
                            ?>
                            </td>
                            <td align="center"><?php 
                            $id_rs=$r['id_rs']; 
                            $queryTang=mysql_query("SELECT * FROM rs, rekammedik, tanggungan WHERE rs.id_rs=rekammedik.id_rs AND rs.id_rs='$id_rs' AND tanggungan.kodeTanggungan=rekammedik.kodepasien");
                            echo $nTang=mysql_num_rows($queryTang);
                            ?></td>
                            
                            <td align="center">-</td>
						</tr>
					
					<?php
					$no++;
					}
					?>
                <tr>
                    <td colspan="2" align="center"><h4>Total</h4></td>
                    <td align="center"><?php 
                            $a=mysql_query("SELECT * FROM rekammedik, pasien, rs WHERE pasien.kodePasien=rekammedik.kodepasien AND rs.id_rs=rekammedik.id_rs");
                            echo $aa=mysql_num_rows($a);
                            ?></td>
                    <td align="center"><?php 
                            $b=mysql_query("SELECT * FROM rekammedik, tanggungan, rs WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND rs.id_rs=rekammedik.id_rs");
                            echo $bb=mysql_num_rows($b);
                            ?></td>
                    <td align="center">-</td>
                </tr>
					
		</table>
            <?php
            }
            else{
                ?>
            <table class="table" border="1px">
			<tr class="head">
				<td width="20">NO. </td><td width="120">NAMA RUMAH SAKIT</td><td width="100">KARYAWAN </td><td width="100">KELUARGA</td><td width="100">UMUM</td>
			</tr>
			
			<?php										
					$query=mysql_query("SELECT * FROM rs ORDER BY id_rs ASC");
					$no=1;
					while($r=mysql_fetch_array($query)){
					?>					
						<tr bgcolor="#fff">
							<td align="center"><?php echo $no; ?></td>
                            <td><?php echo $r['nama_rs']; ?></td>
                            <td align="center">
                            <?php 
                            $id_rs=$r['id_rs']; 
                            $queryKaryawan=mysql_query("SELECT * FROM rs, rekammedik, pasien WHERE rs.id_rs=rekammedik.id_rs AND rs.id_rs='$id_rs' AND pasien.kodePasien=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '".$tgl1."' AND '".$tgl2."'");
                            echo $nKaryawan=mysql_num_rows($queryKaryawan);
                            ?>
                            </td>
                            <td align="center"><?php 
                            $id_rs=$r['id_rs']; 
                            $queryTang=mysql_query("SELECT * FROM rs, rekammedik, tanggungan WHERE rs.id_rs=rekammedik.id_rs AND rs.id_rs='$id_rs' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '".$tgl1."' AND '".$tgl2."'");
                            echo $nTang=mysql_num_rows($queryTang);
                            ?></td>
                            
                            <td align="center">-</td>
						</tr>
					
					<?php
					$no++;
					}
					?>
                <tr>
                    <td colspan="2" align="center"><h4>Total</h4></td>
                    <td align="center"><?php 
                            $a=mysql_query("SELECT * FROM rekammedik, pasien, rs WHERE pasien.kodePasien=rekammedik.kodepasien AND rs.id_rs=rekammedik.id_rs AND rekammedik.tgl BETWEEN '".$tgl1."' AND '".$tgl2."'");
                            echo $aa=mysql_num_rows($a);
                            ?></td>
                    <td align="center"><?php 
                            $b=mysql_query("SELECT * FROM rekammedik, tanggungan, rs WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND rs.id_rs=rekammedik.id_rs AND rekammedik.tgl BETWEEN '".$tgl1."' AND '".$tgl2."'");
                            echo $bb=mysql_num_rows($b);
                            ?></td>
                    <td align="center">-</td>
                </tr>
					
		</table>
            <?php
            }
            ?>
            <table border="0" style="float:right;" class="ttd">
            <tr>
                <td>Deli Serdang, <?php echo tgl_indo(date('Y-m-d')); ?></td>    
            </tr>
            <tr>
                <td>Jr Manajer Personalia &amp; Kesejahteraan</td>    
            </tr>
            <tr>
                <td></td>    
            </tr>
            <tr>
                <td></td>    
            </tr>
                 <tr>
                <td></td>    
            </tr>
            <tr>
                <td><?php echo $manajer; ?></td>    
            </tr>
            </table>
		</div>
	</body>
</html>