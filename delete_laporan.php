<?php

include "koneksi.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$del = mysqli_query($koneksi,"delete from total_penjualan where id_penjualan = '$id'"); // delete query

if($del)
{
    mysqli_close($koneksi); // Close connection
    header("location:laporan_tampil.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>