<?php

    include 'koneksi-db.php';

    $Id = $_POST["id"];
    $Nama = $_POST["nama_lengkap"];
    $Nis = $_POST["nis"];
    $Alamat = $_POST["alamat"];
    $Kelas = $_POST["kelas"];

    $update = mysqli_query($koneksi, "UPDATE tb_murid SET nama_lengkap='$Nama', nis='$Nis', alamat='$Alamat', kelas='$Kelas' WHERE id=$Id");

    if ($update == true){
        header("location:index.php");
    }
?>