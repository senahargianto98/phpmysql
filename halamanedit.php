<?php
require_once "MYSQL_connection.php";
$id = $_GET['idTamu'];
$sql = "SELECT * FROM tb_tamu WHERE id_tamu='$id'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $nama = $row['nama_tamu'];
    $email = $row['email_tamu'];
    $pesan = $row['pesan_tamu'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Hello, world!</title>
  </head>
  <body>
    

<div class="container">
  <div class="row">
    <div class="col-sm"></div>

    <div class="col-10" style="margin-top: 180px;">
        <h1>Buku Tamu</h1>
        <form method="POST" action="updateproses.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Id</label>
                <input type="text" class="form-control" name="id" value="<?= $_GET['idTamu'];?>" readonly>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $nama; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" name="email" value="<?= $email; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Pesan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="pesan"><?= $pesan; ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="Halaman_buku_tamu.php" role="button"><i class="fa fa-arrow-left" aria-hidden="true">Kembali</i></a>
        </form>
    </div>

    <div class="col-sm"></div>
  </div>
</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>