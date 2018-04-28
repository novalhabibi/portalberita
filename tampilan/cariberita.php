<h2>Cari Judul Berita <b class="background:#FFFF00"><?php echo $_POST['judul']; ?></b> </h2>
<?php 
include 'pengaturan/koneksi.php';
$judul=$_POST['judul'];
$query=$koneksi->query("SELECT *FROM berita WHERE judul LIKE '%$judul%' ");
while ($berita=$query->fetch_assoc()) {
	$datakomen=$koneksi->query("SELECT*FROM komentar WHERE id_berita='$berita[id_berita]' ");
	$jmlkomen=$query->num_rows;
echo " <a href='index.php?tampilan=detailberita&id_berita=$berita[id_berita]'>
 	<h3>$berita[judul]</h3>
 	<span class="small">Tanggal Posting : ".tgl_ina2($berita['tgl_posting'])."<br>
 	dilihat : $berita[dilihat] kali . Komentar : $jmlkomen
 	</span>
 	<img src='gambar/$berita[gambar]' width='300px' height='300px'>
 </a>
 <hr>";
}

?>
