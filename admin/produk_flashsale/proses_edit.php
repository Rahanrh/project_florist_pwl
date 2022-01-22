<?php
require_once '../../helper.php';
require_once '../../koneksi.php';

$id = $_GET['id'];
$id_flash_sale = intval($_POST['id_flash_sale']);
$id_bunga = $_POST['id_bunga'];
$diskon = !empty($_POST['diskon'])? $_POST['diskon'] : 'null';

$update = mysqli_query($koneksi, 
    "UPDATE produk_flashsale SET 
        id_flash_sale = $id_flash_sale,
        id_bunga = '$id_bunga', 
        diskon = $diskon 
        WHERE id_produk_flashsale = $id");
if ($update) {
    set_flashdata([
        'msg' => 'Edit berhasil'
    ]);
} else {
    set_flashdata([
        'err' => 'Gagal edit flashsale'
    ]);
}

header("location: edit.php?id=$id");
