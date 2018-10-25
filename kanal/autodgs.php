<?php
require_once('config/koneksi.php');

$q = $_GET['query'];

// diagnosa
$qstring = "SELECT * FROM diagnosa WHERE nama_diagnosa LIKE '%".$q."%' ORDER BY nama_diagnosa DESC ";
$result = mysql_query($qstring);
 
while($row = mysql_fetch_array($result))
{
    $output['suggestions'][] = [
        'value' => $row['nama_diagnosa'],
        'id_dgs' => $row['id_diagnosa'],
        'diagnosa'  => $row['nama_diagnosa']
    ];
}
if (!empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>
						