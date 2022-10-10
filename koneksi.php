<?php
$servername = "localhost";
$database = "mahasiswa";
$username = "root";
$password = "";
 
// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
// membuat koneksi
$conn = mysqli_connect("localhost", "root", "", "mahasiswa");
// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// else{
//     echo "koneksi sukses";
// } 

?>