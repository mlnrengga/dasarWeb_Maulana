<?php
$config = [
    "serverName" => "RENGGA",
    "database" => "vote"
];

$conn = sqlsrv_connect($config['serverName'], [
    "Database" => $config['database'],
]);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

$siswa = null; 
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $selectSql = "SELECT * FROM mhs WHERE email = ?";
    $selectStmt = sqlsrv_query($conn, $selectSql, array($email));

    if ($selectStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $siswa = sqlsrv_fetch_array($selectStmt, SQLSRV_FETCH_ASSOC);
    if (!$siswa) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
        echo "</div>";
        exit;
    }

    sqlsrv_free_stmt($selectStmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email']; 
    $opsi = isset($_POST['opsi']) ? $_POST['opsi'] : '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-danger'>Email tidak valid. Silakan kembali dan masukkan email yang benar.</div>";
        echo "</div>";
    } else {
        $checkSql = "SELECT * FROM mhs WHERE email = ?";
        $checkStmt = sqlsrv_query($conn, $checkSql, array($email));
        
        if (sqlsrv_has_rows($checkStmt)) {
            $updateSql = "UPDATE mhs SET nama = ?, kelas = ?, jurusan = ?, opsi = ? WHERE email = ?";
            $params = array($nama, $kelas, $jurusan, $opsi, $email);
            $updateStmt = sqlsrv_query($conn, $updateSql, $params);
            if ($updateStmt === false) {
                die(print_r(sqlsrv_errors(), true));
            } else {
                echo "<div class='container mt-4'>";
                echo "<div class='alert alert-success'>Data berhasil diperbarui.</div>";
                echo "</div>";
            }

            sqlsrv_free_stmt($updateStmt);
        } else {
            echo "<div class='container mt-4'>";
            echo "<div class='alert alert-danger'>Data tidak ditemukan. Tidak ada perubahan yang dilakukan.</div>";
            echo "</div>";
        }

        sqlsrv_free_stmt($checkStmt);
    }
}

sqlsrv_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <style>
            body {
                background-image: url('download.jpg');
                height: 100vh;
                background-position: center;
                background-size: cover;
            }

            .form-container {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0px 0px 20px grey;   
                backdrop-filter: blur(10px);
            }
        </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Mahasiswa</h1>
        <div class="form-container mt-3">
            <form method="post">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo htmlspecialchars($siswa['nama']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" class="form-control" name="kelas" id="kelas" value="<?php echo htmlspecialchars($siswa['kelas']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?php echo htmlspecialchars($siswa['jurusan']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($siswa['email']); ?>" required>
                </div>

                <label for="opsi">Pilih Opsi:</label><br>

                <div class="custom-control custom-radio">
                    <input type="radio" id="opsi1" name="opsi" class="custom-control-input" value="Opsi 1" <?php echo ($siswa['opsi'] == 'Opsi 1') ? 'checked' : ''; ?> required>
                    <label class="custom-control-label" for="opsi1">Opsi 1</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="opsi2" name="opsi" class="custom-control-input" value="Opsi 2" <?php echo ($siswa['opsi'] == 'Opsi 2') ? 'checked' : ''; ?> required>
                    <label class="custom-control-label" for="opsi2">Opsi 2</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" id="opsi3" name="opsi" class="custom-control-input" value="Opsi 3" <?php echo ($siswa['opsi'] == 'Opsi 3') ? 'checked' : ''; ?> required>
                    <label class="custom-control-label" for="opsi3">Opsi 3</label>
                </div>

                <div class="d-flex justify-content mt-4">
                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                    <a href="proses.php" class="btn btn-secondary">Kembali ke Tabel</a>
                </div>
        </form>
    </div>
</body>
</html>
