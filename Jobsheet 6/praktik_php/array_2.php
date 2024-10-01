<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
    <style>
        table {
            width: 40%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            font-family: 'Arial', sans-serif;
            text-align: center;
            box-shadow: 0 2px 15px rgba(64, 64, 64, 0.15);
        }

        th {
            background-color: #009879;
            color: #ffffff;
            padding: 12px 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #dddddd;
        }

        tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>

<body>
    <?php
    $Dosen = [
        'nama' => 'Elok Nur Hamdana',
        'domisili' => 'Malang',
        'jenis_kelamin' => 'Perempuan'
    ];

    echo "Nama: {$Dosen['nama']}<br>";
    echo "Domisili: {$Dosen['domisili']}<br>";
    echo "Jenis Kelamin: {$Dosen['jenis_kelamin']}<br>";

    echo "<h2>Tampilan Tabel</h2>";
    echo "<table>";
    echo "<tr><th>Nama</th><th>Domisili</th><th>Jenis Kelamin</th></tr>";
    echo "<tr>";
    echo "<td>" . $Dosen["nama"] . "</td>";
    echo "<td>" . $Dosen["domisili"] . "</td>";
    echo "<td>" . $Dosen["jenis_kelamin"] . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>
</body>

</html>