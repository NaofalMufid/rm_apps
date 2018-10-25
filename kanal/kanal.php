<?php
$kanal = $_GET['kanal'];

if ($kanal == 'ms_pasien') {
    require_once('kanal/ms_pasien.php');
} else if ($kanal == 'ms_diagnosa') {
    require_once('kanal/ms_diagnosa.php');
} else if ($kanal == 'ms_obat') {
    require_once('kanal/ms_obat.php');
} else if ($kanal == 'ms_user') {
    require_once('kanal/user_data.php');
} else {
    # code...
}

?>