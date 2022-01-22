<?php 
include 'koneksi.php';
$id=$_POST['id_penjual'];
$totalpenjualan = $_POST['total_penjual'];
mysqli_query($koneksi,"UPDATE total_penjualan SET total_harga_penjualan='$totalpenjualan' where id_penjualan='$id'");

header("location:laporan_tampil.php");
?>