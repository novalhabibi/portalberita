<br>
<br>
<?php 
include "pengaturan/koneksi.php";
$query=$koneksi->query("SELECT *FROM berita ORDER BY dilihat DESC ");
while ($populer=$query->fetch_assoc()) 
{
	$data=$koneksi->query("SELECT *FROM komentar WHERE id_berita='$populer[id_berita]' ");
	$jmlkomen=$data->num_rows;
	echo "
<a href='index.php?tampilan=detailberita&id_berita=$populer[id_berita]'>
	<h4>$populer[judul]</h4>
	<p>
		<span class='small'>
			Tanggal Posting : ".tgl_ina2($populer['tgl_posting'])."<br>
			dilihat : $populer[dilihat] kali. Komentar : $jmlkomen
		</span>
		<img src='gambar/$populer[gambar]' width='100px'>
	</p>
</a> <hr>";
}

?>
