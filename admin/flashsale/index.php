<?php
require_once '../../koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM flash_sale")
    or die(mysqli_error($koneksi));

$result = mysqli_fetch_all($data, MYSQLI_ASSOC);

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

    <title>List Flash Sale</title>
</head>

<body>
    <!-- Input Flash Sale -->
    <div class="container">
        <h3 class="text-center mt-3 mb-5">List Flash Sale</h3>
        <div class="card p-5 mb-5">
            <div class="d-grid gap-2 d-md-block">
                <a href="input.php" class="btn btn-primary">Input Flash Sale</a>
                <a href="http://localhost/florist_project/home_admin.php" class="btn btn-info">Cancel</a>
            </div><br>
            <?php if (empty($result)) : ?>
                <p>Data belum ada</p>
            <?php else : ?>
                <table class="table table-responsive table-striped">
                    <thead>
                        <th>Aksi</th>
                        <?php foreach (array_keys($result[0]) as $column) : ?>
                            <th><?php echo $column ?></th>
                        <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $row) : ?>
                            <tr>
                                <td class="text-center">
                                    <a href="edit.php?id=<?php echo $row['id_flash_sale']; ?>" class="btn btn-sm btn-warning m-2">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id_flash_sale']; ?>" class="btn btn-sm btn-danger m-2">Hapus</a>
                                </td>
                                <?php foreach (array_keys($result[0]) as $column) : ?>
                                    <td><?php echo $row[$column] ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>