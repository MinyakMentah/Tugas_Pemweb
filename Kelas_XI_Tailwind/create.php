<?php
    include 'koneksi-db.php';

    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $stmt = mysqli_prepare($koneksi, "INSERT INTO tb_murid (id, nama_lengkap, nis, alamat, kelas) VALUES (NULL, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssss", $nama, $nis, $alamat, $kelas);
    $input = mysqli_stmt_execute($stmt);

    if ($input) {
        header('location: index.php?status=created');
    }
