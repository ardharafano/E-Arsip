<?php $thisPage="Tambah"; ?>
<?php $title = "Tambah Data " ?>
<?php $description = "Tambah Data" ?>
<?php 
include("header.php"); // memanggil file header.php
include("../koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<head>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

<?php
			if(isset($_POST['add'])){ // jika tombol 'Simpan' dengan properti name="add" ditekan
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
				$tanggal = $_POST['tanggal'];
						$insert = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa(judul_artikel_ilmiah, jenis_jurnal, lembaga_pengindeks, impact_factor, penulis1, penulis2, pengusul, nama_jurnal, issn, vol, url, tanggal) VALUES('$judul_artikel_ilmiah','$jenis_jurnal', '$lembaga_pengindeks', '$impact_factor', '$penulis1', '$penulis2', '$pengusul', '$nama_jurnal', '$issn', '$vol', '$url', NOW())") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
							echo "<script language=javascript>
								window.alert('Simpan Berhasil');
								window.location='data.php?hal=1';
								</script>";
							exit;
						}
			?>
		<div class="container container-body">
			<br>
			<br>
			<br>
			<br>
			<h3> Tambah Data </h3>
			<br>
					
				<div class="col-sm-8">
			<form class="form-horizontal" action="" method="post">
                <label>Judul Artikel Ilmiah</label>
                <input type="text" id="judul_artikel_ilmiah" class="form-control" name="judul_artikel_ilmiah" placeholder="Judul Artikel Ilmiah" onkeyup="isi_otomatis()" id="judul_artikel_ilmiah"></td></tr>
				<br>
                <label>Jenis Jurnal</label>
                <input type="text" id="jenis_jurnal" name="jenis_jurnal" class="form-control" placeholder="Jenis Jurnal" required>
				<br>
                <label>Lembaga Pengindeks</label>
                <input type="text" id="lembaga_pengindeks" name="lembaga_pengindeks" class="form-control" placeholder="Lembaga Pengindeks" required>
				<br>
                <label>Impact Factor</label>
                <input type="text" id="impact_factor" name="impact_factor" class="form-control" placeholder="Impact Factor" required>
				<br>
                <label>Penulis 1</label>
                <input type="text" id="penulis1" name="penulis1" class="form-control" placeholder="penulis1" required>
				<br>
                <label>Penulis 2</label>
                <input type="text" id="penulis2" name="penulis2" class="form-control" placeholder="penulis2">
				<br>
                <label>Pengusul</label>
                <input type="text" id="pengusul" name="pengusul" class="form-control" placeholder="pengusul" required>
				<br>
                <label>Nama Jurnal</label>
                <input type="text" id="nama_jurnal" name="nama_jurnal" class="form-control" placeholder="nama_jurnal" required>
				<br>
                <label>ISSN</label>
                <input type="text" id="issn" name="issn" class="form-control" placeholder="Nama" required>
				<br>
                <label>Volume</label>
                <input type="text" id="vol" name="vol" class="form-control" placeholder="vol" required>
				<br>
                <label>URL</label>
                <input type="text" id="url" name="url" class="form-control" placeholder="url" required>
				<br>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data mahasiswa">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
               
    </form>
	</div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var judul_artikel_ilmiah = $("#judul_artikel_ilmiah").val();
                $.ajax({
                    url: 'proses-ajax.php',
                    data:"judul_artikel_ilmiah="+judul_artikel_ilmiah ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#jenis_jurnal').val(obj.jenis_jurnal);
                    $('#lembaga_pengindeks').val(obj.lembaga_pengindeks);
                    $('#impact_factor').val(obj.impact_factor);
                    $('#penulis1').val(obj.penulis1);
                    $('#penulis2').val(obj.penulis2);
                    $('#pengusul').val(obj.pengusul);
                    $('#nama_jurnal').val(obj.nama_jurnal);
                    $('#issn').val(obj.issn);
                    $('#vol').val(obj.vol);
                    $('#url').val(obj.url);
                });
            }
        </script>

		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</body>
</html>