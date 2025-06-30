<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama_obat'];
$jumlah = $_POST['jumlah'];
$tgl_masuk = $_POST['tanggal_masuk'];
$tgl_kadaluarsa = $_POST['tanggal_kadaluarsa'];

$query = "UPDATE obat SET 
            nama_obat='$nama',
            jumlah='$jumlah',
            tanggal_masuk='$tgl_masuk',
            tanggal_kadaluarsa='$tgl_kadaluarsa'
          WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: index.php");
} else {
    echo "Gagal update data: " . mysqli_error($conn);
}
?>
