<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>UPDATE</h2>
<?php
    include 'koneksi-db.php';
    $id = $_GET['id'];
    $dataMurid = mysqli_query($koneksi, "SELECT * FROM tb_murid WHERE id = $id");
    while ($list=mysqli_fetch_array($dataMurid)) {
    ?>

    <form action="update.php" method="POST">

    ID :
    <input type="text" name="id" readonly value="<?php echo $list['id'] ?>"> <br></br>

    Nama Lengkap :
    <input type="text" name="nama_lengkap" value="<?php echo $list['nama_lengkap'] ?>"> <br></br>

    NIS:
    <input type="text" name="nis" value="<?php echo $list['nis'] ?>"> <br></br>

    Alamat:
    <input type="text" name="alamat" value="<?php echo $list['alamat'] ?>"> <br></br>

    Kelas:
    <input type="text" name="kelas" value="<?php echo $list['kelas'] ?>"> <br></br>

    <button type="submit">Simpan</button>
</form>
<?php } ?>

</body>
</html>