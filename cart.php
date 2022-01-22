<?php
session_start();
require 'koneksi.php';
$id_user =  $_SESSION['id_user'];
$menu = query("SELECT * FROM cart INNER JOIN prodak_bunga ON cart.id_bunga = prodak_bunga.id_bunga WHERE id_user='$id_user'");
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
          <li class="nav-item active" style="margin-left: 10px;">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item active" href="#">Cart</a></li>
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
    <form action="checkout.php" method="POST">
      <div class="card">
        <div class="card-header">
          <h5>Shopping Cart</h5>
        </div>
        <table class="table table-striped table-bordered">
          <thead class="align-middle">
            <tr>
              <th scope="col">
                <input class="form-check-input" type="checkbox" id="checkbox0" onchange="checkAll(this)">
              </th>
              <th scope="col">Nama Prodak</th>
              <th scope="col">Harga Satuan</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total Harga</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <!-- memanggil value dari database menggunakan parameter $cart sebagai $row -->
          <?php foreach ($menu as $row) { ?>
            <tr class="align-middle">
              <td>
                <input class="form-check-input" type="checkbox" name="checkbox[]" value="<?= $row["id_cart"]; ?>">
              </td>
              <td><?= $row["nama_bunga"]; ?></td>
              <td><?= $row["harga"]; ?></td>
              <td>
                <form action="edit.php" method="GET">
                  <div class="input-group">
                    <input class="form-control input-number" type="number" name="new_jumlah" value="<?= $row["jumlah"]; ?>" min="0" max="<?= $row["stok"]; ?>" style="width: 5px;">
                    <button class="btn btn-primary" name="edit" value="<?= $row["id_cart"]; ?>" style="margin-left: 5px;">EDIT</button>
                  </div>
                </form>
              </td>
              <td><?= $row["harga_cart"]; ?></td>
              <td>
                <div class="col">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus pesanan ini ?')" href="koneksihapus.php?action=hapus&id_cart=<?= $row["id_cart"]; ?>">
                      Delete
                    </a>
                  </div>
                </div>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
      <div class="card tbbwh">
        <div class="row row-cols-lg-5 g-2 align-items-center">
          <div class="col" style="width: 30px;">
            <input class="form-check-input" type="checkbox" id="checkbox0" onchange="checkAll(this)">
          </div>
          <div class="col-8">Pilih Semua</div>
          <div>
            <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="./js/cart.js"></script>
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