<?php
require_once '../../helper.php';
require_once '../../koneksi.php';
// $id_bunga = $_POST['id_bunga'];
$id_flash_sale = $_GET['id'];
$flash_start = $_POST['flash_start'];
$flash_end = $_POST['flash_end'];
$diskon = !empty($_POST['diskon'])? $_POST['diskon'] : 'null';

$update = mysqli_query($koneksi, "UPDATE flash_sale SET flash_start = '$flash_start', flash_end = '$flash_end', default_discount = $diskon WHERE id_flash_sale = $id_flash_sale");
if ($update) {
    set_flashdata([
        'msg' => 'Edit berhasil'
    ]);
} else {
    set_flashdata([
        'err' => 'Gagal edit flashsale'
    ]);
}

header("location: edit.php?id=$id_flash_sale");
