<?php include 'koneksi.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="cssshop/kategoricss.css">
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
    .headkategori{
      margin-top: 25px;
    margin-bottom: 50px;
    }
  </style>
  <title> Acrylic Blossom Box</title>
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
            <a class="nav-link" href="bouquet_admin.php">Shop</a>
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
  
  
  <!-- Katalog Bunga Christmas -->
    <div class="pembungkus">
        <div class="container-xxl">
            <div class="row">
                    <div class="col-sm-2">
                    <h6>Kategori Bunga</h6>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="bouquet_admin.php">Bouquet</a></li>
                        <li class="list-group-item"><a href="box_admin.php">Blossom Box</a></li>
                        <li class="list-group-item"><a href="acrylicbox_admin.php">Acrylic Blossom Box</a></li>
                        <li class="list-group-item"><a href="vase_admin.php">Vase</a></li>
                    </ul>
                    </div>
                    <div class="col-sm-10 ">
                    <div class="searchbox">
                          <form action="acrylicbox.php" method="get">
                          <div class="input-group">
                          <input type="text" name="cari" class="form-control rounded" placeholder="Cari nama bunga yang anda inginkan disini.." aria-label="Search"
                          aria-describedby="search-addon" />
                          <input type="submit" class="btn btn-outline-primary" value="cari" />
                          </form>
                    </div>
                    <div class="tambahdata" style="margin-top:25px;margin-left:900px;">
                    <a class="btn btn-primary" href="tambah_buket.php" role="button" style="">Tambah Data Bunga</a>
                    </div>
                      <div class="headkategori text-center">
                        <h1>Acrylic Blossom Box</h1>
                      </div>
                      <div class="row">
                        <?php 
                          $batas = 12;
                          $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                          $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

                          $previous = $halaman - 1;
                          $next = $halaman + 1;
                          
                          $data = mysqli_query($koneksi,"select * from prodak_bunga");
                          $jumlah_data = mysqli_num_rows($data);
                          $total_halaman = ceil($jumlah_data / $batas);

                          if(isset($_GET['cari'])){
                            $cari = $_GET['cari'];
                            $data_bunga = mysqli_query($koneksi,"select * from prodak_bunga where id_kategori = 'K-004' && nama_bunga like '%".$cari."%' order by id_bunga desc limit $halaman_awal, $batas");}
                          else{
                          $data_bunga = mysqli_query($koneksi,"select * from prodak_bunga where id_kategori = 'K-004' order by id_bunga desc limit $halaman_awal, $batas");}
                          $nomor = $halaman_awal+1;
                          while($d = mysqli_fetch_array($data_bunga)){
				                	?>
                            <div class="col-sm">
                            <a href='detail_acrylic.php?id_bunga=<?= $d['id_bunga']; ?>'><?="<img src='img/prodak/blossombox/".$d['gb_bunga']."'style='width:250px; height:350px;'>"?></a>
                            
                                <p class="bunga"><?php echo $d['nama_bunga']?></p>
                                <p class="hargabunga">RP. <?php echo $d['harga']?></p>
                           </div>
                           <?php
                            }
                            ?>
                      </div>
            </div>
        </div>

            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                  ?> 
                  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                  <?php
                }
                ?>				
                <li class="page-item">
                  <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
              </ul>
            </nav>
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