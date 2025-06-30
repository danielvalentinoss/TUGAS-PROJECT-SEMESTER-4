<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosongkan jika belum pakai password
$db   = "obat"; // nama database yang kamu buat di MariaDB

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
