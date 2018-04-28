<h2>Kategori Berita <?php echo ucwords($_GET['kategori']); ?></h2>

<?php 
include "pengaturan/koneksi.php";
$id_kategori=$_GET['id_kategori'];
$query=$koneksi->query("SELECT *FROM berita WHERE id_kategori='$id_kategori' ");
if (($query->num_rows) > 0) {

while ($populer=$query->fetch_assoc()) {
	$data=$koneksi->query("SELECT *FROM berita WHERE id_berita='$populer[id_berita]' ");
	$jmlkomen=$data->num_rows;

	echo "<a href='index.php?tampilan=detailberita&id_berita=$populer[id_berita]'>
	<h3>$populer[judul]</h3>
	<span class='small'>Tanggal Posting : ".tgl_ina2($populer['tgl_posting'])."<br>
		dilihat : $populer[dilihat] kali. Komentar : $jmlkomen
	</span>
</a>
<hr>";

}

}else
{
	echo "<div class='alert alert-danger' role='alert'>Tidak ditemukan</div>";
}
?>
