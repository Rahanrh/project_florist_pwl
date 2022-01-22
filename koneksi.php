<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "florist");
$koneksi = mysqli_connect("localhost", "root", "", "florist");
function validate($data)
{
  $data = trim($data); // " String   " -> "String"
  $data = stripslashes($data); // " \n \fsaf" -> "n fsaf"
  $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
  return $data;
}

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);

  //menginisialisasi parameter $rows
  $rows = [];

  //memanggil semua data yang ada di database
  while ($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function cari($keyword)
{
  $query = "SELECT * FROM pembayaran WHERE id_user='$keyword' or id_pembayaran = '$keyword'";
  return query($query);
}

if (!empty($_POST)) {
  if (isset($_POST['custom'])) {
    //mengecek apakah ada sesion login apa tidak
    if (!isset($_SESSION['id_user'])) {
      echo "
            <script>
                alert('Anda Harus Login Terlebih Dahulu untuk membuat Custom Order');
                location='login.php';
            </script>
            ";
    }

    //inisialisasi pengambilan data dari database
    $id = $_SESSION["id_user"];
    // echo $id;
    $show_col = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id'");
    $row = mysqli_fetch_array($show_col);

    $id_user = $row['id_user'];
    // echo $id_user;

    $nama_lengkap = $row['nama_lengkap'];
    // echo $nama_lengkap;
    // memvalidasi isi form
    $email = validate($_POST['email']);
    $phone_number = validate($_POST['phone_number']);
    $order_message = validate($_POST['order_message']);

    //menginisialisasi query kedalam bentuk variabel
    $message = "INSERT INTO custom_order(id_user, nama_lengkap, email, phone_number, order_message) VALUES ('$id_user',  '$nama_lengkap' , '$email', '$phone_number', '$order_message' )";

    $query_edit = mysqli_query($conn, $message);

    if ($query_edit) {
      echo "
            <script>
                alert('Pesanan Anda sudah terkirim, mohon ditunggu');
                location='custom.php';
            </script>
            ";
    } else {
      echo "
            <script>
                alert('Pesanan anda gagal terkirim, coba ulangi lagi');
                window.history.go(-1);
            </script>
            ";
    }
  } elseif (isset($_POST['bayar'])) {
    //timezone
    date_default_timezone_set('Asia/Jakarta');

    // id_pembayaran baru
    // $cart = implode($_POST["id"]);
    // echo $cart[0];

    $max = mysqli_query($conn, "SELECT MAX(id_pembayaran) as new_idPembayaran from pembayaran");
    $row = mysqli_fetch_array($max)["new_idPembayaran"];
    $new_idPembayaran = substr($row, 4);
    $tambah = $new_idPembayaran + 1;
    $id_Pembayaran = "BY" . sprintf("%09d", $tambah);

    // $show_cart = mysqli_query($conn, "SELECT * from cart WHERE id_cart = '$cart'");
    // $us = mysqli_fetch_array($show_cart);
    // $user = $us['id_user'];
    // echo $user;

    $bayar = "INSERT INTO pembayaran(id_pembayaran, id_user, total_harga_pembayaran, tgl_pembayaran, expired, jenis_pembayaran, status) VALUES ('$id_Pembayaran',  '' , '', '', '', '', '')";

    $pembayaran = mysqli_query($conn, $bayar);

    //input table Detail Pembayaran
    if ($pembayaran) {
      foreach ($_POST["id"] as $id) {
        $new_showCart = mysqli_query($conn, "SELECT * from cart WHERE id_cart = $id");
        $new_row = mysqli_fetch_array($new_showCart);
        $id_user = $new_row['id_user'];
        $id_bunga = $new_row['id_bunga'];
        $jumlah = $new_row['jumlah'];
        $harga = $new_row['harga_cart'];
        $new_bayar = "INSERT INTO detail_pembayaran (id_pembayaran, id_bunga, jumlah, harga) VALUES ('$id_Pembayaran',  '$id_bunga' , '$jumlah', '$harga')";
        $detailPembayaran = mysqli_query($conn, $new_bayar);

        //pengurangan stok prodak_bunga
        if ($detailPembayaran) {
          mysqli_query($conn, "UPDATE pembayaran SET id_user='$id_user' WHERE id_pembayaran = '$id_Pembayaran'");
          $editprodak = mysqli_query($conn, "UPDATE prodak_bunga SET stok=stok-'$jumlah' WHERE id_bunga = '$id_bunga'");
          //penghapusan cart yang sudah akan dibayar
          if ($editprodak) {
            mysqli_query($conn, "DELETE FROM cart WHERE id_cart=$id");
          }
        }
      }
    }

    // penyelesaian input table pembayaran
    $show_detailPembayaran = mysqli_query($conn, "SELECT SUM(harga) AS total FROM detail_pembayaran WHERE id_pembayaran = '$id_Pembayaran'");
    $row_total_detailPembayaran = mysqli_fetch_array($show_detailPembayaran)["total"];
    $dateNow = new DateTime('now');
    $new_dateNow = $dateNow->format('Y-m-d H:i:s');
    $dateExpired = new DateTime('+1 day');
    $new_dateExpired = $dateExpired->format('Y-m-d H:i:s');
    $jenis_pembayaran = $_POST['jenis_pembayaran'];

    $newBayar = "UPDATE pembayaran SET total_harga_pembayaran='$row_total_detailPembayaran', tgl_pembayaran='$new_dateNow', expired='$new_dateExpired', jenis_pembayaran='$jenis_pembayaran', status='belum dibayar' WHERE id_pembayaran='$id_Pembayaran'";

    $newPembayaran = mysqli_query($conn, $newBayar);
    if ($newPembayaran) {
      echo "
        <script>
            alert('Mohon untuk segera selesaikan pembayaran');
            location='pembayaran.php'
        </script>
        ";
    } else {
      echo "
        <script>
            alert('Pembayaran gagal');
            location='cart.php'
        </script>
        ";
    }
  } elseif (isset($_POST['tambah'])) {
    $jumlah = $_POST['jumlah'];

    $id_user = $_SESSION['id_user'];
    // echo $id_user;
    $id_bunga = $_POST['tambah'];
    // echo $id_bunga;
    $show = mysqli_query($conn, "SELECT * FROM prodak_bunga WHERE id_bunga='$id_bunga'");

    $row = mysqli_fetch_assoc($show);

    $harga = $row['harga'];
    // echo $harga;
    $newjumlah = $jumlah * $harga;
    // echo $newjumlah;
    $gb = $row['gb_bunga'];
    // echo $gb;

    $tambah = "INSERT INTO cart(id_cart, id_user, id_bunga, gb_bunga, jumlah, harga_cart) VALUES ('','$id_user','$id_bunga','$gb','$jumlah','$newjumlah')";
    $query = mysqli_query($conn, $tambah);
    if ($query) {
      echo "
      <script>
          alert('Pesanan Anda sudah masuk ke keranjang');
          location='cart.php';
      </script>
      ";
    } else {
      echo "
      <script>
          alert('Pesanan Anda Tidak masuk ke keranjang');
          window.history.go(-1);
      </script>
      ";
    }
  }
}
