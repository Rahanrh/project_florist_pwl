<?php

require_once '../../helper.php';

$koneksi = mysqli_connect("localhost", "root", "", "florist");
$flashdata = get_flashdata();
$alert = '';

if (isset($flashdata['err'])) {
    $alert .= $flashdata['err'] . "\n";
}

if (isset($flashdata['msg'])) {
    $alert .= $flashdata['msg'] . "\n";
}

$flash_sale = mysqli_query($koneksi, "SELECT * FROM flash_sale")
    or die(mysqli_error($koneksi));

$flash_sale = mysqli_fetch_all($flash_sale, MYSQLI_ASSOC);

$produk_bunga = mysqli_query($koneksi, "SELECT id_bunga, nama_bunga FROM prodak_bunga")
    or die(mysqli_error($koneksi));

$produk_bunga = mysqli_fetch_all($produk_bunga, MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <title>Input Produk Flash Sale</title>
</head>

<body>
    <!-- Input Flash Sale -->
    <div class="container">
        <h3 class="text-center mt-3 mb-5">Input Flash Sale</h3>
        <div class="card p-5 mb-5">
            <a href="index.php">
                <ion-icon name="arrow-back-outline"></ion-icon> Kembali
            </a>
            <?php if ($alert != '') : ?>
                <p class="bg-warning"><?php echo ("$alert"); ?></p>
            <?php endif ?>
            <form method="POST" action="proses_input.php">
                <div class="form-group">
                    <label for="id_bunga">Produk Bunga</label>
                    <select class="form-control" name="id_bunga" id="id_bunga" required>
                        <?php foreach ($produk_bunga as $row) : ?>
                            <option value="<?php echo $row['id_bunga'] ?>"><?php echo $row['nama_bunga'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_flash_sale">Periode Flash Sale</label>
                    <select class="form-control" name="id_flash_sale" id="id_flash_sale" required>
                        <?php foreach ($flash_sale as $row) :
                            $flash_start = date_format(new DateTime($row['flash_start']), 'j M Y H:i:s');
                            $flash_end = date_format(new DateTime($row['flash_end']), 'j M Y H:i:s');
                        ?>
                            <option value="<?php echo $row['id_flash_sale'] ?>"><?php echo $flash_start . ' s/d ' . $flash_end ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="diskon">Diskon %</label>
                    <input type="number" class="form-control" id="diskon" name="diskon" min="0" max="100">
                    <p class="text-muted">Jika diskon kosong maka secara otomatis akan mengikuti diskon pada periode flash sale yang dipilih</p>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="tambah">Input Flash Sale</button>
                <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
                <a href="../../home_admin.php" class="btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>
</body>

</html>