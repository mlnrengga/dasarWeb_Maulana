<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <style>
        /* tablenya tidak saya styling supaya mirip dengan yang ada di foto*/
        table {
            border-collapse:collapse;
            width:100%;
        }

        th,td {
            padding:10px;
        }

        th {
            text-align: left;
        }

        button {
            width: 100%;
            height: 50px;
            color: white;
            border-color: grey;
            background-color: #5EC3DC;
            border-radius: 8px;
            box-shadow: 5px 5px 0px grey;
            font-weight: bold;  
        }

        button:hover {
            background-color: white;
            color: #5EC3DC;
            border-color: grey;
            box-shadow: 5px 5px 0px grey;
        }

        button:active {
            box-shadow: none;
            border-color: grey;
            transform: translateY(4px);
        }
    </style>
</head>
<body>

<h1>Data Siswa</h1>

<button id="btnCollapse">Klik untuk Menampilkan Data Siswa</button>
<div id="dataTable" style="display:none;"> 
    <table>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Kelas</th>
            <th>Alamat</th>
        </tr>

        <?php
        $data = array(
            array('nama' => 'Andi', 'umur' => 19, 'kelas' => '10A', 'alamat' => 'Swiss'),
            array('nama' => 'Siti', 'umur' => 18, 'kelas' => '10B', 'alamat' => 'Prancis'),
            array('nama' => 'Budi', 'umur' => 21, 'kelas' => '10C', 'alamat' => 'Itali'),
            array('nama' => 'Anton', 'umur' => 25, 'kelas' => '10D', 'alamat' => 'Bekasi')
        );

        $totalumur = 0;
        for($i = 0; $i < count($data); $i++) {
            echo "<tr>";
            echo "<td>" . $data[$i]['nama'] . "</td>";
            echo "<td>" . $data[$i]['umur'] . "</td>";
            echo "<td>" . $data[$i]['kelas'] . "</td>";
            echo "<td>" . $data[$i]['alamat'] . "</td>";
            echo "</tr>";
            $totalumur += $data[$i]['umur']; 
        }

        $rata2Umur = $totalumur / count($data); 
        ?>
    </table>
    <h2>Rata-rata Umur Siswa: <?php echo round($rata2Umur,2); ?> tahun</h2>
</div>

<script>
    var btn = document.getElementById("btnCollapse");
    var table = document.getElementById("dataTable");
    
    // Fungsi Collapse
    btn.onclick = function() {
        if (table.style.display === "block") {
            table.style.display = "none";
            btn.textContent = "Klik untuk Menampilkan Data Siswa"
        } else {
            table.style.display = "block";
            btn.textContent = "Klik untuk Menyembunyikan Data Siswa";
        }
    };
</script>
</body>
</html>
