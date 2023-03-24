<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $file_gambar = $_FILES['file_gambar'];
    $gambar = null;

    if ($file_gambar['error'] == 0) {
        $filename = str_replace(' ', '_', $file_gambar['name']);
        $destination = dirname(__FILE__) . '/gambar/' . $filename;
        if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
            $gambar = 'gambar/' . $filename;;
        }
    }
    $sql = 'UPDATE data_barang SET ';
    $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
    $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}',
   stok = '{$stok}' ";
    if (!empty($gambar))
        $sql .= ", gambar = '{$gambar}' ";
    $sql .= "WHERE id_barang = '{$id}'";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);
function is_select($var, $val)
{
    if ($var == $val) return 'selected="selected"';
    return false;
}
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

    <title>Ubah Data Barang</title>
</head>

<body>
    <div class="container">
        <br>
        <h1>Ubah Data Barang</h1>
        <hr>
        <br>
        <div class="main">
            <form method="post" action="ubah.php" enctype="multipart/formdata">
                <div class="input">
                    <label>Nama Barang</label>&emsp;&emsp;&emsp;<input type="text" name="nama" value="<?php echo $data['nama']; ?>" />
                </div>
                <br>
                <div class="input">
                    <label>Kategori</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                    <select name="kategori">
                        <option value="Pilih Kategori"> ----- Pilih Kategori ----- </option>
                        <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Komputer">Komputer</option>
                        <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Elektronik">Elektronik</option>
                        <option <?php echo is_select('Komputer', $data['kategori']); ?> value="Hand Phone">Hand Phone</option>
                    </select>
                </div>
                <br>
                <div class="input">
                    <label>Harga Beli</label>&emsp;&emsp;&emsp;&emsp;
                    <input type="text" name="harga_beli" value="<?php echo $data['harga_beli']; ?>" />
                </div>
                <br>
                <div class="input">
                    <label>Harga Jual</label>&emsp;&emsp;&emsp;&emsp;
                    <input type="text" name="harga_jual" value="<?php echo $data['harga_jual']; ?>" />
                </div>
                <br>
                <div class="input">
                    <label>Stok</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                    <input type="text" name="stok" value="<?php echo $data['stok']; ?>" />
                </div>
                <br>
                <div class="input">
                    <label>File Gambar</label></label>&emsp;&emsp;&ensp;&ensp;
                    <input type="file" name="file_gambar" />
                </div>
                <br>
                <div class="submit">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="hidden" class="btn btn-primary" name="id" value="<?php echo $data['id_barang']; ?>" />
                    <input type="submit" class="btn btn-primary" name="submit" value="Simpan" />
                    <a class="btn btn-outline-primary" href="index.php" role="button">Batal</a>
                </div>
            </form>
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