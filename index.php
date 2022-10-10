<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Programming</title>
</head>

<body>
    
    <?php
    if (isset($_POST['submit'])) {
        $nim = $_POST['NIM'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];


        $simpan = mysqli_query($conn, "INSERT INTO tbmahasiswa VALUES ('$nim','$nama','$alamat')");
        if ($simpan) {
            echo  "<script>alert('Simpan Data Berhasil');</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal');</script>";
        }
    }

    ?>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Alamat Mahasiswa</th>
                <th colspan = 3>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM tbmahasiswa";
            $tampil = mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($tampil)):
        ?>
        <tr>
        <td><?=$data['NIM'];?></td>
        <td><?=$data['Nama'];?></td>
        <td><?=$data['Alamat'];?></td>
        <td><button><a href="edit.php?hal=edit&id=<?=$data['NIM'];?>">Edit</a></button></td>
        <td><button><a href="index.php?hal=hapus&id=<?=$data['NIM'];?>">Hapus</a></button></td>
        </tr>
        <?php endwhile;?>
        </tbody>
        <?php
            if(isset($_GET['hal']))
            {
                if($_GET['hal']=="hapus")
                {
                    $hapus=mysqli_query($conn,"DELETE FROM tbmahasiswa WHERE NIM = '$_GET[id]'");
                    if ($hapus) {
                        echo  "<script>alert('Hapus Data Berhasil');</script>";
                    } else {
                        echo "<script>alert('Hapus Data Gagal');</script>";
                    }

                }
            }
        ?>
    </table>
</body>

</html>