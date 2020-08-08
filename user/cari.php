<?php $thisPage="Cari"; ?>
<?php $title = "Cari Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php $description = "Cari Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<?php $nim = $_POST['carinim']; // mengambil nim dari form cari ?> 
			<h2>Pencarian Data Mahasiswa &raquo; NIM: <?php echo $nim; // menampilkan nim ?></h2>
			<hr />
			
			<?php
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'"); // query untuk memilih entri dengan nim terpilih
			if(mysqli_num_rows($sql) == 0){
				header("Location: no_result.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data mahasiswa hasil pencarian-->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">NIM</th>
					<td><?php echo $row['nim']; ?></td>
				</tr>
				<tr>
					<th>Nama mahasiswa</th>
					<td><?php echo $row['nama']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $row['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>Tempat & Tanggal Lahir</th>
					<td><?php echo $row['tempat_lahir'].', '.$row['tanggal_lahir']; ?></td>
				</tr>
				<tr>
					<th>Alamat Asal</th>
					<td><?php echo $row['alamat_asal']; ?></td>
				</tr>
				<tr>
					<th>Alamat Sekarang</th>
					<td><?php echo $row['alamat_sekarang']; ?></td>
				</tr>
				<tr>
					<th>No Telepon</th>
					<td><?php echo $row['no_telepon']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<th>Dosen Pembimbing</th>
					<td><?php echo $row['dosen_pembimbing']; ?></td>
				</tr>
				<tr>
					<th>Jurusan</th>
					<td><?php echo $row['jurusan']; ?></td>
				</tr>
				<tr>
					<th>Fakultas</th>
					<td><?php echo $row['fakultas']; ?></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $row['username']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>