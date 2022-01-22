<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-5 cardcs">
    <div class="card">
      <div class="card-header text-center">
        Tambah Bucket Bunga
  </div>
  <div class="card-body">
  <form method="POST" action="proses_tambah.php">
  <div class="mb-3">
    <label class="form-label">ID Bunga</label>
    <input type="text" class="form-control" name="id_bunga" id="id_bunga" require>
  </div>
  <div class="mb-3">
    <label class="form-label">ID Kategori</label>
    <input type="text" class="form-control" name="id_kategori" id="id_kategori" require>
  </div>
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama_bunga" id="nam_bunga" require>
  </div>
  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="text" class="form-control" name="harga" id="harga" require>
  </div>
  <div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number" class="form-control" name="stok" id="harga" require>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar Bunga</label><br>
    <input type="file" class="form-control-file-border" name="gambar" id="gambar" require>
  </div>
  <div class="mb-3">
    <label class="form-label">Date</label>
    <input type="datetime-local" class="form-control" name="date" id="date" require>
  </div>
  <button type="submit" class="btn btn-primary" name="tambah_buket">Submit</button>
</form>
  </div>
</div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>