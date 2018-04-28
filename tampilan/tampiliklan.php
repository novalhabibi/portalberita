<fieldset><legend><h2>Iklan</h2></legend>
<?php 
include "pengaturan/koneksi.php";
$aktifiklan=$koneksi->query("UPDATE iklan SET aktif=1 WHERE tgl_mulai >= curdate()");//set iklan menjadi 1 dari sekarang
$nonaktif_iklan=$koneksi->query("UPDATE iklan SET aktif=0 WHERE tgl_akhir < curdate()");//set iklan menjadi 0 jika lewat dari sekarang

$query=$koneksi->query("SELECT * FROM iklan WHERE aktif=1");
while ($iklan=$query->fetch_assoc()) {
echo "<span class='iklan'>
 <a href='$iklan[link]' target='blank'>
 	<img src='gambar/$iklan[gambar]' width='75px'>

 	<h3>$iklan[isi_iklan]</h3>
 </a></span><hr>
	";
}
 ?>
 </fieldset>
 