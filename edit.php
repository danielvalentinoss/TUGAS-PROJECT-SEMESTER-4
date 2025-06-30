<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM obat WHERE id='$id'");
$obat = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Obat</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #f2f6fc;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0 text-center">Edit Data Obat</h4>
                </div>
                <div class="card-body">
                    <form action="proses_edit.php" method="POST">
                        <input type="hidden" name="id" value="<?= $obat['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" value="<?= $obat['nama_obat']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" value="<?= $obat['jumlah']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" value="<?= $obat['tanggal_masuk']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Kadaluarsa</label>
                            <input type="date" name="tanggal_kadaluarsa" class="form-control" value="<?= $obat['tanggal_kadaluarsa']; ?>" required>
                        </div>

                        <div class="d-grid">
                            <input type="submit" value="Update" class="btn btn-warning text-white fw-bold">
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php" class="text-decoration-none">← Kembali ke Data Obat</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
