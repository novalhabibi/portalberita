<?php 
include '../pengaturan/koneksi.php';


 ?>
<h3>Tambah Kategori</h3>
<form class="form-inline" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <div class="input-group">
      <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="tambah">Tambahkan</button>
</form>
<?php 
if (isset($_POST['tambah'])) 
{
	$nama_kategori=$_POST['nama_kategori'];

	$simpan=$koneksi->query("INSERT INTO kategori() VALUES(null,'$nama_kategori')");
	if ($simpan) 
	{
		echo "<script type='text/javascript'>
		 	alert('Data tersimpan');
		 	document.location='index.php?tampilan=kategori';
		 	 </script>";
	}
	else
	{
		{
		echo "<script type='text/javascript'>
		 	alert('Gagal menyimpan');
		 	 </script>";
	}
	}
	
}
 ?>