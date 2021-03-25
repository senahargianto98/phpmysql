<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";

$id = $_GET['idTamu'];
// Insert ke dalem tabel
$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";

if ($conn->query($sql) === True){
    echo "
    <script> alert('Berhasil Terhapus');
        location.assign('Halaman_buku_tamu.php');
    </script>";
}else{
    echo "
    <script> alert('Gagal Terhapus');
        location.assign('Halaman_buku_tamu.php');
    </script>";
}

// Memassukkan ke dalam query
// $conn->query($sql);
?>