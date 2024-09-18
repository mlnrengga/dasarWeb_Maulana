<?php 
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "hasil dari $a + $b adalah $hasilTambah <br>";
echo "hasil dari $a - $b adalah $hasilKurang <br>";
echo "hasil dari $a x $b adalah $hasilKali <br>";
echo "hasil dari $a : $b adalah $hasilBagi <br>";
echo "sisa bagi dari $a dan $b adalah $sisaBagi <br>";
echo "hasil dari $a pangkat $b adalah $pangkat <br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "apakah $a dan $b memiliki nilai yang sama (+) ? " . var_export($hasilSama, true) . "<br>";
echo "apakah $a dan $b memiliki nilai yang tidak sama (!=) ? " . var_export($hasilTidakSama, true) . "<br>";
echo "apakah $a lebih kecil dari pada (<) $b? " . var_export($hasilLebihKecil, true) . "<br>";
echo "apakah $a lebih besar dari pada (>) $b? " . var_export($hasilLebihBesar, true) . "<br>";
echo "apakah $a lebih kecil atau sama dengan (=>)  $b? " . var_export($hasilLebihKecilSama, true) . "<br>";
echo "apakah $a lebih besar atau sama dengan (>=) $b? " . var_export($hasilLebihBesarSama, true) . "<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "hasil \$a && \$b adalah " . var_export($hasilAnd, true) . "<br>";
echo "hasil \$a || \$b adalah " . var_export($hasilOr, true) . "<br>";
echo "hasil !\$a adalah " . var_export($hasilNotA, true) . "<br>";
echo "hasil !\$b adalah " . var_export($hasilNotB, true) . "<br>";

?>