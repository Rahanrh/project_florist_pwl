<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "florist");
if ($_GET["action"] === "hapus") {
    //Hapus Data

    //menginisialisasi variabel $menu_kode
    $id_cart = $_GET["id_cart"];

    //query hapus
    mysqli_query($conn, "DELETE FROM cart WHERE id_cart='$id_cart'");
    echo "
            <script>
                alert('Data Berhasil Dihapus');
                location='../cart.php';
            </script>
            ";
}
