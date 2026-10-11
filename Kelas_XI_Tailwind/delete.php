<?php
    include 'koneksi-db.php';

    $id = $_GET['id'];

    $stmt = mysqli_prepare($koneksi, "DELETE FROM tb_murid WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    $hapus = mysqli_stmt_execute($stmt);

    if ($hapus) {
        header('location: index.php?status=deleted');
    }
