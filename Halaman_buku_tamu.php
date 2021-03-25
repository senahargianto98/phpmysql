<?php
require_once "MYSQL_connection.php";
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    
    <title>Hello, world!</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm"></div>

    <div class="col-10" style="margin-top: 180px;">
    <h1>Buku Tamu</h1>
        <form method="POST" action="Proses_insert.php">
        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Pesan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="pesan"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    
        <table class="table" id="myTable">
        <h1>Buku Tamu</h1>
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Pesan Komentar</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM tb_tamu ORDER BY id_tamu DESC";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
            $no =1;
            while($row = $result->fetch_assoc()){?>

            <tr>
            <td><?=$no;?></td>
                <td><?=$row['id_tamu'];?></td>
                <td><?=$row['nama_tamu'];?></td>
                <td><?=$row['email_tamu'];?></td>
                <td><?=$row['pesan_tamu'];?></td>
                <td><a href="deletemysql.php?idTamu=<?=$row['id_tamu'];?>" onclick="return confirm('Yakin Menghapus ?')" class="text-danger" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> | <a href="halamanedit.php?idTamu=<?=$row['id_tamu'];?>"><i class="fa fa-pencil-square-o"aria-hidden="true"></i>Edit</a></td>
            </tr>
            <?php 
                    $no++;
                    }
                }
            ?>

        </tbody>
        </table>
    </div>

    <div class="col-sm"></div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#myTable').DataTable({
                pageLength: 5,
            });
        });
    </script>
  </body>
</html>