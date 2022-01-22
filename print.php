<?php

require_once __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';
$data = mysqli_query($koneksi,"select * from total_penjualan");



$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <table class="table table-striped table-hover" style="margin-top:100px;width:70%;margin-left:200px;">
    <tr>
        <th>id_penjualan</th>
        <th>tanggal penjualan</th>
        <th>total harga</th>
    </tr>';
    
    <?php while($d = mysqli_fetch_array($data)){
        ?>
        $html .='<tr>
        <td><?= $d["id_penjualan"] ?></td>
        </tr>'
        <?php
    }
    ?>

    $html .='</table>
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

?>

