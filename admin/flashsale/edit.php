<?php
require_once '../../helper.php';
require_once '../../koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM flash_sale WHERE id_flash_sale = $id") 
    OR die(mysqli_error($koneksi));

$result = mysqli_fetch_assoc($data);
if (!$result) {
    http_response_code(404);
    exit();
}

$result['flash_start'] = (new DateTime($result['flash_start']))->format('Y-m-d\TH:i:s');
$result['flash_end'] = (new DateTime($result['flash_end']))->format('Y-m-d\TH:i:s');

$flashdata = get_flashdata();
$alert = '';

if (isset($flashdata['err'])) {
    $alert .= $flashdata['err']."\n";
}

if (isset($flashdata['msg'])) {
    $alert .= $flashdata['msg']."\n";
}
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
    <title>Edit Flash Sale</title>
</head>

<body>
<!-- Input Flash Sale -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">Input Flash Sale</h3>
    <div class="card p-5 mb-5">
        <a href="index.php"><ion-icon name="arrow-back-outline"></ion-icon> Kembali</a>
        <?php if ($alert != ''): ?>
        <p class="bg-warning"><?php echo("$alert"); ?></p>
        <?php endif ?>
        <form method="POST" action="proses_edit.php?id=<?php echo $result['id_flash_sale'] ?>">
            <div class="form-group">
                <label for="flash_start">Date & Time Flash Sale Start </label>
                <input type="datetime-local" class="form-control" id="flash_start" name="flash_start" required value="<?php echo $result['flash_start'] ?>">
            </div>
            <div class="form-group">
                <label for="flash_end">Date & Time Flash Sale End</label>
                <input type="datetime-local" class="form-control" id="flash_end" name="flash_end" required value="<?php echo $result['flash_end'] ?>">
            </div>
            <div class="form-group">
                <label for="diskon">Diskon %</label>
                <input 
                    type="number" 
                    class="form-control" 
                    id="diskon" 
                    name="diskon" 
                    min="0"
                    max="100"
                    value="<?php echo $result['default_discount'] ?>">
            </div>

            <br>
            <button type="submit" class="btn btn-success" name="tambah">Edit</button>
            <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
            <a href="home_admin.php" class="btn btn-warning">Cancel</a>
        </form>
    </div>
</div>
</body>

</html>