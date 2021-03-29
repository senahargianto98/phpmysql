<!doctype html>
<html lang="en">
<?php
session_start();
?>

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-sm">
			</div>
			<div class="col-sm" style="margin-top: 200px;">
				<h1>Login</h1>

				<?php
				if (isset($_SESSION['insert_status'])) {
					if ($_SESSION["insert_status"] == 0) {
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

				<form action="cek_login.php" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" name="user" required="required" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="pass" required="required" placeholder="Password" required class="form-control">
					</div>
					<button type="submit" title="Log In" name="login" value="Login" class="btn btn-primary">Submit</button>
				</form>
			</div>
			<div class="col-sm">
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


	<script>
		$(document).ready(function() {
			$('.alert').delay(500).fadeOut(2000);
		});
	</script>
</body>

</html>

<!-- <html>

<head>

</head>

<body>
	<div class="form-wrapper">
		<form action="cek_login.php" method="post">
			<h3>Login here</h3>

			<div class="form-item">
				<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
			</div>
			<div class="form-item">
				<input type="password" name="pass" required="required" placeholder="Password" required></input>
			</div>
			<div class="button-panel">
				<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
			</div>
		</form>
	</div>

</body>

</html> -->