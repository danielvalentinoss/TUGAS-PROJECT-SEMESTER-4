<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Obat</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body style="background-color: #f2f6fc;">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-center">Form Tambah Obat</h4>
                </div>
                <div class="card-body">
                    <form action="proses_tambah.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Kadaluarsa</label>
                            <input type="date" name="tanggal_kadaluarsa" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <input type="submit" value="Simpan" class="btn btn-primary">
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
