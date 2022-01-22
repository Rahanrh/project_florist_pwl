<?php
session_start();
if (isset($_POST["checkout"])) {
  if (empty($_POST["checkbox"])) {
    echo "
        <script>
            alert('Pilih Pesanan yang akan Anda beli');
            window.history.go(-1);
        </script>
        ";
  } else {
    $conn = mysqli_connect("localhost", "root", "", "florist");
    $sum = 0;
  }
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

    .cardcs {
      padding-top: 60px;
      padding-bottom: 60px;
      width: 720px;
    }

    .tbbwh {
      padding: 10px 5px 10px 10px;
      margin-top: 20px;
      margin-bottom: 20px;
    }
  </style>
  <title>Shopping Cart</title>
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
            <a class="nav-link" aria-current="page" href="home_user.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bouquet.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="custom.php">Costum Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav" style="margin-left: 30px;">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="" class="list-group-item list-group-item-action list-group-item-dark">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
              </svg>
            </a>
          </li>
          <li class="nav-item" style="margin-left: 10px;">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="cart.php">Cart</a></li>
                <li><a class="dropdown-item" href="pembayaran.php">Pembayaran</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- cart -->
  <div class="container" style="padding-top: 100px;">
    <form action="koneksi.php" method="POST">
      <div class="card">
        <div class="card-header">
          <h5>Checkout</h5>
        </div>
        <table class="table table-striped table-bordered">
          <thead class="align-middle">
            <tr>
              <th scope="col">Nama Prodak</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total Harga</th>
            </tr>
          </thead>
          <!-- memanggil value dari database menggunakan parameter $cart sebagai $row -->
          <?php foreach ($_POST["checkbox"] as $id) {
            $show = mysqli_query($conn, "SELECT * FROM cart INNER JOIN prodak_bunga ON cart.id_bunga = prodak_bunga.id_bunga WHERE id_cart='$id'");
            $row = mysqli_fetch_array($show);
            $sum += $row["harga_cart"]; ?>
            <tr class="align-middle">
              <td hidden><input type="text" readonly class="form-control-plaintext" id="staticEmail" name="id[]" value="<?= $row["id_cart"]; ?>"></td>
              <td><?= $row["nama_bunga"]; ?></td>
              <td><?= $row["harga"]; ?></td>
              <td><?= $row["jumlah"]; ?></td>
              <td><?= $row["harga_cart"]; ?></td>
            </tr>
          <?php }; ?>
        </table>
      </div>
      <div class="card tbbwh">
        <div class="row align-self-start">
          <h6>Metode Pembayaran</h6>
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="jenis_pembayaran" id="btnradio1" autocomplete="off" disabled>
            <label class="btn btn-outline-primary" for="btnradio1">Transfer Bank</label>

            <input type="radio" class="btn-check" name="jenis_pembayaran" id="btnradio2" autocomplete="off" value="bayar ditempat">
            <label class="btn btn-outline-primary" for="btnradio2">Bayar Ditempat</label>
          </div>
        </div>
        <div class="col align-self-end" style="padding-right: 20px;">
          <div>
            <h2>Total Harga</h2>
            <h2 style="padding-top: 15px;"><?= $sum; ?></h2>
          </div>
          <div style="padding-top: 15px;">
            <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- Akhir Cart -->

  <!-- footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>FLORIS-Copyright</strong> <i class="far fa-copyright"></i>- Create By Raha</p>
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