<?php
require_once '../../koneksi.php';

$id = $_GET['id'];

$hapus = mysqli_query($koneksi, "DELETE FROM produk_flashsale WHERE produk_flashsale.id_produk_flashsale = $id")
  or die(mysqli_error($koneksi));
if ($hapus)
  header('location: index.php');
else
  echo "Hapus data gagal";
