<?php
require 'koneksi.php';
$id_bunga = htmlspecialchars($_POST['id_bunga']);
$id_flash_sale = htmlspecialchars($_POST['id_flash_sale']);
$flash_start = $_POST['flash_start'];
$flash_end = $_POST['flash_end'];

$edit = mysqli_query($koneksi, "UPDATE produk_flashsale,flash_sale SET produk_flashsale.id_flash_sale='$id_flash_sale',
                                                                       flash_start='$flash_start',
                                                                       flash_end='$flash_end' WHERE id_bunga='$id_bunga'")
  or die(mysqli_error($koneksi));
if ($edit)
  header('location: home_admin.php');
else
  echo "Edit flash sale Gagal";
