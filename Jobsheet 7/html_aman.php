<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan htmlspecialchars()</title>
</head>
<body>

    <h2>Form Input dengan htmlspecialchars()</h2>

    <?php
    // Inisialisasi variabel
    $input = "";
    $inputErr = "";

    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["input"])) {
            $inputErr = "Input harus diisi!";
        } else {
            $input = $_POST["input"];         
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            echo "<p>Data berhasil disimpan!</p>";
        }
    }
    
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Masukkan sesuatu:</label>
        <input type="text" name="input" id="input" value="<?php echo $input; ?>">
        <span class="error"><?php echo $inputErr; ?></span><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (!empty($input)) {
        echo "<h3>Ini Hasil Input yang Aman:</h3>";
        echo "<p>" . $input . "</p>";
    }
    ?>
</body>
</html>
