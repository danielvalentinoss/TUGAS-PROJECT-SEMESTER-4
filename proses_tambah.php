<?php
include 'koneksi.php';

$nama = $_POST['nama_obat'];
$jumlah = $_POST['jumlah'];
$tgl_masuk = $_POST['tanggal_masuk'];
$tgl_kadaluarsa = $_POST['tanggal_kadaluarsa'];

$query = mysqli_query($conn, "INSERT INTO obat (nama_obat, jumlah, tanggal_masuk, tanggal_kadaluarsa)
                              VALUES ('$nama', '$jumlah', '$tgl_masuk', '$tgl_kadaluarsa')");

if ($query) {
    echo "<script>alert('Obat berhasil ditambahkan'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan obat'); window.location='tambah.php';</script>";
}
?>
