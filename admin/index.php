<!-- <?php
			session_start();
			//berfungsi mengecek apakah user sudah login atau belum
			if ($_SESSION['status'] == "") {
				header("location:../index.php?alert=belum_login");
			}

			?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin - www.belejarwithib.my.id</title>
</head>
<body>
	<h1>Halaman Admin</h1>

	<p>Halo <b><?php echo $_SESSION['nama_lengkap']; ?><br></b> Anda telah login sebagai <b><?php echo $_SESSION['status']; ?></b>.</p>
	<a href="../function/logout.php">logout</a>
</body>
</html> -->