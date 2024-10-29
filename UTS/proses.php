<?php
$config = [
    "serverName" => "RENGGA", 
    "database" => "vote"   
];

$conn = sqlsrv_connect($config['serverName'], [
    "Database" => $config['database']
]);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (isset($_GET['delete_row'])) {
    $deleteRow = $_GET['delete_row'];
    $deleteSql = "DELETE FROM mhs WHERE email = ?"; 
    $deleteStmt = sqlsrv_query($conn, $deleteSql, array($deleteRow));
    
    if ($deleteStmt === false) {
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "<div class='container mt-4'>";
        echo "<div class='alert alert-info'>Data berhasil dihapus</div>";
        echo "</div>";
    }

    sqlsrv_free_stmt($deleteStmt);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $checkEmailSql = "SELECT COUNT(*) as count FROM mhs WHERE email = ?";
        $checkEmailStmt = sqlsrv_query($conn, $checkEmailSql, array($email));
        
        if ($checkEmailStmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        
        $row = sqlsrv_fetch_array($checkEmailStmt, SQLSRV_FETCH_ASSOC);
        if ($row['count'] > 0) {
            echo "<div class='container mt-4'>";
            echo "<div class='alert alert-danger'>Email sudah terdaftar. Silahkan gunakan email lain.</div>";
            echo "</div>";
        } else {
            $insertSql = "INSERT INTO mhs (nama, kelas, jurusan, email, opsi) VALUES (?, ?, ?, ?, ?)";
            $params = array($nama, $kelas, $jurusan, $email, $opsi);

            $insertStmt = sqlsrv_query($conn, $insertSql, $params);
            if ($insertStmt === false) {
                die(print_r(sqlsrv_errors(), true));
            }
            sqlsrv_free_stmt($insertStmt);
        }
        
        sqlsrv_free_stmt($checkEmailStmt);
    }
}

$data_mhs = [];
$selectSql = "SELECT * FROM mhs";
$selectStmt = sqlsrv_query($conn, $selectSql);
if ($selectStmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

while ($row = sqlsrv_fetch_array($selectStmt, SQLSRV_FETCH_ASSOC)) {
    $data_mhs[] = [$row['nama'], $row['kelas'], $row['jurusan'], $row['email'], $row['opsi']];
}

sqlsrv_free_stmt($selectStmt);
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <style>
            body {
                background-image: url('download.jpg');
                height: 100vh;
                background-position: center;
                background-size: cover;
            }

            tbody {
                backdrop-filter: blur(15px);
                background: rgba(255,255,255,0.2);
            }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Data Voting Mahasiswa</h1>
        <table class="table table-bordered table-striped table-hover mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>Opsi</th>
                    <th>Aksi</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_mhs as $siswa) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($siswa[0]) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa[1]) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa[2]) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa[3]) . "</td>";
                    echo "<td>" . htmlspecialchars($siswa[4]) . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?email=" . urlencode($siswa[3]) . "' class='btn btn-primary btn-sm'>Edit</a> "; 
                    echo "<a href='?delete_row=" . urlencode($siswa[3]) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\");'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content mt-4">
            <a href="form.php" class="btn btn-secondary mr-2">Kembali ke Formulir</a>
        </div>
    </div>
</body>
</html>
