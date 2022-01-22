<?php

require "koneksi.php";
if(!empty($_POST)){

    // memasukkan data dari user ke dalam variabel
    $id_bunga = $_POST['id_bunga'];
    $id_kategori = $_POST['id_kategori'];
    $nama_bunga = $_POST['nama_bunga'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $tanggal = $_POST['date'];
    $deskripsi = $_POST['deskripsi'];


    if (isset($_POST['submit'])) {

       //print_r($_FILES);
        //die("here");

        $nama_file = microtime(). $_FILES ['file']['name'];
        $ukuran_file = $_FILES ['file']['size'];
        $tmp_name = $_FILES ['file']['tmp_name'];
        $ext = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));

        

        // Check file size
        if ($ukuran_file > 1000000) {
        die("Sorry, your file is too large.");
         $uploadOk = 0;
        }
  
        // Allow File
        if (
            $ext != "jpg" && $ext != "png" && $ext != "jpeg"
            && $ext != "gif"
        ) {
            die ("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }

        if(move_uploaded_file($tmp_name,'img/prodak/bouquet/'.$nama_file)){
        // memasukkan data ke database
        $sql = mysqli_query($koneksi,"INSERT INTO prodak_bunga (id_bunga,id_kategori,nama_bunga,harga,stok,gb_bunga,created_at,deskripsi) 
        values('$id_bunga','$id_kategori','$nama_bunga','$harga','$stok','$nama_file','$tanggal','$deksripsi')");
        }else{
            die("upload gagal");
        }
    
        
        if ($sql) {
            echo "<script>alert('Data berhasil dimasukkan');location='index.php';</script>";
        } else {
            echo "<script>alert('Data tidak berhasil dimasukkan');location='form.php';</script>";
        }
    }



}
?>