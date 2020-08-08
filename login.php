<?php $thisPage="Login"; ?>
<?php $title = "Login - Data Mahasiswa v2.0" ?>
<?php $description = "Login - Data Mahasiswa v2.0" ?>
<?php 
include("akses.php");
include("header.php"); // memanggil file header.php
require("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<!-- Start container -->
	<div class="container">
		<div class="content login">
			<form class="form-signin" action="" method="post">
				<h2 class="form-signin-heading">Please login</h2>
				<label for="username" class="sr-only">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
				<label for="password" class="sr-only">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" required>
						<div class="form-group">
					<select name="level" class="form-control" required>
						<option value="">Pilih Level User</option>
						<option value="admin">Admin</option>
						<option value="dosen">Dosen</option>
					</select>
				</div>
				<div class="checkbox">
				  <label>
					<!-- <input type="checkbox" value="remember-me"> Remember me -->
				  </label>
				</div>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">Login</button>
			</form>
		</div> <!-- /.content -->
	</div>
	<!-- End container -->

	<?php
	if(isset($_POST['login'])){
		$username = mysqli_real_escape_string($koneksi, htmlentities($_POST['username']));
		$password = mysqli_real_escape_string($koneksi, htmlentities(($_POST['password'])));
		$level = mysqli_real_escape_string($koneksi, htmlentities(($_POST['level'])));

		$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'") or die(mysqli_error($koneksi));
		if(mysqli_num_rows($sql) == 0){
			echo '<center><span class="label label-danger">User tidak ditemukan</span></center>';
		}else{
			$row = mysqli_fetch_assoc($sql);
			if($row['level'] == 'admin'){
				$_SESSION['admin']=$username;
				$_SESSION['level']='admin';
				echo '<script language="javascript">document.location="admin/index.php";</script>';
			}
			else if($row['level'] == 'dosen'){
				$_SESSION['user']=$username;
				$_SESSION['level']='user';
				echo '<script language="javascript">document.location="user/index.php";</script>';
			}else{
				echo '<center><div class="alert alert-danger">Upss...!!! Login gagal.</div></center>';
			}
		}
	}
	?>

<?php 
include("footer.php"); // memanggil file footer.php
?>