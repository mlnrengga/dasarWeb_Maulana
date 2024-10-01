<!DOCTYPE html>
<html>
  <head> 
  </head>
  <body>
    <h2>Array Terindeks</h2>
    <?php
        $Listdosen = ["Elok Nur Hamdana", "Unggul Pamenang", "Bagas Nugraha"];

        echo $Listdosen[2] . "<br>"; 
        echo $Listdosen[0] . "<br>"; 
        echo $Listdosen[1] . "<br>"; 

        echo "<h2>Menggunakan Perulangan </h2><br>";
        $listDosenLength = count($Listdosen);
        for ($i=0; $i < $listDosenLength; $i++) { 
          echo $Listdosen[$i] . "<br>";
        }
    ?>
  </body>
</html>