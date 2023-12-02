<?php
include("koneksi.php");

$sql = 'SELECT *FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Tugas Modularisasi </title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div id="container">
        <header>
            <h1>Modularisasi Menggunakan Require</h1>
        </header>
        <nav>
            <a href="home.php">Home</a>
            <a href="about.php">About</a>
            <a href="kontak.php">Contact</a>
            <a href="tambah.php">Tambah Barang</a>
        </nav>
</body>