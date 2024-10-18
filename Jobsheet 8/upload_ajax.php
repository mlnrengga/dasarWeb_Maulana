<?php 
$errors = [];

if (isset($_FILES['files'])) {
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $maxsize = 2 * 1024 * 1024;
    $targetDirectory = 'documents/';

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $totalFiles = count($_FILES['files']['name']);
    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowedExtensions)) {
            $errors[] = "Ekstensi file $file_name tidak diizinkan. Hanya file dengan ekstensi JPG, JPEG, PNG, atau GIF yang diizinkan.";
        }

        if ($file_size > $maxsize) {
            $errors[] = "Ukuran file $file_name tidak boleh lebih dari 2 MB.";
        }

        if (empty($errors)) {
            $targetFile = $targetDirectory . basename($file_name);

            if (move_uploaded_file($file_tmp, $targetFile)) {
                echo "File $file_name berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $file_name.<br>";
            }
        } else {
            echo implode("", $errors) . "<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>