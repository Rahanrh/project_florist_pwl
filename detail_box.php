<?php include 'koneksi.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../prodak.css">
  <style>
    .jumbotron {
      padding-top: 6rem;
      background-size: cover;
      height: auto;
      width: auto;
      color: white;
    }

    body {
      min-height: 1000px;
      background-color: white;
    }

    #project {
      background-color: white;
      ;
    }

    section {
      padding-top: 5rem;
    }

    .p1 {
      font-family: "Times New Roman", Times, serif;
    }

    .headkategori {
      margin-top: 25px;
      margin-bottom: 50px;
    }

    .container {
      width: 1100px;
    }

    .produkwrapper {
      margin-top: 70px;
    }
  </style>

  <title>Bouquet</title>
</head>

<body id="home">
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

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
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#About">About Florist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bouquet.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login/Registrasi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->


  <!-- Katalog Bunga Christmas -->
  <div class="produkwrapper" style="">
    <div class="container" style="">
      <div class="row">
        <?php
        $idproduk = $_GET['id_bunga'];
        $datagb = mysqli_query($koneksi, "select * from prodak_bunga where id_bunga='$idproduk'");

        $d = mysqli_fetch_array($datagb)
        ?>
        <div class="col-sm-6" style="">
          <h3 class="bunga"><?php echo $d['nama_bunga'] ?></h3>
          <h5 class="hargabunga">RP. <?php echo $d['harga'] ?></h5>
          <?= "<img src='img/prodak/box/" . $d['gb_bunga'] . "'style='width:420px; height:500px;border:3px solid grey;border-radius:3%;'>" ?>
          <label for="descbunga" style="margin-top:15px;font-size:20px;">Deskripsi Lengkap Bunga : </label>

          <textarea id="descbunga" name="descbunga" rows="4" cols="50" style="margin-top:15px;padding:7px;border:3px solid grey;border-radius:5%;">Terbuat dari bunga mawar, Baby's Breath, Tulip, Bunga Carnation, Bunga Daisy, Bunga Calla Lily, Bunga Gardenia, Bunga Anggrek</textarea>

        </div>
        <div class="col-sm-6" style="margin-top:70px;">
          <form class="formproduk" action="">
            <div class="form-group">
              <h5>Opsi Pengantaran</h5>
              <input class="radio-toolbar" type="radio" name="pickdeliveroption" id="delivery">
              <label class="deliverylabel" for="delivery">Delivery<img src="produk/icon/shop.png" style="width:30px;height:30px;"></label>

              <input class="radio-toolbar" type="radio" name="pickdeliveroption" id="pickup">
              <label class="deliverylabel" for="pickup">Pickup<img src="produk/icon/delivery.png" style="width:30px;height:30px;"></label>
            </div>
            <div class="form-group">
              <label for="deliverydate">Tanggal Pengiriman:</label><br>
              <input type="date" id="birthday" name="daliverydate">
            </div>
            <div class="form-group">
              <label for="namapengirim">Masukkan Nama Pengirim:</label><br>
              <input type="text" id="namapengirim" name="namapengirim" required><br>

              <label for="phone">Masukkan Nomor HP Pengirim:</label><br>
              <input type="tel" id="nomorhp" name="nomorhp" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
            </div>
            <div class="form-group"><br>
              <h5>Kartu Ucapan</h5>
              <label for="kartuucapan">Dari:</label><br>
              <input type="text" id="kartuucapan" name="kartuucapan" required><br>
              <label for="kartuucapan">Untuk:</label><br>
              <input type="text" id="kartuucapan" name="kartuucapan" required><br>
              <label for="txtArea">Pesan:</label><br>
              ​<textarea id="txtArea" rows="4" cols="35"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Ke Keranjang</button>
          </form>

        </div>
      </div>
    </div>
  </div>



  <!-- akhir Christmas -->
  <!-- footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>FLORIS-Copyright</strong> <i class="far fa-copyright"></i>- Create By Gafi</p>
        </div>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <div class="icon-contact">
          <strong><label class="font-weight-bold">We Accept </label></strong>
          <a href="#"><img src="img/icon/bca.png" class="" data-toggle="tooltip" title="bca"></a>
          <a href="#"><img src="img/icon/mandiri.png" class="" data-toggle="tooltip" title="MandiriBank"></a>
          <a href="#"><img src="img/icon/ovo.png" class="" data-toggle="tooltip" title="ovopayment"></a>
          <label class="font-weight-bold">Follow Us </label>
          <a href="#"><img src="img/icon/fb.png" class="" data-toggle="tooltip" title="Facebook"></a>
          <a href="#"><img src="img/icon/ig.png" class="" data-toggle="tooltip" title="Instagram"></a>
          <a href="#"><img src="img/icon/twitter.png" class="" data-toggle="tooltip" title="Twitter"></a>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir footer -->
</body>


</html>