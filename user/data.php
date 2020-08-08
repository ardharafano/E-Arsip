<?php $thisPage="Data"; ?>
<?php $title = "Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php $description = "Data Mahasiswa - Data Mahasiswa v2.0" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Data Mahasiswa</h2>
			<hr />

			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<form class="form-inline" method="get">
				<div class="form-group">
					<select name="filter" class="form-control" onchange="form.submit()">
						<option value="0">Filter Data Mahasiswa</option>
						<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
						<option value="MIPA" <?php if($filter == 'MIPA'){ echo 'selected'; } ?>>MIPA</option>
						<option value="Pertanian" <?php if($filter == 'Pertanian'){ echo 'selected'; } ?>>Pertanian</option>
                        <option value="Biologi" <?php if($filter == 'Biologi'){ echo 'selected'; } ?>>Biologi</option>
						<option value="Ekonomi" <?php if($filter == 'Ekonomi'){ echo 'selected'; } ?>>Ekonomi</option>
					</select>
				</div>
			</form> <!-- end filter -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tempat Lahir</th>
						<th>Tanggal Lahir</th>
						<th>No Telepon</th>
						<th>Dosen Pembimbing</th>
						<th>Jurusan</th>
						<th>Fakultas</th>
					</tr>
					<?php
					if($filter){
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE fakultas='$filter' ORDER BY nim ASC"); // query jika filter dipilih
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC"); // jika tidak ada filter maka tampilkan semua entri
					}
					if(mysqli_num_rows($sql) == 0){ 
						echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
					}else{ // jika terdapat entri maka tampilkan datanya
						$no = 1; // mewakili data dari nomor 1
						while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['nim'].'</td>
								<td><a href="profile_mahasiswa.php?nim='.$row['nim'].'">'.$row['nama'].'</a></td>
								<td>'.$row['jenis_kelamin'].'</td>
								<td>'.$row['tempat_lahir'].'</td>
								<td>'.$row['tanggal_lahir'].'</td>
								<td>'.$row['no_telepon'].'</td>
								<td>'.$row['dosen_pembimbing'].'</td>
								<td>'.$row['jurusan'].'</td>
								<td>';
								if($row['fakultas'] == 'MIPA'){
									echo '<span class="label label-success">MIPA</span>';
								}
								else if ($row['fakultas'] == 'Pertanian' ){
									echo '<span class="label label-success">Pertanian</span>';
								}
								else if ($row['fakultas'] == 'Biologi' ){
									echo '<span class="label label-success">Biologi</span>';
								}
								else if ($row['fakultas'] == 'Ekonomi' ){
									echo '<span class="label label-success">Ekonomi</span>';
								}
							echo '
								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
				</table>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>