<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";

$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan = $_POST['pesan'];
// Insert ke dalem tabel
$sql = "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";

if ($conn->query($sql) === True){
    echo "
    <script> alert('Berhasil Tersimpan');
        location.assign('Halaman_buku_tamu.php');
    </script>";
}else{
    echo "
    <script> alert('Gagal Tersimpan');
        location.assign('Halaman_buku_tamu.php');
    </script>";
}

// Memassukkan ke dalam query
// $conn->query($sql);
?>