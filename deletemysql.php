<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";
session_start();
$id = $_GET['idTamu'];
// Insert ke dalem tabel
$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";

if ($conn->query($sql) === True){
    $_SESSION['insert_delete'] = 1;
    $_SESSION['insert_message'] = '<strong>Berhasil Terdelete</strong>';
    header("location:Halaman_buku_tamu.php");
}else{
    $_SESSION['insert_delete'] = 1;
    $_SESSION['insert_message'] = '<strong>Berhasil Terdelete</strong>';
    header("location:Halaman_buku_tamu.php");
}

// Memassukkan ke dalam query
// $conn->query($sql);
?>