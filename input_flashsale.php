<?php
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


  <title>Input Flash Sale</title>
</head>

<body>

  <!-- Input Flash Sale -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">Input Flash Sale</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id_bunga">Input ID Bunga</label>
          <input type="text" class="form-control" id="id_bunga" name="id_bunga" required>
        </div>
        <div class="form-group">
          <label for="id_flash_sale">Input ID Flash Sale</label>
          <input type="text" class="form-control" id="id_flash_sale" name="id_flash_sale" required>
        </div>
        <div class="form-group">
          <label for="flash_start">Date & Time Flash Sale Start </label>
          <input type="datetime-local" class="form-control" id="flash_start" name="flash_start">
        </div>
        <div class="form-group">
          <label for="flash_end">Date & Time Flash Sale End</label>
          <input type="datetime-local" class="form-control" id="flash_end" name="flash_end">
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="tambah">Input Flash Sale</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
        <a href="home_admin.php" class="btn btn-warning">Cancel</a>
      </form>

      <?php
      if (isset($_POST['tambah'])) {
        $id_bunga = $_POST['id_bunga'];
        $id_flash_sale = $_POST['id_flash_sale'];
        $flash_start = $_POST['flash_start'];
        $flash_end = $_POST['flash_end'];

        $insert = mysqli_query($koneksi, "INSERT INTO produk_flashsale (id_bunga,id_flash_sale) VALUES ('$id_bunga','$id_flash_sale')");
        $insert .= mysqli_query($koneksi, "INSERT INTO flash_sale (id_flash_sale,flash_start,flash_end)VALUES('$id_flash_sale','$flash_start','$flash_end')");
        if ($insert) {
          header("location: home_admin.php");
        } else {
          echo "gagal input data ";
        }
      }

      ?>

    </div>
  </div>
</body>

</html>