<?php  
include '../pengaturan/waktu.php';
include '../pengaturan/koneksi.php';
include 'fungsi.php';
$id_admin=$_SESSION['id_admin'];
$id_iklan=$_GET['id_iklan'];
$data=$koneksi->query("SELECT *FROM iklan WHERE id_iklan='$id_iklan' ");
$iklan=$data->fetch_assoc();
//echo $id_admin;
?>
<h3>Detail Iklan</h3>

<form method="POST" enctype="multipart/form-data">
<div class="form-group">
  	<label>Id Iklan</label>
    <input type="text" class="form-control" value="<?php echo $id_iklan; ?>" disabled style="width: 50px;">
</div>
<div class="form-group">
  	<label>Nama Perusahaan</label>
    <input type="text" class="form-control"  name="nm_perusahaan" value="<?php echo $iklan['nm_perusahaan']; ?>"  style="width: 540px;">
</div>
<div class="form-group">
  	<label>Isi Iklan</label>
    <textarea type="text" name="isi_iklan" class="form-control" ><?php echo $iklan['isi_iklan']; ?></textarea>
</div>
<div class="form-group">
	<label>Gambar Iklan</label>
  	<img src="../gambar/<?php echo $iklan['gambar'] ?>" width="100px" class="form-control img-thumbnail" style="width: 200px; height: 100px">
</div>
<div class="form-group">
	<label>Ganti Gambar Iklan</label>
  	<input type="file" name="gambar" class="form-group">
</div>
<table class="table table-bordered">
	<tr>
		<th><label>Tanggal Mulai</label></th>
		<th><label>Tanggal Akhir</label></th>
		<th><label>Harga Sewa</label></th>
		
	</tr>
	<tr>
		<td><input type="text" class="form-control"  value="<?php echo tgl_ina3($iklan['tgl_mulai']); ?>" disabled style="width: 100px; color:green;"></td>
		<td><input type="text" class="form-control"  value="<?php echo tgl_ina3($iklan['tgl_akhir']); ?>" disabled style="width: 100px; color:red;"></td>
		<td><input type="text" class="form-control"  value="<?php echo rupiah($iklan['hargasewa']); ?>" disabled style="width: 150px;"></td>
	</tr>
	<tr>
		<td><input type="date" class="form-control"  name="tgl_mulai" style="width: 140px; color:green;"></td>
		<td><input type="date" class="form-control"  name="tgl_akhir" style="width: 140px; color:red;"></td>
		<td><input type="text" class="form-control" name="hargasewa"  style="width: 150px;"></td>
		
	</tr>
</table>
<div class="form-group" disabled>
  	<label>Email Perusahaan</label>
    <input type="email" class="form-control" name="email"  value="<?php echo $iklan['email']; ?>" style="width: 540px;">
</div>
<div class="form-group">
  	<label>Link Iklan</label>
  	<input type="text" name="link" class="form-control"  value="<?php echo $iklan['link']; ?>" style="width: 540px;">

</div>
<button class="btn btn-info" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah'])) 
{
	$nm_perusahaan=$_POST['nm_perusahaan'];
	$isi_iklan=$_POST['isi_iklan'];
	$email=$_POST['email'];
	if ($_POST['tgl_mulai']=="" AND $_POST['tgl_akhir']=="")
	{
		$tgl_mulai= $iklan['tgl_mulai'];
		$tgl_akhir= $iklan['tgl_akhir'];
		$hargasewa=$iklan['hargasewa'];
	}
	else
	{
		
		$tgl_mulai=$_POST['tgl_mulai'];
		$tgl_akhir=$_POST['tgl_akhir'];
		$hargasewa=$_POST['hargasewa'];
	}
	// $tgl_mulai=$_POST['tgl_mulai'];
	// $tgl_akhir=$_POST['tgl_akhir'];
	// $hargasewa=$_POST['hargasewa'];
	
	$link=$_POST['link'];
	$gambar=$_FILES['gambar']['name'];
    $lokasi=$_FILES['gambar']['tmp_name'];
    $lamasewa=jangkawaktu($tgl_mulai,$tgl_akhir);
	$totalharga=$lamasewa*$hargasewa;

	if (!empty($lokasi)) 
    {
        move_uploaded_file($lokasi, "../gambar/".$gambar);
        $update=$koneksi->query("UPDATE  iklan set nm_perusahaan='$nm_perusahaan', isi_iklan='$isi_iklan',gambar='$gambar',tgl_mulai='$tgl_mulai',tgl_akhir='$tgl_akhir', id_admin='$id_admin' ,hargasewa='$hargasewa', lamasewa='$lamasewa', totalharga='$totalharga', aktif=1, email='$email', link='$link' WHERE id_iklan='$id_iklan'") or die(mysqli_error($koneksi));

        if ($update) 
        {
            echo "<script>alert('Data sukses terupdate');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=iklan'>";    
        }
        else
        {
            echo "<script>alert('Data gagal di update');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=editiklan'>";  
        }
    }
    else
    {
        $update=$koneksi->query("UPDATE  iklan set nm_perusahaan='$nm_perusahaan', isi_iklan='$isi_iklan',tgl_mulai='$tgl_mulai',tgl_akhir='$tgl_akhir', id_admin='$id_admin' ,hargasewa='$hargasewa', lamasewa='$lamasewa', totalharga='$totalharga', aktif=1, email='$email', link='$link' WHERE id_iklan='$id_iklan'") or die(mysqli_error($koneksi));

        
        if ($update) 
        {
            echo "<script>alert('Data sukses terupdate');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=iklan'>";    
        }
        else
        {
            echo "<script>alert('Data gagal di update');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=editiklan'>";  
        }
    }

    

}
 ?>