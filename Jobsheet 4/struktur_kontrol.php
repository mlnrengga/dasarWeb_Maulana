<?php
$nilaiNumerik = 92;

if ($nilaiNumerik >= 90 && $nilaiNumerik <= 100) {
    echo "Nilai huruf: A";
} elseif ($nilaiNumerik >= 80 && $nilaiNumerik < 90) {
    echo "Nilai huruf: B";
} elseif ($nilaiNumerik >= 70 && $nilaiNumerik < 80) {
    echo "Nilai huruf: C";
} elseif ($nilaiNumerik < 70) {
    echo "Nilai huruf: D";
}

$jarakSaatIni = 0;
$jarakTarget = 500;
$peningkatanHarian = 30;
$hari = 0;

while ($jarakSaatIni < $jarakTarget) {
    $jarakSaatIni += $peningkatanHarian;
    $hari++;
    echo "<br> Hari ke-$hari jarak yang sudah di tempuh oleh atlet adalah $jarakSaatIni kilometer";
}

echo "<br>Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "<br>Atlet tersebut memerlukan $hari hari untuk mencapai jarak 500 kilometer.";

$jumlahLahan = 10;
$tanamanPerLahan = 5;
$buahPerTanaman = 10;
$jumlahBuah = 0;

for ($i = 1; $i <= $jumlahLahan; $i++) {
    $jumlahBuah += ($tanamanPerLahan * $buahPerTanaman);
}

echo "Jumlah lahan: $jumlahLahan <br>";
echo "Jumlah tanaman per lahan: $tanamanPerLahan<br>";
echo "Jumlah buah per tanaman: $buahPerTanaman<br>";
echo "Jumlah buah yang akan dipanen adalah: $jumlahBuah";
echo "<br>";

$skorUjian = [85, 92, 78, 96, 88];
$totalSkor = 0;

foreach ($skorUjian as $skor) {
    echo "Skor ujian: $skor <br>";
    $totalSkor += $skor;
}

echo "Total skor ujian adalah: $totalSkor";
echo "<br>";

$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

foreach ($nilaiSiswa as $nilai) {
    if ($nilai < 60) {
        echo "Nilai: $nilai (Tidak lulus) <br>";
        continue;
    }

    echo "Nilai: $nilai (Lulus) <br>";
}

$nilaiSiswa1 = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];
$totalNilai = 0;

sort($nilaiSiswa1);
array_shift($nilaiSiswa1);
array_shift($nilaiSiswa1);
array_pop($nilaiSiswa1);
array_pop($nilaiSiswa1);

foreach ($nilaiSiswa1 as $nilai1) {
    echo "Nilai-nilai siswa $nilai1 <br>";
    $totalNilai += $nilai1;
}

echo "Nilai rata-rata dari siswa adalah " . ($totalNilai/6);

$hargaProduk = 120000;
$diskon = 0;

if ($hargaProduk > 100000) {
    $diskon = 0.2 * $hargaProduk;
}

$totalBayar = $hargaProduk - $diskon;

echo "Harga produk: Rp$hargaProduk <br>";
echo "Diskon yang didapatkan: Rp$diskon <br>";
echo "Total yang harus dibayar: Rp$totalBayar <br>";
?>