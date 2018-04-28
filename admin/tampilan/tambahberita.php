<!-- Bootstrap Core CSS -->
  <?php 
include '../pengaturan/koneksi.php';
include 'tampilan/fungsi.php';
include 'tampilan/waktu.php';

 ?>  
<h3>Tambah Berita</h3>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Judul Berita</label>
    <input type="text" class="form-control" name="judul" id="exampleInputEmail1" placeholder="Judul Berita" style="width: 540px;">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Kategori</label>
    <select name="id_kategori" id="" class="form-control" style="width: 240px;">
    	<?php 
    	$data=$koneksi->query("SELECT *FROM kategori");
    	while ($kategori=$data->fetch_assoc()) 
    	{
    	?>
    	<option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['kategori']; ?></option>
    	<?php

    	}
    	 ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Gambar Berita</label>
    <input type="file" name="gambar" id="exampleInputFile">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Teks Berita</label>
    <textarea name="teks_berita" class="ckeditor" id="ckeditor"></textarea>
  </div>
  <button type="submit" class="btn btn-info" name="simpan" value="simpan">Simpan</button>
</form>
<?php 
$id_admin=$_SESSION['id_admin'];

if (isset($_POST['simpan'])) 
{
	$judul=$_POST['judul'];
	$id_kategori=$_POST['id_kategori'];
	$teks_berita=$_POST['teks_berita'];
	$tgl_posting=date("Y-m-d H:i:s");

	$gambar=$_FILES['gambar']['name'];
    $lokasi=$_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "../gambar/news/".$gambar);
	$simpan=$koneksi->query("INSERT INTO berita() VALUES(null,'$judul','$id_kategori','$gambar','$teks_berita',
							'$tgl_posting','$id_admin',0 )")or die(mysqli_error($koneksi)) ;
	if ($simpan) 
	{
		echo "<script type='text/javascript'>
		 	alert('Data tersimpan');
		 	document.location='index.php?tampilan=berita';
		 	 </script>";
	}
	else
	{
		echo "<script type='text/javascript'>
		 	alert('Data gagal tersimpan');
		 	document.location='index.php?tampilan=tambahberita';
		 	 </script>";
	}
}

?>
