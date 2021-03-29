<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";
session_start();
$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan = $_POST['pesan'];
// Insert ke dalem tabel
$sql = "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";

if ($conn->query($sql) === True){
    $_SESSION['insert_status'] = 1;
    $_SESSION['alert_status'] = 'alert alert-success alert-dismissible fade show';
    $_SESSION['insert_message'] = '<strong>Berhasil Terinsert</strong>';
    header("location:Halaman_buku_tamu.php");
}else{
    $_SESSION['insert_status'] = 1;
    $_SESSION['alert_status'] = 'alert alert-danger alert-dismissible fade show';
    $_SESSION['insert_message'] = '<strong>Gagal Terinsert</strong>';
    header("location:Halaman_buku_tamu.php");
}

// Memassukkan ke dalam query
// $conn->query($sql);
?>