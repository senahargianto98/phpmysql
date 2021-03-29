<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";
session_start();

$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan = $_POST['pesan'];
$id = $_POST['id'];


// Insert ke dalem tabel
$sql = "UPDATE tb_tamu SET nama_tamu='$nama',email_tamu='$email',pesan_tamu='$pesan' WHERE id_tamu='$id' ";


if ($conn->query($sql) === True){
    $_SESSION['insert_update'] = 1;
    $_SESSION['insert_message'] = '<strong>Berhasil Terupdate</strong>';
    header("location:Halaman_buku_tamu.php");
}else{
    $_SESSION['insert_update'] = 1;
    $_SESSION['insert_message'] = '<strong>Berhasil Terupdate</strong>';
    header("location:Halaman_buku_tamu.php");
}

// Memassukkan ke dalam query
// $conn->query($sql);
?>