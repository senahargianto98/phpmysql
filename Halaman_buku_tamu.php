<?php
require_once "MYSQL_connection.php";
session_start();
if(!isset($_SESSION['login'])){
  header("location:index.php");
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
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- Ini Modal -->
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form method="POST" action="updateproses.php">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Id</label>
                    <input type="text" class="form-control edit-id" name="id" readonly>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control edit-nama" name="nama">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control edit-email" aria-describedby="emailHelp" name="email">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Pesan</label>
                    <textarea class="form-control edit-pesan" rows="10" name="pesan"></textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a class="btn btn-primary" href="Halaman_buku_tamu.php" role="button"><i class="fa fa-arrow-left" aria-hidden="true">Kembali</i></a>

                </form>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Ini modal -->

    <div class="col-11" style="margin-top: 180px;">
      <h1>Buku Tamu</h1>

      <?php
      if (isset($_SESSION['insert_status'])) {
        if ($_SESSION["insert_status"] == 1) {
      ?>
          <div class="<?= $_SESSION['alert_status']; ?>" role="alert">
            <?= $_SESSION['insert_message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <?php }
      }
      unset($_SESSION['insert_status']) ?>

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
        <?php
        if (isset($_SESSION['insert_update'])) {
          if ($_SESSION["insert_update"] == 1) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $_SESSION['insert_message']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php }
        }
        unset($_SESSION['insert_update']) ?>

        <?php
        if (isset($_SESSION['insert_delete'])) {
          if ($_SESSION["insert_delete"] == 1) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?= $_SESSION['insert_message']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        <?php }
        }
        unset($_SESSION['insert_delete']) ?>
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
          if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) { ?>

              <tr>
                <td><?= $no; ?></td>
                <td><?= $row['id_tamu']; ?></td>
                <td><?= $row['nama_tamu']; ?></td>
                <td><?= $row['email_tamu']; ?></td>
                <td><?= $row['pesan_tamu']; ?></td>
                <td>
                  <a href="deletemysql.php?idTamu=<?= $row['id_tamu']; ?>" onclick="return confirm('Yakin Menghapus ?')" class="text-danger" disabled><i class="fa fa-trash" aria-hidden="true"></i> Delete
                  </a> |
                  <!-- <a href="halamanedit.php?idTamu=<?= $row['id_tamu']; ?>" class="btn btn-primary disabled"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                  </a> -->

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id_tamu']; ?>" data-nama="<?= $row['nama_tamu']; ?>" data-email="<?= $row['email_tamu']; ?>" data-pesan="<?= $row['pesan_tamu']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>

                </td>
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



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        pageLength: 5,
      });
      $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var nama = button.data('nama')
        var email = button.data('email')
        var pesan = button.data('pesan')
        // var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body .edit-id').val(id)
        modal.find('.modal-body .edit-nama').val(nama)
        modal.find('.modal-body .edit-email').val(email)
        modal.find('.modal-body .edit-pesan').val(pesan)
      })
      $('.alert').delay(500).fadeOut(2000);
    });
  </script>


</body>

</html>