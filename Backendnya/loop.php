<?php

    //perulangan for (tau batas akhir)

    echo "<h3>Perulangan for</h3>";
    for ($i=1; $i<=5 ; $i++) {
        echo "Data $i <br>";
    }

    //perulangan while (tanpa diketahui batas akhir)
    
    echo "<h3>Perulangan While</h3>";
    $lari= 1;                               //mulai putaran ke 1
    while($lari <=4 ) {                     //Selama Putaran masih kurang dari sama dengan 4, lari teruss
        echo "Lari Putaran ke $lari <br>";                            
        $lari++;                             //tambah 1 putaran setiap selesai 1 putaran
    }
    echo "finishh";

    //perulangan foreach
    echo "<h3>Perulangan foreach</h3>";
    $daftar_murid = ["Gendhis","Salma","Ada","Ninggar"];

    foreach ($daftar_murid as $murid) {
        echo "<br>Siswa: $murid";
    }

?>