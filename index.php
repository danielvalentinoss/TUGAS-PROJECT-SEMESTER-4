<?php include 'session.php'; ?>
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Data Obat</title>
    <style>
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #aaa;
            text-align: center;
        }
        .warning {
            background-color: #fff3cd; /* kuning */
        }
        .expired {
            background-color: #f8d7da; /* merah muda */
        }
        .nama-obat-warning {
            font-weight: bold;
            color: #856404;
        }
        .nama-obat-expired {
            font-weight: bold;
            color: #721c24;
        }
        h2 {
            text-align: center;
        }
        .tambah-link {
            text-align: center;
            margin: 10px;
        }
    </style>
</head>
<body>

<h2>Daftar Obat di Gudang</h2>

<p style="text-align: center;">
    <a href="dashboard.php">← Kembali ke Dashboard</a>
</p>

<div class="tambah-link">
    <a href="tambah.php">+ Tambah Obat Baru</a>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nama Obat</th>
        <th>Jumlah</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Kadaluarsa</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $today = date("Y-m-d");
    $query = mysqli_query($conn, "SELECT * FROM obat ORDER BY tanggal_kadaluarsa ASC");

    while ($data = mysqli_fetch_array($query)) {
        $tanggal_masuk = $data['tanggal_masuk'];
        $tanggal_kadaluarsa = $data['tanggal_kadaluarsa'];

        $masa_simpan = (strtotime($tanggal_kadaluarsa) - strtotime($tanggal_masuk)) / (60 * 60 * 24);
        $sudah_kadaluarsa = strtotime($tanggal_kadaluarsa) < strtotime($today);

        // Default
        $status = "-";
        $baris_class = "";
        $class_nama = "";

        // Cek status obat
        if ($sudah_kadaluarsa) {
            $status = "🛑 <strong>Kadaluarsa</strong>";
            $baris_class = "expired";
            $class_nama = "nama-obat-expired";
        } elseif ($masa_simpan <= 30) {
            $status = "⚠️ <strong>Hampir Kadaluarsa</strong>";
            $baris_class = "warning";
            $class_nama = "nama-obat-warning";
        }

        echo "<tr class='$baris_class'>
                <td>$no</td>
                <td class='$class_nama'>{$data['nama_obat']}</td>
                <td>{$data['jumlah']}</td>
                <td>{$data['tanggal_masuk']}</td>
                <td>{$data['tanggal_kadaluarsa']}</td>
                <td>$status</td>
                <td>
                    <a href='edit.php?id={$data['id']}'>Edit</a> | 
                    <a href='hapus.php?id={$data['id']}' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>
