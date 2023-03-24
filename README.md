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
<h2>MEMBUAT FILE KONEKSI DATABASE</h2>

<h3>Code :</h3>

    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "latihan1";
    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn == false)
    {
     echo "Koneksi ke server gagal.";
     die();
    } #else echo "Koneksi berhasil";
    ?>

<h3>Hasil :</h3>
