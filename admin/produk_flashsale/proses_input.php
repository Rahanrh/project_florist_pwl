<?php
require_once '../../helper.php';
require_once '../../koneksi.php';

$id_flash_sale = intval($_POST['id_flash_sale']);
$id_bunga = $_POST['id_bunga'];
$diskon = !empty($_POST['diskon'])? $_POST['diskon'] : 'null';

$insert = mysqli_query($koneksi, "INSERT INTO produk_flashsale (id_bunga,id_flash_sale,diskon) VALUES('$id_bunga', $id_flash_sale, $diskon)");
if ($insert) {
    set_flashdata([
        'msg' => 'Input berhasil'
    ]);
} else {
    set_flashdata([
        'err' => 'Gagal input'
    ]);
}

header("location: input.php");
