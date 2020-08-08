<?php
include '../koneksi.php';
$query = mysqli_fetch_array(mysqli_query($koneksi, "select * from tbl_mahasiswa where judul_artikel_ilmiah='$_GET[judul_artikel_ilmiah]'"));
$query = array(
            'jenis_jurnal'      =>  $query['jenis_jurnal'],
            'lembaga_pengindeks'   =>  $query['lembaga_pengindeks'],
            'impact_factor'    =>  $query['impact_factor'],
            'penulis1'    =>  $query['penulis1'],
            'penulis2'    =>  $query['penulis2'],
            'pengusul'    =>  $query['pengusul'],
            'nama_jurnal'    =>  $query['nama_jurnal'],
            'issn'    =>  $query['issn'],
            'vol'    =>  $query['vol'],
            'url'    =>  $query['url'],);
 echo json_encode($query);
?>