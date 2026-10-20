<?php
// ========================================
// KONFIGURASI KONEKSI MARIADB / MYSQL
// ========================================
// hapus tanda komentarnya jika konfigurasi database ingin dilakukan secara manual menggunakan text editor.
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "nama_database";

// Status koneksi
$status = "";
$status_type = "";

// Proses ketika tombol diklik
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    mysqli_report(MYSQLI_REPORT_OFF);

    $conn = @new mysqli(
        $db_host,
        $db_user,
        $db_pass,
        $db_name
    );

    if ($conn->connect_errno) {
        $status = "Koneksi GAGAL! Periksa konfigurasi host, username, password, database, atau layanan MariaDB.";
        $status_type = "error";
    } else {
        $status = "Koneksi BERHASIL! Website berhasil terhubung ke MariaDB/MySQL.";
        $status_type = "success";
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MariaDB Connection Test</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 40px 20px;
            color: #1e293b;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        h1 {
            color: #2563eb;
            font-size: 25px;
        }

        .notice {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 15px;
            line-height: 1.6;
        }

        .config {
            background: #f8fafc;
            padding: 15px;
            border-radius: 6px;
            line-height: 1.8;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #1d4ed8;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 15px;
            margin-top: 20px;
            border-radius: 6px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            margin-top: 20px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>MariaDB / MySQL Connection Test</h1>

    <div class="notice">
        Website ini hanya digunakan untuk pengujian koneksi
        ke database MariaDB/MySQL. Website ini tidak menyediakan
        layanan atau fitur lainnya.
    </div>

    <h3>Konfigurasi Database</h3>

    <div class="config">
        <strong>Host:</strong>
        <?= htmlspecialchars($db_host) ?><br>

        <strong>Database:</strong>
        <?= htmlspecialchars($db_name) ?><br>

        <strong>Username:</strong>
        <?= htmlspecialchars($db_user) ?><br>

        <strong>Password:</strong> (disembunyikan)
    </div>

    <h3>Pengujian Koneksi</h3>

    <form method="POST">
        <button type="submit">Tes Koneksi Database</button>
    </form>

    <?php if ($status !== ""): ?>
        <div class="<?= htmlspecialchars($status_type) ?>">
            <strong><?= htmlspecialchars($status) ?></strong>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
