<?php  
if (empty($_SESSION['id_admin'])) {
	echo "<script type='text/javascript'>
		 	alert('anda belum login');
		 	document.location='index.php';
		 	 </script>";
}else{
 $id_admin=$_SESSION['id_admin'];
//include "../pengaturan/koneksi.php";
include '../pengaturan/waktu.php';
include 'fungsi.php';
?>
<h3>Tambah Iklan</h3>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
  	<label>Nama Perusahaan</label>
    <input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>">
    <input type="text" name="nm_perusahaan" class="form-control" style="width: 540px;">
</div>
<div class="form-group">
  	<label>Isi Iklan</label>
    <textarea type="text" name="isi_iklan" class="form-control" ></textarea>
</div>
<div class="form-group">
	<label>Gambar Iklan</label>
  	<input type="file" name="gambar" class="form-group">
</div>

<table class="table table-bordered">
	<tr>
		<th><label>Tanggal Mulai</label></th>
		<th><label>Tanggal Akhir</label></th>
		<th><label>Harga Sewa</label></th>
		
	</tr>
	<tr>
		<td><input type="date" name="tgl_mulai" class="form-control"   style="width: 140px; color:green;"></td>
		<td><input type="date" name="tgl_akhir" class="form-control"   style="width: 140px; color:red;"></td>
		<td><input type="text" name="hargasewa" class="form-control"   style="width: 150px;"></td>
		
	</tr>
</table>
<div class="form-group" disabled>
  	<label>Email Perusahaan</label>
    <input type="email" name="email" class="form-control"  style="width: 540px;">
</div>
<div class="form-group">
  	<label>Link Iklan</label>
  	<input type="text" name="link" class="form-control" value="http://" style="width: 540px;">
</div>
<button class="btn btn-primary" name="simpan">Simpan</button>
<?php 
if (isset($_POST['simpan'])) 
{
	$nm_perusahaan=$_POST['nm_perusahaan'];
	$isi_iklan=$_POST['isi_iklan'];
	$tgl_mulai=$_POST['tgl_mulai'];
	$tgl_akhir=$_POST['tgl_akhir'];
	$email=$_POST['email'];
	$link=$_POST['link'];

	$lamasewa=jangkawaktu($tgl_mulai,$tgl_akhir);
	$hargasewa=$_POST['hargasewa'];
	$totalharga=$lamasewa*$hargasewa;

	$gambar=$_FILES['gambar']['name'];
    $lokasi=$_FILES['gambar']['tmp_name'];
    move_uploaded_file($lokasi, "../gambar/".$gambar);
	$id_admin=$_SESSION['id_admin'];
	$status=1;
	$simpan=$koneksi->query("INSERT INTO iklan() VALUES(null,'$nm_perusahaan','$isi_iklan','$gambar','$tgl_mulai',
							'$tgl_akhir','$id_admin','$hargasewa','$lamasewa','$totalharga',$status,'$email','$link' )")or die(mysqli_error($koneksi)) ;
	if ($simpan) 
	{
		echo "<script type='text/javascript'>
		 	alert('Data tersimpan');
		 	document.location='index.php?tampilan=iklan';
		 	 </script>";
	}
	else
	{
		echo "<script type='text/javascript'>
		 	alert('Data gagal tersimpan');
		 	document.location='index.php?tampilan=tambahiklan';
		 	 </script>";
	}
}
 ?>
</form>
<?php } ?>