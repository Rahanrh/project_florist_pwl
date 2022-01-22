<?php
require_once '../../helper.php';
require_once '../../koneksi.php';
$flash_start = $_POST['flash_start'];
$flash_end = $_POST['flash_end'];
$diskon = !empty($_POST['diskon'])? $_POST['diskon'] : 'null';

$insert = mysqli_query($koneksi, "INSERT INTO flash_sale (flash_start,flash_end,default_discount) VALUES('$flash_start','$flash_end', $diskon)");
if ($insert) {
    set_flashdata([
        'msg' => 'Input berhasil'
    ]);
} else {
    set_flashdata([
        'err' => 'Gagal input flashsale'
    ]);
}

header("location: input.php");
