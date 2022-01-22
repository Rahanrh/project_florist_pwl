<?php

include('koneksi.php');

$id_bunga = $_GET['id_bunga'];

// "SELECT produk_flashsale.id_bunga, flash_sale.id_flash_sale ,flash_sale.flash_start,flash_sale.flash_end
// FROM produk_flashsale
// INNER JOIN flash_sale ON produk_flashsale.id_flash_sale = flash_sale.id_flash_sale
// WHERE id_bunga='$id_bunga

$hapus = mysqli_query($koneksi, "DELETE produk_flashsale,flash_sale FROM produk_flashsale 
                                 INNER JOIN flash_sale ON flash_sale.id_flash_sale = produk_flashsale.id_flash_sale 
                                 WHERE produk_flashsale.id_bunga='$id_bunga'")
  or die(mysqli_error($koneksi));
if ($hapus)
  header('location: home_admin.php');
else
  echo "Hapus data gagal";
