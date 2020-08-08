<?php
	session_start();
	include_once('akses_admin.php');
	$id	= $_GET['id'];
	$sql	= $conn->query("delete from tbl_mahasiswa where judul_artikel_ilmiah='$id'");
	
	echo "<script language=javascript>
			window.alert('Hapus Berhasil');
			window.location='gejala.php?hal=1';
			</script>";
?>