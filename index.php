<?php
require_once("config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rekam Medis :: </title>

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                <span class="glyphicon glyphicon-tint" aria-hidden="true"></span>
                 REMIS</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php?kanal=ms_pasien">Master Pasien</a></li>
                    <li><a href="#">Rekam Medis</a></li>
                    <li><a href="index.php?kanal=ms_diagnosa">Kategori Diagnosa</a></li>
                    <li><a href="index.php?kanal=ms_obat">Master Obat</a></li>
                    <li><a href="index.php?kanal=ms_user">Master User</a></li>
                    <li><a href="#">Keluar</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        
        <div class="container">
            <?php
            if (isset($_GET['kanal'])) {
                require_once("kanal/kanal.php");
            } else {
            ?>
            
            <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#">
                        <img src="img/regis.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#">
                        <img src="img/rekam.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="row">
                <h3>Laporan</h3><hr>
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <div class="caption">
                            <a href="#">
                                <img src="img/lap_1.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#">
                            <img src="img/lap_6.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#">
                            <img src="img/lap_4.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="#">
                            <img src="img/lap_5.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>    
        </div>
        
        

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fungsi.js"></script>
    </body>
</html>
