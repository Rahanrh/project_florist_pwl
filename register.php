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
  </style>
  <title>Login</title>
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

  <!-- Form -->
  <div class="container mt-5 cardcs">
    <div class="card">
      <div class="card-header text-center">
        <h3>Register</h3>
      </div>
      <form method="POST" action="dataregistrasi.php">
        <!-- username -->
        <!-- <div class="form-floating mb-3">
            <input type="text" name="id_user" class="form-control" id="id_user" require>
            <label for="id_user">id_user</label>
          </div> -->
        <div class="form-floating mb-3">
          <input type="text" name="username" class="form-control" id="username" require>
          <label for="username">Username</label>
        </div>
        <!-- password -->
        <div class="form-floating mb-3">
          <input type="password" name="password" class="form-control" id="password" require>
          <label for="password">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" require>
          <label for="nama_lengkap">nama lengkap</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="alamat" class="form-control" id="alamat" require>
          <label for="alamat">Alamat</label>
        </div>
        <!-- <select class="form-control" name="status" id="status" require>
          <option selected>Pilih Status</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select><br> -->
        <div class="d-grid">
          <button class="btn btn-primary" type="submit" name="register">Register</button>
        </div>
      </form>
    </div>
  </div>
  </div>
  <!-- Akhir Form -->

  <!-- footer -->
  <hr class="footer">
  <div class="container">
    <div class="row footer-body">
      <div class="col-md-6">
        <div class="copyright">
          <strong>FLORIST KELOMPOK 9</strong><i class="far fa-copyright">built by farhan</i>
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