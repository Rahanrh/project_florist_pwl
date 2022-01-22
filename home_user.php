<?php
require 'koneksi.php';
$koneksi = mysqli_connect("localhost", "root", "", "florist");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
    .jumbotron {
      padding-top: 6rem;
      background-size: cover;
      height: auto;
      width: auto;
      color: white;
    }

    body {
      min-height: 2000px;
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
  </style>
  <title>Home Florist</title>
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
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Florist</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bouquet.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="custom.php">Costum Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- Awal Carousel -->

  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" class="active" aria-current="true" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" class="active" aria-current="true" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="2000">
        <a href="shop.php"><img src="img/carousel/dadi1.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <a href="shop.php"><img src="img/carousel/dadi2.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" ata-bs-interval="2000">
        <a href="shop.php"><img src="img/carousel/dadi3.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
      <div class="carousel-item" ata-bs-interval="2000">
        <a href="shop.php"><img src="img/carousel/dadi4.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Four slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
      <div class="carousel-item" ata-bs-interval="2000">
        <a href="shop.php"><img src="img/carousel/dadi5.jpg" class="d-block w-100" alt="..."></a>
        <div class="carousel-caption d-none d-md-block">
          <h5>Five slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- AKHIR CAROUSEL -->


  <!-- SPECIAL EDITION -->
  <section id="Shop">
    <div class="container">
      <p class="text-center" id="shop"></p>
      <?php

      date_default_timezone_set('Asia/Jakarta');
      $tanggalSekarang = date_format(new DateTime(), "Y-m-d H:i:s");
      $query = mysqli_query($koneksi, "
        SELECT * 
        FROM prodak_bunga 
        JOIN produk_flashsale ON prodak_bunga.id_bunga = produk_flashsale.id_bunga 
        JOIN flash_sale ON produk_flashsale.id_flash_sale = flash_sale.id_flash_sale 
        WHERE '$tanggalSekarang' BETWEEN flash_start and flash_end ORDER BY flash_start DESC");

      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
      ?>
      <script>
        // Mengatur waktu akhir perhitungan mundur
        var flashEnd = new Date('<?php echo $result[0]["flash_end"]; ?>').getTime();

        // Memperbarui hitungan mundur setiap 1 detik
        var x = setInterval(function() {

          // Untuk mendapatkan tanggal dan waktu hari ini
          var now = new Date().getTime();

          // Temukan jarak antara sekarang dan tanggal hitung mundur
          var distance = flashEnd - now;

          // Perhitungan waktu untuk hari, jam, menit dan detik
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Keluarkan hasil dalam elemen dengan id = "shop"
          document.getElementById("shop").innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("shop").innerHTML = "BREAK TIME FLASH SALE";
          }
        }, 1000);
      </script>
      <div class="row ">
        <div class="row  text-center">
          <div class="col mt-4">
            <h2 class="p1">CHRISTMAS SPECIAL EDITION FLASH SALE</h2>
          </div>
        </div>
        <!-- CRUD FLASH SALE PRODAK + TABLE FLASH SALE  -->
        <?php foreach ($result as $result) :
          $diskon = !empty($result['diskon']) ? $result['diskon'] : $result['default_discount'];
        ?>
          <div class="col-md-3 mt-3">
            <div class="card">
              <a href='detail_bouquet.php?id_bunga=<?= $result['id_bunga']; ?>'>
                <img src="img/prodak/bouquet/<?= $result['gb_bunga'] ?>" class="card-img-top" alt=""></a>
              <div class="card-body">
                <!-- <h1 class="card-tittle fs-6 p1"><? $result[''] ?></h1> -->
                <label class="card-tittle fs-6 p1" style="font-weight: bold;"><?= $result['nama_bunga'] ?></label><br>
                <div class="badge rounded-pill bg-primary">Diskon <?php echo $diskon ?>%</div><br />
                <label class="card-text harga">
                  <strike>
                    <strong class="p1">Rp. </strong>
                    <?= number_format($result['harga']); ?>
                  </strike>
                </label>
                <label class="card-title harga">
                  <strong class="p1">Rp. </strong>
                  <?= number_format($result['harga'] - $result['harga'] * $diskon / 100); ?>
                </label>
                <!-- <label class="card-tittle fs-6 p1"><strong class="p1">Flash Start : </strong><?= $result['flash_start'] ?></label><br> -->
                <!-- <label class="card-tittle fs-6 p1"><strong class="p1">Flash End : </strong><?= $result['flash_end'] ?></label><br> -->
              </div>
            </div>
          </div>
        <?php endforeach;
        ?>
      </div>
    </div>
    <div class="d-grid gap-6 col-3 mx-auto mt-3">
      <a href="bouquet.php" class="btn btn-warning">VIEW CATALOG</a>
    </div>
  </section>
  <!-- AKHIR FLASH SALE -->

  <!-- NEWS PRODAK -->
  <section id="shop">
    <div class="container">
      <div class="row mt-3">
        <div class="row  text-center">
          <div class="col mt-4">
            <h2 class="p1">NEW PRODUCTS </h2>
          </div>
        </div>

        <?php

        // include('koneksi.php');
        $koneksi = mysqli_connect("localhost", "root", "", "florist");

        $query = mysqli_query($koneksi, "SELECT prodak_bunga.*, prodak_bunga.id_bunga , kategori.nama_kategori FROM prodak_bunga INNER JOIN kategori ON prodak_bunga.id_kategori = kategori.id_kategori ORDER BY created_at DESC limit 4"); // membuat semua kolom
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        <?php foreach ($result as $result) :
        ?>
          <div class="col-md-3 mt-3">
            <div class="card">
              <a href='detail_bouquet.php?id_bunga=<?= $result['id_bunga']; ?>'>
                <img src="img/prodak/bouquet/<?= $result['gb_bunga'] ?>" class="card-img-top" alt=""></a>
              <div class="card-body">
                <h1 class="card-tittle fs-6 p1"><?= $result['nama_bunga'] ?></h1>
                <label class="card-tittle fs-6 p1"><strong class="p1">Kategori : </strong><?= $result['nama_kategori'] ?></label><br>
                <label class="card-text harga"><strong class="p1">Rp. </strong><?= number_format($result['harga']); ?></label>
              </div>
            </div>
          </div>
        <?php endforeach;
        ?>
      </div>
    </div>
    <div class="d-grid gap-6 col-3 mx-auto mt-3">
      <a href="bouquet.php" class="btn btn-warning">VIEW CATALOG</a>
    </div>
  </section>
  <!-- AKHIR NEW PRODAK -->

  <!-- AWAL BEST SELLER -->
  <section id="shop">
    <div class="container">
      <div class="row mt-3">
        <div class="row  text-center">
          <div class="col mt-4">
            <h2 class="p1">BEST SELLER</h2>
          </div>
        </div>

        <?php

        // include('koneksi.php');
        $koneksi = mysqli_connect("localhost", "root", "", "florist");

        $menu = query("SELECT prodak_bunga.*, SUM(detail_pembayaran.jumlah) as jumlah, pembayaran.tgl_pembayaran
        FROM detail_pembayaran
        JOIN prodak_bunga
            ON prodak_bunga.id_bunga = detail_pembayaran.id_bunga
        JOIN pembayaran
            ON detail_pembayaran.id_pembayaran = pembayaran.id_pembayaran
        GROUP BY prodak_bunga.id_bunga
        HAVING jumlah >=9 ORDER BY jumlah DESC limit 4");

        // $query = mysqli_query($koneksi, "SELECT prodak_bunga.*,SUM(total_bunga_terjual) AS sold FROM prodak_bunga JOIN total_bunga_terjual ON total_bunga_terjual.id_bunga = prodak_bunga.id_bunga GROUP BY total_bunga_terjual.id_bunga HAVING sold >= 30 ORDER BY sold DESC");
        //$results = mysqli_fetch_array($query);





        ?>
        <?php foreach ($menu as $row) :
        ?>
          <div class="col-md-3 mt-3">
            <div class="card">
              <a href='detail_bouquet.php?id_bunga=<?= $row['id_bunga']; ?>'>
                <img src="img/prodak/bouquet/<?= $row['gb_bunga'] ?>" class="card-img-top" alt=""></a>
              <div class="card-body">
                <h1 class="card-tittle fs-6 p1"><?= $row['nama_bunga'] ?></h1>
                <label class="card-tittle fs-6 p1"><?= $row['jumlah'] ?></label><strong class="p1"> Sold </strong><br>
              </div>
            </div>
          </div>
        <?php endforeach;
        ?>
      </div>
    </div>
    <div class="d-grid gap-6 col-3 mx-auto mt-3">
      <a href="artificialflowers.php" class="btn btn-warning">VIEW CATALOG</a>
    </div>
  </section>
  <!-- AKHIR BEST SELLER -->

  <!-- ABOUT -->

  <!-- <section id="About">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h2 class="p1">SELAMAT DATANG DI TOKO FLORIST</h2>
        </div>
      </div>
      <div class="row justify-content-center fs-5 p1">
        <div class="col-md-5">
          <p>La Madame Florist is a flower house located in North Jakarta, Pantai Indah Kapuk. We've been serving you since 2013 and it feels amazing to be a "Messenger" to our beloved customers for the past years. Professionally curated by a local expert La Madame Florist, with more than hundreds of bouquet, flower box, flower basket and gift options to choose from, whatever may be the occasion: season’s greeting, anniversary, graduation wishes, birthday, valentines, wedding, engagement, newborn, Christmas, Eid Mubarak and many more categories that cover the entire canvas of life.</p>
          <P>It is perhaps the most used and successful form of communicating your feelings to those you care about. At La Madame Florist, we realize the worth of your emotions which is what makes us the number one choice for sending out your love to dear ones. Be it a happy occasion or a sad one. La Madame Florist is just a click away.</P>
          <P>A good life is a collection of happy moments. Let’s create your happy moments with us.</P>
        </div>
        <div class="col-md-5">
          <img src="img/background/profile/profile2.jpg" height="60%" alt="">
        </div>
      </div>
    </div>
  </section> -->
  <!-- akhir about -->


  <!-- contact -->
  <section>
    <div id="Contact">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col ">
            <h3>Contact Me</h3>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Full name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Full Name">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Email Address">
              </div>
              <div class="mb-3">
                <label for="pesan" class="form-label">Message</label>
                <textarea class="form-control" id="pesan" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir contact -->

  <!-- Maps -->
  <div class="container"></div>

  <!-- akhir -->
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