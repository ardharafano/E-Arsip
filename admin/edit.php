<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data " ?>
<?php $description = "Tambah Data" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
	<div class="container">
		<div class="content">
			<h2>Jurnal &raquo; Edit Data</h2>
			<hr />
			
			<?php
			$username = $_SESSION['admin']; // assigment username dengan nilai username yang akan diedit
			$id	= $_GET['id'];
			$sql = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id='$id'"); // query untuk memilih entri data dengan nilai username terpilih
			if(mysqli_num_rows($sql) == 0){
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['update'])){ // jika tombol 'Simpan' dengan properti name="add" ditekan
				$judul_artikel_ilmiah		     = $_POST['judul_artikel_ilmiah'];
				$jenis_jurnal		     = $_POST['jenis_jurnal'];
				$lembaga_pengindeks   = $_POST['lembaga_pengindeks'];
				$impact_factor	 = $_POST['impact_factor'];
				$penulis1	 = $_POST['penulis1'];
				$penulis2	 = $_POST['penulis2'];
				$pengusul     = $_POST['pengusul'];
				$nama_jurnal = $_POST['nama_jurnal'];
				$issn		 = $_POST['issn'];
				$vol  		 = $_POST['vol'];
				$url = $_POST['url'];
						$update = mysqli_query($koneksi, "UPDATE tbl_mahasiswa set
						judul_artikel_ilmiah 	= '$judul_artikel_ilmiah',
						jenis_jurnal 			= '$jenis_jurnal',
						lembaga_pengindeks		= '$lembaga_pengindeks',
						impact_factor			= '$impact_factor',
						penulis1					= '$penulis1',
						penulis2					= '$penulis2',
						pengusul				= '$pengusul',
						nama_jurnal				= '$nama_jurnal',
						issn					= '$issn',
						vol						= '$vol',
						url						= '$url',
						tanggal					= NOW()
						where id = '$id'") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
						if($update){ // jika query insert berhasil dieksekusi
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Mahasiswa Berhasil Di Simpan. <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Data Mahasiswa Berhasil Di Simpan.'
						}else{ // jika query insert gagal dieksekusi
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Mahasiswa Gagal Di simpan! <a href="data.php"><- Kembali</a></div>'; // maka tampilkan 'Ups, Data Mahasiswa Gagal Di simpan!'
						}
			}
						if(isset($_GET['pesan']) == 'sukses'){ // jika terdapat pesan=sukses sebagai bagian dari berhasilnya query update dieksekusi
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan. <- <a href="profile.php">Kembali ke Profile</a></div>'; // maka tampilkan 'Data berhasil disimpan.'
			}
			?>
			<!-- bagian ini merupakan bagian form untuk menginput data yang akan dimasukkan ke database -->
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">judul artikel ilmiah</label>
					<div class="col-sm-4">
						<input type="text" name="judul_artikel_ilmiah" value="<?php echo $row ['judul_artikel_ilmiah']; ?>" class="form-control" placeholder="judul_artikel_ilmiah" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">jenis_jurnal</label>
					<div class="col-sm-4">
						<input type="text" name="jenis_jurnal" value="<?php echo $row ['jenis_jurnal']; ?>" class="form-control" placeholder="jenis_jurnal" required>
					</div>
				</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">lembaga_pengindeks</label>
					<div class="col-sm-4">
						<input type="text" name="lembaga_pengindeks" value="<?php echo $row ['lembaga_pengindeks']; ?>" class="form-control" placeholder="lembaga_pengindeks" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">impact_factor</label>
					<div class="col-sm-4">
						<input type="text" name="impact_factor" value="<?php echo $row ['impact_factor']; ?>" class="form-control" placeholder="impact_factor" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Penulis 1</label>
					<div class="col-sm-4">
						<input type="text" name="penulis1" value="<?php echo $row ['penulis1']; ?>" class="form-control" placeholder="penulis" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-3 control-label">Penulis 2 (jika ada)</label>
					<div class="col-sm-4">
						<input type="text" name="penulis2" value="<?php echo $row ['penulis2']; ?>" class="form-control" placeholder="penulis">
					</div>
				</div>
			<div class="form-group">
					<label class="col-sm-3 control-label">pengusul</label>
					<div class="col-sm-4">
						<input type="text" name="pengusul" value="<?php echo $row ['pengusul']; ?>" class="form-control" placeholder="pengusul" required>
					</div>
				</div>
					<div class="form-group">
					<label class="col-sm-3 control-label">nama_jurnal</label>
					<div class="col-sm-4">
						<input type="text" name="nama_jurnal" value="<?php echo $row ['nama_jurnal']; ?>" class="form-control" placeholder="nama_jurnal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">issn</label>
					<div class="col-sm-4">
						<input type="text" name="issn" value="<?php echo $row ['issn']; ?>" class="form-control" placeholder="nama_jurnal" required>
					</div>
				</div>
								<div class="form-group">
					<label class="col-sm-3 control-label">vol</label>
					<div class="col-sm-4">
						<input type="text" name="vol" value="<?php echo $row ['vol']; ?>" class="form-control" placeholder="nama_jurnal" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">url</label>
					<div class="col-sm-4">
						<input type="text" name="url" value="<?php echo $row ['url']; ?>" class="form-control" placeholder="url" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="update" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> <!-- /form -->
		</div> <!-- /.content -->
	</div> <!-- /.container -->
<?php 
include("footer.php"); // memanggil file footer.php
?>