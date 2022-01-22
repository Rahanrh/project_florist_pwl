<?php
require 'koneksi.php';

$id_penjualan = $_POST['id_penjualan'];
$tanggal = $_POST['tanggal_jual'];
$total_penjualan = $_POST['total_terjual'];

if(!$hasil = mysqli_query($koneksi,"INSERT INTO total_penjualan (id_penjualan,tgl_penjualan,total_harga_penjualan) 
                            values('$id_penjualan','$tanggal','$total_penjualan')")){
    die(mysqli_error($koneksi));
} else{
    echo "number of row ".mysqli_affected_rows($koneksi) ."<br>";

}
if($hasil > 0){
    echo "<script>
    alert ('Berhasil Menambahkan');
    document.location.href='tambah_laporan.php';
    </script>";
}else{
    echo "<script>
    alert ('Gagal Menambahkan');
    document.location.href='tambah_laporan.php';
    </script>";
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background-color: white;
    }

    .cardcs{
      padding-top: 60px;
      padding-bottom: 60px;
      width: 720px;
    }
  </style>
  <title>total penjualan</title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">FLORIST SHOP </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="custom.php">Costum Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login/Registrasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
