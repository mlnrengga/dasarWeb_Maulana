<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   $mahasiswa = array(
    array("dina", 123456, "teknik kimia", "dina@gmail.com"),
    array("dino", 9123124, "teknik listrik", "dino@gmail.com"),
    );

    echo "<h1>Data Mahasiswa array multidimensi</h1>";
    echo "<ul>";
    foreach ($mahasiswa as $mhs) {
        echo "<li>";
        echo "Nama:" . $mhs[0] . "<br>";
        echo "</li>";
        echo "<li>";
        echo "Nim:" . $mhs[1] . "<br>";
        echo "</li>";
        echo "<li>";
        echo "Jurusan:" . $mhs[2] . "<br>";
        echo "</li>";
        echo "<li>";
        echo "Email:" . $mhs[3];
        echo "</li>";
        echo "<br>";
    }
    echo "</ul>";
   ?> 
</body>
</html>