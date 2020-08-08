<?php $thisPage="View Data"; ?>
<?php $title = "View Data" ?>
<?php $description = "View Data" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>View Data</h2>
			<hr />
			
			<?php
			$id = $_GET['id']; // mengambil data nim dari nim yang terpilih
			
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id='$id'"); // query memilih entri nim pada database
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['aksi']) == 'delete'){ // jika tombol 'Hapus Data' pada baris 87 ditekan
				$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'"); // query delete entri dengan nim terpilih
				if($delete){ // jika query delete berhasil dieksekusi
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil dihapus.</div>'; // maka tampilkan 'Data berhasil dihapus.'
				}else{ // jika query delete gagal dieksekusi
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
				}
			}
			?>
			<!-- bagian ini digunakan untuk menampilkan data mahasiswa -->
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">Judul Artikel Ilmiah</th>
					<td><?php echo $row['judul_artikel_ilmiah']; ?></td>
				</tr>
				<tr>
					<th>Jenis Jurnal</th>
					<td><?php echo $row['jenis_jurnal']; ?></td>
				</tr>
				<tr>
					<th>Lembaga Pengindeks</th>
					<td><?php echo $row['lembaga_pengindeks']; ?></td>
				</tr>
				<tr>
					<th>Impact Factor</th>
					<td><?php echo $row['impact_factor']; ?></td>
				</tr>
				<tr>
					<th>Penulis Utama</th>
					<td><?php echo $row['penulis1']; ?></td>
				</tr>
				<tr>
					<th>Penulis Pendamping</th>
					<td><?php echo $row['penulis2']; ?></td>
				</tr>
				<tr>
					<th>Pengusul</th>
					<td><?php echo $row['pengusul']; ?></td>
				</tr>
				<tr>
					<th>Nama Jurnal</th>
					<td><?php echo $row['nama_jurnal']; ?></td>
				</tr>
				<tr>
					<th>ISSN</th>
					<td><?php echo $row['issn']; ?></td>
				</tr>
				<tr>
					<th>Vol/No/Th</th>
					<td><?php echo $row['vol']; ?></td>
				</tr>
				<tr>
					<th>URL</th>
					<td><?php echo $row['url']; ?></td>
				</tr>
				<tr>
					<th>Tanggal</th>
					<td><?php echo $row['tanggal']; ?></td>
				</tr>
			</table>
			
			<a href="data.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
			<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="delete.php?aksi=delete&id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan mengahapus data <?php echo $row['id']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Hapus Data</a>
		</div> <!-- /.content -->
	</div> <!-- /.container -->
	<br>
<?php 
include("footer.php"); // memanggil file footer.php
?>