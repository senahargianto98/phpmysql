<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<?php
	if (isset($_POST['login']))
		{
			$username = mysqli_real_escape_string($con, $_POST['user']);
			$password = mysqli_real_escape_string($con, $_POST['pass']);
			$query 		= mysqli_query($con, "SELECT * FROM tb_login WHERE  password='$password' and username='$username'");
            $query1 = mysqli_query($con, "SELECT * FROM tb_login WHERE  password='$password' and email='$username'");
			$row		= mysqli_fetch_array($query);
            $row1		= mysqli_fetch_array($query1);
            $num_row1 	= mysqli_num_rows($query1);
			$num_row 	= mysqli_num_rows($query);
			if ($num_row > 0) 
				{			
					// $_SESSION['user_id']=$row['user_id'];
					header('location:Halaman_buku_tamu.php');
					
				}
            elseif($num_row1 > 0){
                header('location:Halaman_buku_tamu.php');
            }
			else
				{
					echo 'Invalid Username and Password Combination';
				}
		}
  ?>
