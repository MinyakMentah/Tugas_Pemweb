<?php
    include 'koneksi-db.php';

    $id = $_POST['id'];
    $nama = $_POST['nama_lengkap'];
    $nis = $_POST['nis'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];

    $stmt = mysqli_prepare($koneksi, "UPDATE tb_murid SET nama_lengkap = ?, nis = ?, alamat = ?, kelas = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssssi", $nama, $nis, $alamat, $kelas, $id);
    $update = mysqli_stmt_execute($stmt);

    if ($update) {
        header('location: index.php?status=updated');
    }
