<?php
include "koneksi.php";

$sql = mysqli_query($conn,"SELECT * FROM tbmahasiswa WHERE NIM = '$_GET[id]'");
while($data=mysqli_fetch_array($sql)):
?>
<form Method="POST" action="">
        NIM Mahasiswa : <input type="number" name="NIM" value="<?=$data['NIM'];?>">
        Nama Mahasiswa : <input type="text" name="nama" value="<?=$data['Nama'];?>">
        Alamat : <input type="text" name="alamat" value="<?=$data['Alamat'];?>">
        <input type="submit" value="submit" name="submit">
        <?php endwhile;?>
    </form>
<?php
    if(isset($_POST['submit']))
    {
        $nim = $_POST['NIM'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $edit = mysqli_query($conn,"UPDATE `tbmahasiswa` SET `NIM`='$nim',`Nama`='$nama',`Alamat`='$alamat' WHERE NIM = '$_GET[id]'");
        if ($edit) {
            echo  "<script>alert('Edit Data Berhasil');document.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Edit Data Gagal');</script>";
        }
    }

?>