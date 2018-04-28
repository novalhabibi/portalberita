<div class="col-md-12">
<h2>Berita</h2><span class="small"><?php echo tgl_ina($tgl_sekarang).".::.".$jam_sekarang; ?></span><hr>
<?php 
include "pengaturan/koneksi.php";
$id_berita=$_GET['id_berita'];

$query1=$koneksi->query("SELECT *FROM berita WHERE id_berita='$id_berita' ");

$update=$koneksi->query("UPDATE berita SET dilihat=dilihat+1 WHERE id_berita='$id_berita' ");

$berita=$query1->fetch_assoc();

echo "<h2 align='center'>".ucwords($berita['judul'])."</h2>";

echo "<span class='small'>".tgl_ina2($berita['tgl_posting'])."<br> Diposting oleh :".nama($berita['id_admin'])."</span>";

if (empty($berita['gambar'])) 
{
	$gambar="nopic.png";
}
else
{
	$gambar=$berita['gambar'];
}

echo "<div><img src='gambar/news/$gambar' width='300px' height='200px'></div>
<p>$berita[teks_berita]</p>
<bR>
";

//unruk komentar
echo "<h3><u>komentar</u></h3>";
$query=$koneksi->query("SELECT a.id_komentar, a.tgl_komentar, a.isi_komentar, b.nama_lengkap, b.email FROM komentar a INNER JOIN anggota b ON a.id_anggota=b.id_anggota WHERE a.id_berita='$id_berita' ORDER BY a.tgl_komentar DESC  "); //menggabungkan 2 tabel

while ($komen=$query->fetch_assoc())
{
	echo "<div class='small'> $komen[nama_lengkap] ($komen[email])".tgl_ina2($komen['tgl_komentar'])."</div>";
	echo "$komen[isi_komentar]<hr>";
}
if (!empty($_SESSION['login'])) {
	echo "<form action='perintah/komentar.php' method='POST' '>
 	<input type='hidden' name='id_berita' value='$id_berita'>
 	<textarea name='komentar' placeholder='Ini komentar' class='form-control' rows='3'> 		
 	</textarea>
 	<button type='submit'>Kirim</button>
 </form>";
}
 ?>
</div>
