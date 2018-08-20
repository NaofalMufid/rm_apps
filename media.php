<?php
session_start();
if(empty($_SESSION['iduser'])){
	echo"
		<script type='text/javascript'>
			alert('Mohon maaf, Silahkan Login Terlebih Dahulu.');
			window.location.href='index.php';
		</script>";
}elseif(isset($_SESSION['iduser']) AND isset($_SESSION['akses'])){
	include ("config/koneksi.php");
	include ("config/akses.php");
	include ("config/class_paging.php");
	include("config/fungsi_indotgl.php");
	include("config/fungsi_rupiah.php");
	$akses=$_SESSION['akses'];
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="id">
	<head>
		<title><?php include ("config/title.php"); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<!-- Bootstrap -->
		<link href="css/custom.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link  href="css/bootstrap-responsive.min.css"  rel ="stylesheet"> 
        <link  href="font-awesome/css/font-awesome.min.css"  rel ="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/jquery.autocomplete.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Bootstrap -->
		<link rel="shortcut icon" href="logo.png" >
	</head>
	<body>
	<header>
	<div class="navbar">
					  <div class="navbar-inner">
						<div class="container">
						  <!-- Menampilkan tombol trigger -->
						  <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </a>
							<!-- Akhir dari tombol triger -->
						  <!-- Komponen navbar -->
						  <div class="nav-collapse collapse navbar-responsive-collapse">
							<ul class="nav">
							  <li><a href="media.php?module=home"><i class="fa fa-home"></i> Home</a></li>
								<li><a href="media.php?module=data_pasien"><i class="fa fa-wheelchair"></i> Data Pasien</a></li>
								<li><a href="media.php?module=rekam_medik"><i class="fa fa-medkit"></i> Rekam Medis</a></li>
								<li><a href="media.php?module=diagnosa"><i class="fa fa-plus-square"></i> Kategori Diagnosa</a></li>
								<li><a href="media.php?module=dataobat"><i class="fa fa-tint"></i> Data Obat</a></li>
								<?php if($akses=='1'){ ?>
								<li><a href="media.php?module=data_user"><i class="fa fa-users"></i> Data User</a></li>
								<?php } ?>
							</ul>							
							<ul class="nav pull-right">
							  <li class="divider-vertical"></li>
							  <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> Settings <b class="caret"></b></a>
								<ul class="dropdown-menu">
								  <li><a href="#"><i class="icon-refresh"></i> Ganti Password</a></li>
								  <li class="divider"></li>
								  <li><a href="media.php?module=keluar"><i class="icon-off"></i> Keluar</a></li>
								</ul>
							  </li>
							</ul>
						  </div><!-- /.nav-collapse -->
						</div>
					  </div><!-- /navbar-inner -->
					</div><!-- /navbar -->
	</header>
	<?php
		include ("kontent.php");
	?>
	<script src="js/fungsi.js"></script>
	</body>
</html>
<?php
}
else{  
}
?>