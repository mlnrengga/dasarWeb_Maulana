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
            border-color: white;
            background-color: #5EC3DC;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
            font-weight: bold;  
        }
    </style>
</head>
<body>

<h1>Data Siswa</h1>

<button id="btnCollapse">Klik untuk Menampilkan Data Siswa</button>
<div id="dataTable" style="display:block;">
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
</div>

<h2>Rata-rata Umur Siswa: <?php echo round($rata2Umur,2); ?> tahun</h2>

<script>
    var btn = document.getElementById("btnCollapse");
    var table = document.getElementById("dataTable");
    
    // Fungsi Collapse
    btn.onclick = function() {
        if (table.style.display === "block") {
            table.style.display = "none";
        } else {
            table.style.display = "block";
        }
    };
</script>
</body>
</html>
