<?php
include("koneksi.php");
// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.3.1/css/rowReorder.dataTables.min.css">

    <title>Data Barang</title>
</head>

<body>
    <div class="container">
        <br>
        <h1>Data Barang</h1>
        <hr>
        <a class="btn btn-primary" href="tambah.php" role="button"><i class="bi bi-plus-circle"></i> Tambah Data</a>
        <div class="main">
            <br>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr align="center">
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php if ($result) : ?>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                        <tr>
                            <td align="center"><?php echo "<img src='img/$row[gambar]' width='150' height='100' />"; ?></td>
                            <td align="center"><?= $row['nama']; ?></td>
                            <td align="center"><?= $row['kategori']; ?></td>
                            <td align="center"><?= $row['harga_beli']; ?></td>
                            <td align="center"><?= $row['harga_jual']; ?></td>
                            <td align="center"><?= $row['stok']; ?></td>
                            <td align="center">
                                <a class="btn btn-warning btn-sm" href="ubah.php?id=<?php echo $row['id_barang']; ?>" role="button"><i class="bi bi-pencil-square"></i></a>
                                <a class="btn btn-danger btn-sm" href="hapus.php?id=<?php echo $row['id_barang']; ?>" role="button"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    <?php endwhile;
                else : ?>
                    <tr>
                        <td colspan="7">Belum ada data</td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Data Tables JS -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>

</body>

</html>