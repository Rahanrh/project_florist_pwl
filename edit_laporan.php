<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>update laporan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<?php

include "koneksi.php"; 

$id = $_GET['id']; 

$data = mysqli_query($koneksi,"select * from total_penjualan where id_penjualan='$id'");
            while($d = mysqli_fetch_array($data)){
            ?>
<div class="headkategori text-center">
  <h1>Edit Laporan</h1>
</div>
<div class="container" style="width:50%">
<form method="post" action="update.php">
  <div class="mb-3">
    <label class="form-label">id_laporan</label>
    <br>
    <input type="text" class="form-control" name="id_penjual" value="<?= $d['id_penjualan'] ?>" readonly><br>
    <input type="text" class="form-control" name="total_penjual" value="<?= $d['total_harga_penjualan'] ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="edit">Edit</button>
 </form>
 </div>

<?php
}
?>
<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


</body>
</html>