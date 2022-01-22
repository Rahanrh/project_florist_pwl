<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "florist");
if ($_GET["action"] === "hapus") {
    //Hapus Data

    //menginisialisasi variabel $menu_kode
    $id_cart = $_GET["id_cart"];

    //query hapus

    $hapus = mysqli_query($conn, "DELETE FROM cart WHERE id_cart='$id_cart'");
    if ($hapus) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                location='cart.php';
            </script>
            ";
    } else {
        echo "
    <script>
        alert('Data Berhasil Dihapus');
        window.history.go(-1);
    </script>
    ";
    }
}
