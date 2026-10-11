<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="POST">


        Nama Lengkap :
        <input type="text" name="nama" id=""> <br></br>

        NIS :
        <input type="number" name="NIS" id=""> <br></br>        

        Alamat :
        <input type="text" name="Alamat" id=""> <br></br>

        Kelas :
        <input type="text" name="Kelas" id=""> <br></br>

        <button type="submit">Kirim</button>
        <button type="reset">Hapus Semua</button>

    </form>

    
    <table border="1">
    <tr>
<th>No</th>
<th>Nama Lengkap</th>
<th>NIS</th>
<th>Alamat</th>
<th>Kelas</th>
<th colspan="2">Aksi</th>
</tr>

        <?php 
        include 'koneksi-db.php';

        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM tb_murid");
        while ($list=mysqli_fetch_array($data)) {
            echo "<tr>";
                echo "<td>" . $no++ . "</td>";
                echo "<td>" . $list['nama_lengkap'] . "</td>";
                echo "<td>" . $list['nis'] . "</td>";
                echo "<td>" . $list['alamat'] . "</td>";
                echo "<td>" . $list['kelas'] . "</td>";
                echo "<td> <a href='edit.php?id={$list['id']}'> Update </a> </td>";
                echo "<td> <a href='delete.php?id={$list['id']}'> Delete </a> </td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
