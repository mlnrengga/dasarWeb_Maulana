<?php
session_start(); // Memulai sesi

// Menambahkan data default jika sesi belum ada
if (!isset($_SESSION['data_mhs'])) {
    $_SESSION['data_mhs'] = [
        ['Adit Rendang', '2I', 'Sistem Informasi Bisnis', 'aditrd@gmail.com', 'Opsi 2'],
        ['Iqbal Suki', '2G', 'Teknik Informatika', 'Iqbal12@gmail.com',  'Opsi 1'],
        ['Leni Baut', '2B', 'Sistem Informasi Bisnis', 'Lenib4@gmail.com',  'Opsi 3']
    ]; // Data default
}

// Memeriksa apakah data telah dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['reset'])) {
        // Menghapus sesi untuk mengreset data
        unset($_SESSION['data_mhs']);
        // Inisialisasi kembali data default
        $_SESSION['data_mhs'] = [
            ['Adit Rendang', '2I', 'Sistem Informasi Bisnis', 'aditrd@gmail.com', 'Opsi 2'],
            ['Iqbal Suki', '2G', 'Teknik Informatika', 'Iqbal12@gmail.com',  'Opsi 1'],
            ['Leni Baut', '2B', 'Sistem Informasi Bisnis', 'Lenib4@gmail.com',  'Opsi 3']
        ];
    } else {
        // Mendapatkan data dari form
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $email = $_POST['email'];
        $opsi = isset($_POST['opsi']) ? $_POST['opsi'] : '';

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='container mt-4'>";
            echo "<div class='alert alert-danger'>Email tidak valid. Silakan kembali dan masukkan email yang benar.</div>";
            echo "</div>";
        } else {
            // Menambahkan data baru ke dalam array sesi jika email valid
            $_SESSION['data_mhs'][] = [$nama, $kelas, $jurusan, $email, $opsi];
        }
    }
}

// Menyiapkan data siswa untuk ditampilkan
$data_mhs = $_SESSION['data_mhs']; // Ambil data dari sesi
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
                background: rgba(255,255,255,0,2);
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
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data siswa dari sesi
                foreach ($data_mhs as $siswa) {
                    echo "<tr>";
                    foreach ($siswa as $item) {
                        echo "<td>" . htmlspecialchars($item) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="d-flex justify-content mt-4">
            <a href="form.php" class="btn btn-secondary mr-2">Kembali ke Formulir</a>
        <form method="post">
            <input type="submit" name="reset" value="Tabel Baru" class="btn btn-danger">
        </form>
        </div>
    </div>
</body>
</html>
