<?php $thisPage="Data"; ?>
<?php $title = "Data" ?>
<?php $description = "Data" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>

	<div class="container">
		<div class="content">
			<center><h2>Data </h2></center>
			<hr />
			<head>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			</head>
			<?php
			if(isset($_GET['aksi']) == 'delete'){ // mengkonfirmasi jika 'aksi' bernilai 'delete'
				$id = $_GET['id']; // ambil nilai nim
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id='$id'"); // query untuk memilih entri dengan nim yang dipilih
				if(mysqli_num_rows($cek) == 0){ // mengecek jika tidak ada entri nim yang dipilih
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>'; // maka tampilkan 'Data tidak ditemukan.'
				}else{ // mengecek jika terdapat entri nim yang dipilih
					$delete = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE id='$id'"); // query untuk menghapus
					if($delete){ // jika query delete berhasil dieksekusi
						echo '<div class="alert alert-success"><center>Data Berhasil Dihapus</center></div>';
					}else{ // jika query delete gagal dieksekusi
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>'; // maka tampilkan 'Data gagal dihapus.'
					}
				}
			}
			?>
			<!-- bagian ini untuk memfilter data berdasarkan fakultas -->
			<br />
			<!-- memulai tabel responsive -->
			<div class="container">
			 <div class="navbar-inner" style="border:1px solid #bbb; border-radius:10px; padding:10px 20px 10px 20px; margin-top:auto; margin-left:auto; margin-right:auto;">
				<table id="table-data" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul Artikel Ilmiah</th>
						<th>Jenis Jurnal</th>
						<th>Lembaga Pengindeks</th>
						<th>Impact Factor</th>
						<th>Penulis Utama</th>
						<th>Penulis Pendamping</th>
						<th>Pengusul</th>
						<th>Nama Jurnal</th>
						<th>Tanggal</th>
						<th>OPSI</th>
					</tr>
					</thead>
					<tbody>
					
					<?php
						$sql = mysqli_query($koneksi,"SELECT * FROM tbl_mahasiswa ORDER BY ID DESC");
						if($sql->num_rows > 0){
						$no = 1;
						while($row = $sql->fetch_assoc()){
						echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['judul_artikel_ilmiah'].'</td>
								<td>'.$row['jenis_jurnal'].'</a></td>
								<td>'.$row['lembaga_pengindeks'].'</td>
								<td>'.$row['impact_factor'].'</td>
								<td>'.$row['penulis1'].'</td>
								<td>'.$row['penulis2'].'</td>
								<td>'.$row['pengusul'].'</td>
								<td>'.$row['nama_jurnal'].'</td>
								<td>'.$row['tanggal'].'</td>
								<td>

									<a href="view.php?id='.$row['id'].'" title="View Data" data-toggle="tooltip" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
									<a href="edit.php?id='.$row['id'].'" title="Edit Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
									<a href="data.php?aksi=delete&id='.$row['id'].'" title="Hapus Data" data-toggle="tooltip" onclick="return confirm(\'Anda yakin akan menghapus data '.$row['id'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>								</td>
							</tr>
							';
							$no++; // mewakili data kedua dan seterusnya
						}
					}
					?>
					</tbody>
					    <script>
    $(document).ready(function(){
        $('#table-data').DataTable();
    });
</script>
				</table>
				</div>
			</div> <!-- /.table-responsive -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
	</div>
	<br><br><br>
<?php 
include("footer.php"); // memanggil file footer.php
?>