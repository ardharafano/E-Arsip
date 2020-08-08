<?php
include('koneksi.php');
if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("select * from jurnal where judul_artikel_ilmiah like '%$q%' or jenis_jurnal like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$=$row['judul_artikel_ilmiah'];
$jenis_jurnal=$row['jenis_jurnal'];
$penulis=$row['penulis'];
$pengusul=$row['pengusul'];

$re_judul_artikel_ilmiah='<b>'.$q.'</b>';
$re_jenis_jurnal='<b>'.$q.'</b>';

$final_judul_artikel_ilmiah = str_ireplace($q, $re_judul_artikel_ilmiah, $judul_artikel_ilmiah);

$final_jenis_jurnal = str_ireplace($q, $re_jenis_jurnal, $jenis_jurnal);


?>
<div class="kotak_hasilpencarian" align="left">

<img src="foto_user/<?php echo $penulis; ?>" style="width:25px; float:left; margin-right:6px" /><?php echo $final_judul_artikel_ilmiah; ?>&nbsp;<?php echo $final_jenis_jurnal; ?><br/>
<span style="font-size:9px; color:#999999"><?php echo $pengusul; ?></span></div>



<?php
}

}
else
{

}


?>
