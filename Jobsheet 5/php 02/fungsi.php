<?php 
// function perkenalan() {
//     echo "Assalamualaikum, ";

//     echo "Perkenalkan, nama saya Rengga<br/>"; //Tulis sesuai nama kalian
//     echo "Senang berkenalan dengan Anda<br/>";
// }

// //memanggil fungsi yang sudah dibuat
// perkenalan();
// perkenalan();

//membuat fungsi
function perkenalan($nama, $salam="Assalamualaikum") {
    echo $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

//memanggil fungsi yang sudah dibuat
perkenalan("Hamdana", "Hallo");

echo "<hr>";

$saya = "Elok";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan($saya);
?>