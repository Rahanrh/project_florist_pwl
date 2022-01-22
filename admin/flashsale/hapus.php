<?php
require_once '../../koneksi.php';

$id_flash_sale = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM flash_sale WHERE flash_sale.id_flash_sale = $id_flash_sale")
    or die(mysqli_error($koneksi));
if ($hapus) {
    header('location: index.php');
}else{
    echo "Hapus data gagal";
}