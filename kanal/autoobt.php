<?php
require_once('config/koneksi.php');

$r = $_GET['query'];

// diagnosa
$qstring = "SELECT * FROM obat WHERE nama_obat LIKE '%".$r."%' ORDER BY nama_obat DESC ";
$result = mysql_query($qstring);
 
while($row = mysql_fetch_array($result))
{
    $output['suggestions'][] = [
        'value' => $row['nama_obat'],
        'id_obt' => $row['id_obat'],
        'obat'  => $row['nama_obat'],
        'harga'  => $row['harga_obat']
    ];
}
if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>
						