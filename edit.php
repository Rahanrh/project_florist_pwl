<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "florist");
$koneksi = mysqli_connect("localhost", "root", "", "florist");

if (isset($_GET["edit"])) {
  $id_cart = $_GET["edit"];
  $new_jumlah = $_GET["new_jumlah"];

  $show_col = mysqli_query($conn, "SELECT * FROM cart INNER JOIN prodak_bunga ON cart.id_bunga = prodak_bunga.id_bunga WHERE id_cart='$id_cart'");
  $row = mysqli_fetch_array($show_col);
  $harga = $row["harga"];
  $new_harga = $new_jumlah * $harga;

  $edit = "UPDATE cart SET jumlah='$new_jumlah', harga_cart='$new_harga' WHERE id_cart='$id_cart'";
  if ($new_jumlah == $row["jumlah"]) {
    header("location:cart.php");
  } elseif (mysqli_query($conn, $edit)) {
    echo "
            <script>
                alert('Pesan Anda Berhasil diubah');
                location='cart.php';
            </script>
            ";
  }
}
