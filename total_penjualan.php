<?php
require 'koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("location:login.php");
} else if ($_SESSION['status'] == 'user') {
    header("location:home_user.php");
}

$showTgl = mysqli_query($conn, "SELECT MIN(tgl_pembayaran) as mulai, MAX(tgl_pembayaran) as terakhir FROM pembayaran");

$tgl = mysqli_fetch_array($showTgl);

$mulai = date_create($tgl['mulai']);
$terakhir = date_create($tgl['terakhir']);
$terakhir->modify('+1 day');

$menu = query("SELECT prodak_bunga.id_bunga, prodak_bunga.nama_bunga, SUM(detail_pembayaran.jumlah) as total, pembayaran.tgl_pembayaran
FROM detail_pembayaran
JOIN prodak_bunga
	ON prodak_bunga.id_bunga = detail_pembayaran.id_bunga
JOIN pembayaran
	ON detail_pembayaran.id_pembayaran = pembayaran.id_pembayaran
GROUP BY prodak_bunga.id_bunga");

if (isset($_POST['submit'])) {
    $start = $_POST['start'];
    $end = $_POST['end'];

    $menu = query("SELECT prodak_bunga.id_bunga, prodak_bunga.nama_bunga, SUM(detail_pembayaran.jumlah) as total, pembayaran.tgl_pembayaran
            FROM detail_pembayaran
            JOIN prodak_bunga
                ON prodak_bunga.id_bunga = detail_pembayaran.id_bunga
            JOIN pembayaran
                ON detail_pembayaran.id_pembayaran = pembayaran.id_pembayaran
            WHERE pembayaran.tgl_pembayaran > '$start' && pembayaran.tgl_pembayaran <= '$end'
            GROUP BY prodak_bunga.id_bunga");

    $mulai = date_create($start);
    $terakhir = date_create($end);
}

$newMulai = date_format($mulai, 'Y-m-d');
$newTerakhir = date_format($terakhir, 'Y-m-d');
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

        .tbbwh {
            padding: 10px 5px 10px 10px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
    <title>History Pembayaran</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="login.php">Registrasi Admin</a></li>
                                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item active" style="margin-left: 10px;">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="#">Total Penjualan</a></li>
                                <li><a class="dropdown-item" href="history_pembayaran.php">History Pembayaran</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- cart -->
    <div class="container" style="padding-top: 100px; margin-bottom: 100px;">
        <div class="card mb-5">
            <div class="card-header">
                <h3>Periode Total Penjualan</h3>
            </div>
            <div class="card-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <h5>PERIODE</h5>
                        <div class="row ps-2">
                            <input type="date" class="form-control" name="start" value="<?= $newMulai ?>" style="width: 200px;">

                            <h6 class=" align-self-center" style="width: 50px;">s/d</h3>

                                <input type="date" class="form-control" name="end" value="<?= $newTerakhir ?>" style="width: 200px;">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                </form>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header">
                <h5>Total Penjualan</h5>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="align-middle">
                    <tr>
                        <th scope="col">Id Bunga</th>
                        <th scope="col">Nama Bunga</th>
                        <th scope="col">Total Penjualan</th>
                    </tr>
                </thead>
                <!-- memanggil value dari database menggunakan parameter $menu sebagai $row -->
                <?php foreach ($menu as $row) {
                ?>
                    <tr class="align-middle">
                        <td><?= $row["id_bunga"]; ?></td>
                        <td><?= $row["nama_bunga"]; ?></td>
                        <td><?= $row["total"]; ?></td>
                    </tr>
                <?php }; ?>
            </table>
        </div>
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