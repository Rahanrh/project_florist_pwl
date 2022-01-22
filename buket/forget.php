<?php

require 'koneksi.php';

if(isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encryption_pass = md5($password);
    $hasil = mysqli_query($koneksi,"UPDATE user SET password='$encryption_pass' WHERE username = '$username'");
    if($hasil){
        echo "<script>
    alert ('Berhasil Ganti password');
    document.location.href='login.php';
    </script>";
    }else{
        echo "<script>
    alert ('Gagal Ganti Password');
    document.location.href='forget.php';
    </script>";
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-5 cardcs">
    <div class="card">
      <div class="card-header text-center">
        Lupa Password
  </div>
  <div class="card-body">
        <form action="" method="POST">
          <!-- username -->
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="username" id="username" require>
            <label for="username">Username</label>
          </div>
          <!-- password -->
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password" require>
            <label for="password">Password</label>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit" name="submit">Ganti Password</button>
            </div><br>
            <div class="d-grid">
            <a href="register.php"><button class="btn btn-primary" type="button">Registrasi</button></a>
        </div><br>
          </div>
        </form>
      </div>
    </div>
  </div>
    
</body>
</html>
