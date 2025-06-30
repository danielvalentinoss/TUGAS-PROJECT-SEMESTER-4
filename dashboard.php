<?php
session_start();
include 'koneksi.php'; // pastikan ini ada

// Ambil tanggal hari ini
$today = date("Y-m-d");

// Total Obat Tersedia
$total_obat = mysqli_query($conn, "SELECT COUNT(*) AS total FROM obat");
$total_obat_result = mysqli_fetch_assoc($total_obat)['total'];

// Obat Hampir Kadaluarsa (dalam 30 hari ke depan)
$kadaluarsa_query = mysqli_query($conn, 
    "SELECT COUNT(*) AS hampir_kadaluarsa 
     FROM obat 
     WHERE tanggal_kadaluarsa >= '$today' 
     AND DATEDIFF(tanggal_kadaluarsa, '$today') <= 30");
$hampir_kadaluarsa = mysqli_fetch_assoc($kadaluarsa_query)['hampir_kadaluarsa'];

// Obat Hampir Habis (jumlah < 10)
$hampir_habis_query = mysqli_query($conn, 
    "SELECT COUNT(*) AS hampir_habis 
     FROM obat 
     WHERE jumlah < 10");
$hampir_habis = mysqli_fetch_assoc($hampir_habis_query)['hampir_habis'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Pemantauan Obat</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .welcome {
            font-size: 1.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Dashboard</h1>
        <p class="welcome">Selamat datang di Sistem Pemantauan Obat Pelita</p>
    </div>
    <div class="text-end p-3">
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>

    <div class="row g-4">
        <!-- Obat Tersedia -->
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Obat Tersedia</h5>
                    <p class="card-text fs-3"><?= $total_obat_result ?></p>
                </div>
            </div>
        </div>

        <!-- Obat Hampir Kadaluarsa -->
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Obat Hampir Kadaluarsa</h5>
                    <p class="card-text fs-3"><?= $hampir_kadaluarsa ?></p>
                </div>
            </div>
        </div>

        <!-- Obat Hampir Habis -->
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Stok Hampir Habis</h5>
                    <p class="card-text fs-3"><?= $hampir_habis ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="index.php" class="btn btn-success">Lihat Data Obat</a>
    </div>
</div>

</body>
</html>
