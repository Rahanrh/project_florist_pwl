<?php
include('koneksi.php');

$id_bunga = $_GET['id_bunga'];


if (!$ambil = mysqli_query($koneksi, "SELECT produk_flashsale.id_bunga,produk_flashsale.diskon, flash_sale.id_flash_sale ,flash_sale.flash_start,flash_sale.flash_end
                                      FROM produk_flashsale
                                      INNER JOIN flash_sale ON produk_flashsale.id_flash_sale = flash_sale.id_flash_sale
                                      WHERE id_bunga='$id_bunga'")) {
  die(mysqli_error($koneksi));
}
$result = mysqli_fetch_assoc($ambil);

var_dump($result);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>EDIT PRODUCT FLASH SALE</title>
</head>

<body>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  <div class="container">
    <h3 class="text-center mt-3 mb-5">Edit Prodak Flash Sale</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="edit_flash.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="id_bunga">Input ID Bunga</label>
          <input type="text" class="form-control" id="id_bunga" name="id_bunga" value="<?php echo $result["id_bunga"];  ?>" required>
        </div>
        <div class="form-group">
          <label for="id_flash_sale">Input ID Flash Sale</label>
          <input type="text" class="form-control" id="id_flash_sale" name="id_flash_sale" value="<?php echo $result["id_flash_sale"]; ?>" required>
        </div>
        <div class="form-group">
          <label for="flash_start">Date & Time Flash Sale Start </label>
          <input type="datetimepicker" class="form-control" id="flash_start" name="flash_start" value="<?php echo $result["flash_start"]; ?>">
        </div>
        <div class="form-group">
          <label for="flash_end">Date & Time Flash Sale End</label>
          <input type="datetimepicker" class="form-control" id="flash_end" name="flash_end" value="<?php echo $result["flash_end"]; ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="edit">Ubah Flash Sale</button>
        <a href="home_admin.php" class="btn btn-danger">Cancel</a>
      </form>
</body>

</html>