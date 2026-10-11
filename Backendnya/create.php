<?php

    include 'koneksi-db.php';

    $Nama = $_POST["nama"];
    $Nis = $_POST["NIS"];
    $Alamat = $_POST["Alamat"];
    $Kelas = $_POST["Kelas"];

    $input = mysqli_query($koneksi, "INSERT INTO tb_murid VALUES(NULL, '$Nama', '$Nis', '$Alamat', '$Kelas')");

    if ($input == true){
        header("location:index.php");
    }
?>