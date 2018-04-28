<h3>Edit Data Kategori</h3>
<?php 
$id_kategori=$_GET['id_kategori'];

$data=$koneksi->query("SELECT *FROM kategori WHERE id_kategori='$id_kategori' ");
$kategori=$data->fetch_assoc();
 ?>
<form class="form-inline" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <div class="input-group">
      <input type="text" name="nama_kategori" class="form-control" value="<?php echo $kategori['kategori'] ?>">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" name="edit">Edit</button>
</form>
<?php 
if (isset($_POST['edit'])) 
{
	$nama_kategori=$_POST['nama_kategori'];

	$simpan=$koneksi->query("UPDATE kategori SET kategori='$nama_kategori' WHERE id_kategori='$id_kategori'");
	if ($simpan) 
	{
		echo "<script type='text/javascript'>
		 	alert('Data telah di edit');
		 	document.location='index.php?tampilan=kategori';
		 	 </script>";
	}
	else
	{
		{
		echo "<script type='text/javascript'>
		 	alert('Gagal mengedit');
		 	 </script>";
	}
	}
	
}
 ?>