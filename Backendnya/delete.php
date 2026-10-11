<?php

    include 'koneksi-db.php';

    $Id = $_GET["id"];

    $hapus = mysqli_query($koneksi, "DELETE FROM tb_murid WHERE id=$Id");

    if ($hapus == true){
        header("location:index.php");
    }
?>