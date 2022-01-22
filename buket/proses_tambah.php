<?php
require 'koneksi.php';

$id_bunga = $_POST['id_bunga'];
$id_kategori = $_POST['id_kategori'];
$nama_bunga = $_POST['nama_bunga'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$source = $_POST['gambar'];
$date = $_POST['date'];

if(!$hasil = mysqli_query($koneksi,"INSERT INTO prodak_bunga (id_bunga,id_kategori,nama_bunga,harga,stok,gb_bunga,created_at) 
                            values('$id_bunga','$id_kategori','$nama_bunga','$harga','$stok','$source','$date')")){
    die(mysqli_error($koneksi));
} else{
    echo "number of row ".mysqli_affected_rows($koneksi) ."<br>";

}
if($hasil > 0){
    echo "<script>
    alert ('Berhasil Menambahkan');
    document.location.href='tambah_buket.php';
    </script>";
}else{
    echo "<script>
    alert ('Gagal Menambahkan');
    document.location.href='tambah_buket.php';
    </script>";
}
?>