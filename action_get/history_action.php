<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "florist");
if ($_GET["action"] === "ubah") {
    //menginisialisasi variabel $menu_kode
    $id_pembayaran = $_GET["id_pembayaran"];

    //query edit



    $show = mysqli_query($conn, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
    $row = mysqli_fetch_array($show)['status'];
    // echo $row."<br>";
    // echo $id_pembayaran;
    if ($row == 'belum dibayar') {
        $query = mysqli_query($conn, "UPDATE pembayaran SET status='sudah dibayar' WHERE id_pembayaran='$id_pembayaran'");
        if ($query) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    location='../history_pembayaran.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah');
                    location='../history_pembayaran.php';
                </script>
                ";
        }
    } elseif ($row == 'sudah dibayar') {
        $query = mysqli_query($conn, "UPDATE pembayaran SET status='belum dibayar' WHERE id_pembayaran='$id_pembayaran'");
        if ($query) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');
                    location='../history_pembayaran.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah');
                    location='../history_pembayaran.php';
                </script>
                ";
        }
    } else {
        echo "
                <script>
                    alert('Gak ruh');
                    location='../history_pembayaran.php';
                </script>
                ";
    }
} elseif ($_GET["action"] === "hapus") {
    //Hapus Data

    //menginisialisasi variabel $menu_kode
    $id_pembayaran = $_GET["id_pembayaran"];

    $show = mysqli_query($conn, "SELECT * FROM detail_pembayaran WHERE id_pembayaran = '$id_pembayaran'");

    while ($row = mysqli_fetch_array($show)) {
        $id_bunga = $row['id_bunga'];
        $jumlah = $row['jumlah'];
        mysqli_query($conn, "UPDATE prodak_bunga SET stok = stok+'$jumlah' WHERE id_bunga = '$id_bunga'");
    }

    //query hapus
    mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
    mysqli_query($conn, "DELETE FROM detail_pembayaran WHERE id_pembayaran='$id_pembayaran'");
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            location='../history_pembayaran.php';
        </script>
        ";
}
