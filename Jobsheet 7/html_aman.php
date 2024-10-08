<!DOCTYPE html>
<html>
<head>
    <title>Form Input dengan htmlspecialchars() dan Validasi Email</title>
</head>
<body>

    <h2>Form Input dengan htmlspecialchars() dan Validasi Email</h2>

    <?php
    // Inisialisasi variabel
    $input = "";
    $inputErr = "";
    $email = "";
    $emailErr = "";

    // Cek apakah form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi input teks
        if (empty($_POST["input"])) {
            $inputErr = "Input harus diisi!";
        } else {
            $input = $_POST["input"];
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        }

        // Validasi email
        if (empty($_POST["email"])) {
            $emailErr = "Email harus diisi!";
        } else {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Format email tidak valid!";
            } else {
                $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            }
        }

        if (empty($inputErr) && empty($emailErr)) {
            echo "<p>Data berhasil disimpan!</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="input">Masukkan sesuatu:</label>
        <input type="text" name="input" id="input" value="<?php echo $input; ?>">
        <span class="error"><?php echo $inputErr; ?></span><br><br>

        <label for="email">Masukkan email:</label>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span><br><br>

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
