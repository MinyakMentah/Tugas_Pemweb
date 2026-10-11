<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "rpl4";

    //membuat koneksi
    $koneksi = mysqli_connect($host, $user, $pass, $db);

    //Periksa Koneksi
    if(!$koneksi) {
        die("koneksi gagal:" . mysqli_connect_error());
    }
    echo "";
?>