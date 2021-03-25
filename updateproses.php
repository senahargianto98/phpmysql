<?php
// Menghubungkan ke koneksi
require_once "MYSQL_connection.php";

$nama = $_POST['nama'];
$email= $_POST['email'];
$pesan = $_POST['pesan'];
$id = $_POST['id'];


// Insert ke dalem tabel
$sql = "UPDATE tb_tamu SET nama_tamu='$nama',email_tamu='$email',pesan_tamu='$pesan' WHERE id_tamu='$id' ";

if ($conn->query($sql) === True){
    echo "
    <script> alert('Berhasil Update');
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