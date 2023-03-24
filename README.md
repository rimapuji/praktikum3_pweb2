<h1>PEMROGRAMAN WEB (PRAKTIKUM 3)</h1>

<h2>Nama : Rima Puji Lestari</h2>
<h2>NIM : 312110517</h2>
<h2>Kelas : TI.2021.A3</h2>
<hr>

<h2>MEMBUAT DATABASE</h2>

<h3>Code :</h3>

    CREATE DATABASE latihan1;

<h3>Hasil :</h3>

![Screenshot (291)](https://user-images.githubusercontent.com/118242692/227525357-1910eac4-e1d1-443f-b5f5-76c8bec69d00.png)

<hr>
<h2>MEMBUAT TABEL</h2>

<h3>Code :</h3>

    CREATE TABLE data_barang (
     id_barang int(10) auto_increment Primary Key,
     kategori varchar(30),
     nama varchar(30),
     gambar varchar(100),
     harga_beli decimal(10,0),
     harga_jual decimal(10,0),
     stok int(11)
    );

<h3>Hasil :</h3>

![Screenshot (292)](https://user-images.githubusercontent.com/118242692/227526015-b1b63e03-f198-4570-bbce-89e64dff9748.png)

<hr>
<h2>MENAMBAHKAN DATA</h2>

<h3>Code :</h3>

    INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
    VALUES ('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 
    2400000, 5),
    ('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
    ('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);

<h3>Hasil :</h3>

![Screenshot (293)](https://user-images.githubusercontent.com/118242692/227526730-dab91b60-79d3-4d39-89b2-8ca6aebd713d.png)

<hr>
<h2>MEMBUAT FILE KONEKSI DATABASE [koneksi.php]</h2>

<h3>Code :</h3>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>PHP Dasar</title>
        </head>

        <body>
            <?php
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "latihan1";
            $conn = mysqli_connect($host, $user, $pass, $db);
            if ($conn == false) {
                echo "Koneksi ke server gagal.";
                die();
            } else #echo "Koneksi berhasil";
            ?>
        </body>

        </html>

<h3>Hasil :</h3>

![Screenshot (294)](https://user-images.githubusercontent.com/118242692/227530348-f8721d29-ba91-4cf5-a46f-72bd14a29ad7.png)

<hr>
<h2>MEMBUAT FILE INDEX UNTUK MENAMPILKAN DATA (READ) [index.php]</h2>

<h3>Code :</h3>

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

<h3>Hasil :</h3>

![Screenshot (285)](https://user-images.githubusercontent.com/118242692/227532269-b3ddb787-b1e5-4db1-b5f1-65bb6f2bc156.png)

<hr>
<h2>MENAMBAH DATA (CREATE) [tambah.php]</h2>

<h3>Code :</h3>

        <?php
        error_reporting(E_ALL);
        include_once 'koneksi.php';
        if (isset($_POST['submit'])) {
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
            $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
            $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$gambar}')";
            $result = mysqli_query($conn, $sql);
            header('location: index.php');
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

            <title>Tambah Data Barang</title>
        </head>

        <body>
            <div class="container">
                <br>
                <h1>Tambah Data Barang</h1>
                <hr>
                <br>
                <div class="main">
                    <form method="post" action="tambah.php" enctype="multipart/formdata">
                        <div class="input">
                            <label>Nama Barang</label>&emsp;&emsp;&emsp;<input type="text" name="nama" />
                        </div>
                        <br>
                        <div class="input">
                            <label>Kategori</label>&emsp;&emsp;&emsp;&emsp;&emsp;
                            <select name="kategori">
                                <option value="Pilih Kategori"> ----- Pilih Kategori ----- </option>
                                <option value="Komputer">Komputer</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Hand Phone">Hand Phone</option>
                            </select>
                        </div>
                        <br>
                        <div class="input">
                            <label>Harga Beli</label>&emsp;&emsp;&emsp;&emsp;
                            <input type="text" name="harga_beli" />
                        </div>
                        <br>
                        <div class="input">
                            <label>Harga Jual</label>&emsp;&emsp;&emsp;&emsp;
                            <input type="text" name="harga_jual" />
                        </div>
                        <br>
                        <div class="input">
                            <label>Stok</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
                            <input type="text" name="stok" />
                        </div>
                        <br>
                        <div class="input">
                            <label>File Gambar</label>&emsp;&emsp;&ensp;&ensp;
                            <input type="file" name="file_gambar" />
                        </div>
                        <br><br>
                        <div class="submit">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="submit" class="btn btn-primary" name="submit" value="Simpan">
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

<h3>Hasil :</h3>

![Screenshot (286)](https://user-images.githubusercontent.com/118242692/227532872-e2465a26-ec7a-49c8-8b78-a660d34fbf0c.png)

Jika di klik tombol "simpan" maka data akan bertambah seperti pada gambar di bawah ini. Apabila anda mengklik tombol "batal" maka halaman akan di pindahkan ke halaman index/halaman utama.

![Screenshot (287)](https://user-images.githubusercontent.com/118242692/227534104-7a4e9807-4842-46da-bb1a-700ea80f4236.png)

<hr>
<h2>MENGUBAH DATA (UPDATE) [ubah.php]</h2>

<h3>Code :</h3>

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

<h3>Hasil :</h3>

![Screenshot (288)](https://user-images.githubusercontent.com/118242692/227533964-99b95409-6f95-427c-a866-78f6d86d2292.png)

Jika di klik tombol "simpan" maka data akan berubah seperti pada gambar di bawah ini. Apabila anda mengklik tombol "batal" maka halaman akan di pindahkan ke halaman index/halaman utama.

![Screenshot (289)](https://user-images.githubusercontent.com/118242692/227534507-4dda2126-c200-4131-b1e1-7c427aebd220.png)

<hr>
<h2>MENGHAPUS DATA (DELETE) [hapus.php]</h2>

<h3>Code :</h3>

        <?php
        include_once 'koneksi.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
        $result = mysqli_query($conn, $sql);
        header('location: index.php');
        ?>

<h3>Hasil :</h3>

![new](https://user-images.githubusercontent.com/118242692/227537778-113c781d-2500-4cc8-b0f1-0e17af5ed030.png)

Jika anda memilih aksi hapus seperti gambar di atas, maka data barang akan otomatis terhapus seperti pada gambar di bawah ini.

![Screenshot (290)](https://user-images.githubusercontent.com/118242692/227535095-5b241f71-2202-4cae-9b1f-98ee13e60666.png)
