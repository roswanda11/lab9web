<table>
  <tr>
    <th colspan="2">DATA MAHASISWA</th>
  </tr>
  <tr>
    <td>Nama</td>
    <td>Roswanda Nuraini</td>
  </tr>
  <tr>
    <td>NIM</td>
    <td>312210328</td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>TI.22.A3</td>
  </tr>
</table>

# <p align="center">Praktikum9 : PHP Modular</p>

# Instruksi Praktikum

1. Persiapkan text editor misalnya VSCode.
   
2. Buat folder baru dengan nama lab9_php_modular pada docroot webserver (htdocs)
   
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

- Jalankan XAMPP dan akses http://localhost/phpmyadmin/ untuk membuat database.

![Screenshot (539)](https://github.com/roswanda11/lab9web/assets/115516632/486100d3-b751-453c-8583-e08acd749b30)

- Buat file lab9_php_modular pada root directory web server (c:\xampp\htdocs)

![Screenshot (540)](https://github.com/roswanda11/lab9web/assets/115516632/9e9bb775-0335-479c-8e48-be8b9b4530fd)

# Langkah-langkah praktikum

- Buat file baru dengan nama <b>header.php</b>

      <!DOCTYPE html>
      <html lang="en">
      <head>
          <meta charset="UTF-8">
          <title>Contoh Modularisasi</title>
          <link href="style.css" rel="stylesheet" type="text/stylesheet"
          media="screen" />
      </head>
      <body>
          <div class="container">
              <header>
                  <h1>Modularisasi Menggunakan Require</h1>
              </header>
              <nav>
                  <a href="home.php">Home</a>
                  <a href="about.php">Tentang</a>
                  <a href="kontak.php">Kontak</a>
              </nav>

- Buat file baru dengan nama <b>footer.php</b>
              
      <footer>
          <p>&copy; 2023, Informatika, Universitas Pelita Bangsa</p>
      </footer>
      </div>
      </body>
      </html>

- Buat file baru dengan nama <b>home.php</b>

      <?php require('header.php'); ?>
      
      <div class="content">
          <h2>Ini Halaman Home</h2>
          <p>Ini adalah bagian content dari halaman.</p>
      </div>
      <?php require('footer.php'); ?>

- Buat file baru dengan nama <b>about.php</b>

      <?php require('header.php'); ?>
      
      <div class="content">
          <h2>Ini Halaman About</h2>
          <p>Ini adalah bagian content dari halaman.</p>
      </div>
      
      <?php require('footer.php'); ?>
  
# OUTPUT

![image](https://github.com/roswanda11/lab9web/assets/115516632/2b65c5c3-697d-42e5-b5ee-bfa6579ddf12)

# Pertanyaan dan Tugas

Implementasikan konsep modularisasi pada kode program praktikum 8 tentang database, sehingga setiap halamannya memiliki template tampilan yang sama.

![image](https://github.com/roswanda11/lab9web/assets/115516632/8509df86-7365-4eb0-85be-3f4b6ec7eee2)

1. Jalankan XAMPP SERVER

![image](https://github.com/roswanda11/lab9web/assets/115516632/1a07b60a-d118-4ac0-8467-450ca0190886)

2. Membuat Database

        CREATE DATABASE latihan1;

3. Membuat Tabel

        CREATE TABLE data_barang (
         id_barang int(10) auto_increment Primary Key,
         kategori varchar(30),
         nama varchar(30),
         gambar varchar(100),
         harga_beli decimal(10,0),
         harga_jual decimal(10,0),
         stok int(4)
        );

4. Menambahkan Data

        INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
        VALUES ('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
        ('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
        ('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);

5. Buat file name bernama <b>koneksi.php</b>

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

6. Lalu buat file name <b>header.php</b>
      
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
            <title>Contoh Modularisasi</title>
            <link href="style.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
            <div id="container">
                <header>
                    <h1>Database</h1>
                </header>
                <nav>
                    <a href="home.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="kontak.php">Contact</a>
                    <a href="tambah.php">Tambah Barang</a>
                </nav>

8. Buat file baru dengan nama <b>footer.php</b>

        <footer>
                    <p>&copy; 2023, Roswanda Nuraini, Informatika, Universitas Pelita Bangsa</p>
                </footer>
            </div>
        </body>
        </html>

9. Buat file baru dengan nama <b>home.php</b>

        <?php require('header.php'); ?>
        
        <div class="content">
            <h1>Data Barang</h1>
            <div class="main">
                <table>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=$row['nama'];?>"></td>
                    <td><?= $row['nama'];?></td>
                    <td><?= $row['kategori'];?></td>
                    <td><?= $row['harga_jual'];?></td>
                    <td><?= $row['harga_beli'];?></td>
                    <td><?= $row['stok'];?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row['id_barang'];?>">Ubah</a>
                        <a href="hapus.php?id=<?= $row['id_barang'];?>">Hapus</a> 
                    </td>
                </tr>
                <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
                <?php endif; ?>
                </table>
            </div>
        </div>
        
        <?php require('footer.php'); ?>        

10. Lalu buatlah file baru dengan nama <b>tambah.php</b>
      
        <?php
        error_reporting(E_ALL);
        include_once 'koneksi.php';
        
        if (isset($_POST['submit']))
        {
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $harga_jual = $_POST['harga_jual'];
            $harga_beli = $_POST['harga_beli'];
            $stok = $_POST['stok'];
            $file_gambar = $_FILES['file_gambar'];
            $gambar = null;
        
            if ($file_gambar['error'] == 0)
            {
                $filename = str_replace(' ', '_',$file_gambar['name']);
                $destination = dirname(__FILE__) .'/gambar/' . $filename;
                if(move_uploaded_file($file_gambar['tmp_name'], $destination))
                {
                    $gambar = 'gambar/' . $filename;;
                }
            }
            
            $sql = 'INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar) ';
            $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}','{$harga_beli}', '{$stok}', '{$gambar}')";
            $result = mysqli_query($conn, $sql);
            header('location: home.php');
        }
        ?>
        
        <?php require('header.php'); ?>
        
        <div class="content">
            <h1>Tambah Barang</h1>
            <div class="main">
                <form method="post" action="tambah.php" enctype="multipart/form-data">
                    <div class="input">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" style="margin-left: 20px;" />
                    </div>
                    <div class="input">
                        <label>Kategori</label>
                        <select name="kategori" style="margin-left: 58px;" >
                            <option value="Komputer">Komputer</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Hand Phone">Hand Phone</option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" style="margin-left: 40px;" />
                    </div>
                    <div class="input">
                        <label>Harga Beli</label>
                        <input type="text" name="harga_beli" style="margin-left: 43px;" />
                    </div>
                    <div class="input">
                        <label>Stok</label>
                        <input type="text" name="stok" style="margin-left: 85px;" />
                    </div>
                    <div class="input">
                        <label>File Gambar</label>
                        <input type="file" name="file_gambar" />
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Simpan" />
                    </div>
                </form>
            </div>
        </div>
        
        <?php require('footer.php'); ?>

![image](https://github.com/roswanda11/lab9web/assets/115516632/8759ad9e-5f9c-45ee-928f-48a3b081cfc5)

11. Buatlah file baru dengan nama <b>ubah.php</b>
        
        <?php
        error_reporting(E_ALL);
        include_once 'koneksi.php';
        
        if (isset($_POST['submit']))
        {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $harga_jual = $_POST['harga_jual'];
            $harga_beli = $_POST['harga_beli'];
            $stok = $_POST['stok'];
            $file_gambar = $_FILES['file_gambar'];
            $gambar = null;
        
            if ($file_gambar['error'] == 0)
            {
                $filename = str_replace(' ', '_', $file_gambar['name']);
                $destination = dirname(__FILE__) . '/gambar/' . $filename;
                if (move_uploaded_file($file_gambar['tmp_name'], $destination))
                {
                    $gambar = 'gambar/' . $filename;;
                }
            }
        
            $sql = 'UPDATE data_barang SET ';
            $sql .= "nama = '{$nama}', kategori = '{$kategori}', ";
            $sql .= "harga_jual = '{$harga_jual}', harga_beli = '{$harga_beli}', stok = '{$stok}' ";
            if (!empty($gambar))
                $sql .= ", gambar = '{$gambar}' ";
            $sql .= "WHERE id_barang = '{$id}'";
            $result = mysqli_query($conn, $sql);
        
            header('location: home.php');
            }
        
            $id = $_GET['id'];
            $sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
            $result = mysqli_query($conn, $sql);
            if (!$result) die('Error: Data tidak tersedia');
            $data = mysqli_fetch_array($result);
        
            function is_select($var, $val) {
                if ($var == $val) return 'selected="selected"';
                return false;
        }
        ?>
        
        <?php require('header.php'); ?>
        
        <div class="content">
            <h1>Ubah Barang</h1>
            <div class="main">
                <form method="post" action="ubah.php" enctype="multipart/form-data">
                    <div class="input">
                        <label>Nama Barang</label>
                        <input type="text" name="nama" value="<?php echo $data['nama'];?>" style="margin-left: 20px;"/>
                    </div>
                    <div class="input">
                        <label>Kategori</label>
                        <select name="kategori" style="margin-left: 58px;">
                            <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Komputer">Komputer</option>
                            <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Elektronik">Elektronik</option>
                            <option <?php echo is_select ('Komputer', $data['kategori']);?> value="Hand Phone">Hand Phone</option>
                        </select>
                    </div>
                    <div class="input">
                        <label>Harga Jual</label>
                        <input type="text" name="harga_jual" value="<?php echo $data['harga_jual'];?>" style="margin-left: 40px;"/>
                    </div>
                    <div class="input">
                        <label>Harga Beli</label>
                        <input type="text" name="harga_beli" value="<?php echo $data['harga_beli'];?>" style="margin-left: 43px;"/>
                    </div>
                    <div class="input">
                        <label>Stok</label>
                        <input type="text" name="stok" value="<?php echo $data['stok'];?>" style="margin-left: 85px;"/>
                    </div>
                    <div class="input">
                        <label>File Gambar</label>
                        <input type="file" name="file_gambar" />
                    </div>
                    <div class="submit">
                        <input type="hidden" name="id" value="<?php echo $data['id_barang'];?>" />
                            <input type="submit" name="submit" value="Simpan" />
                    </div>
                </form>
            </div>
        </div>
        
        <?php require('footer.php'); ?>

![image](https://github.com/roswanda11/lab9web/assets/115516632/1e736fba-a1e9-4e66-8f4a-7ee599da68cb)

12. Buatlah file dengan nama <b>hapus.php</b>  

        <?php
        include_once 'koneksi.php';
        $id = $_GET['id'];
        $sql = "DELETE FROM data_barang WHERE id_barang = '{$id}'";
        $result = mysqli_query($conn, $sql);
        header('location: home.php');
        ?>

13. Lalu tambahkan css nya agar terlihat lebih menarik dengan nama <b>style.css</b>

        /* import google font */
        @import
        url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap');
        @import
        url('https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap');
        
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
        }
        body {
            line-height:1;
            font-size:100%;
            font-family:'Open Sans', sans-serif;
            color:#5a5a5a;
        }
        #container {
            width: 980px;
            margin: 0 auto;
            box-shadow: 0 0 1em #cccccc;
        }
        
        /* header */
        header {
            padding: 20px;
        }
        header h1 {
            margin: 20px 10px;
            color: black;
        }
        
        /* navigasi */
        nav {
            display: block;
            background-color: #fd788d;
        }
        nav a {
            padding: 15px 30px;
            display: inline-block;
            color: #ffffff;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a.active,
        nav a:hover {
            background-color: #2b83ea;
        }
        
        /* Content Panel */
        .content {
            background-color: #ffc0cb;
            padding: 50px 20px;
            margin-bottom: 20px;
        }
        .content h1 {
            margin-bottom: 20px;
            font-size: 35px;
        }
        .content p {
            margin-bottom: 20px;
            font-size: 18px;
            line-height: 25px;
        }
        
        /* footer */
        footer {
            clear:both;
            background-color:#fd788d;
            padding:20px;
            color:#eee;
            text-align: center;
        }
        
        /* tabel */
        body{
            font-family: sans-serif;
        }
        table{
            border-collapse: collapse;
        }
        th, td{
            border: 1px solid black;
            font-size: 16px;
            padding: 7px 9px;
        }
        table th {
            background:#fe6694;
            color:#DCDCDC;
            font-weight:bold;
            font-size:14px;
        }
        table tr:nth-child(even) {
            background:#F0F8FF;
        }
        
        /* Tambah Barang */
        .input{
            padding: 5px;
        }
        
