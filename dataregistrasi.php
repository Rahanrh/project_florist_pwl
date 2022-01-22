<?php
// require 'koneksi.php';

$koneksi = mysqli_connect("localhost", "root", "", "florist");


//membuat id_user secara asyncrhonus
$max = mysqli_query($koneksi, "SELECT MAX(id_user) as new_user from user");
$row = mysqli_fetch_array($max)["new_user"];
$new_iduser = substr($row, 2);
$tambah = $new_iduser + 1;
$id_user = "UF" . sprintf("%08d", $tambah);

// $id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama_lengkap = $_POST['nama_lengkap'];
$alamat = $_POST['alamat'];
// $status = $_POST['status'];





if (!$hasil = mysqli_query($koneksi, "INSERT INTO user (id_user,username,password,nama_lengkap,alamat,status) 
                            values('$id_user','$username','$password','$nama_lengkap','$alamat','user')")) {
    die(mysqli_error($koneksi));
} else {
    echo "number of row " . mysqli_affected_rows($koneksi) . "<br>";
}
if ($hasil > 0) {
    echo "<script>
    alert ('Berhasil Registrasi');
    document.location.href='login.php';
    </script>";
} else {
    echo "<script>
    alert ('Gagal Registrasi');
    document.location.href='registrasi.php';
    </script>";
}
