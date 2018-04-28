<h1>Pasang Iklan disini</h1><hr>
<?php  
 $id_anggota=$_SESSION['id_anggota'];
//include "../pengaturan/koneksi.php";
include 'pengaturan/waktu.php';
// include 'fungsi/fungsi.php';
?>
<h3>Tambah Iklan</h3>

<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
  	<label>Nama Perusahaan Anda</label>
    <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" >
    <input type="text" name="nm_perusahaan" class="form-control" style="width: 540px;">
</div>
<div class="form-group">
  	<label>Isi Iklan Anda</label>
    <textarea type="text" name="isi_iklan" class="form-control" ></textarea>
</div>
<div class="form-group">
	<label>Gambar Iklan Anda</label>
  	<input type="file" name="gambar" class="form-group">
  	<p class="help-block">
	<small>Catatan :</small> <br>
	<small>- Pastikan file yang diupload bertipe *.JPG atau *.PNG</small> <br>
	<small>- Ukuran file foto max 1 Mb</small><br>
	<small style="color:red;">- Harga Pemasangan iklan 100.000 per Hari berlaku kelipatan</small>
	</p>
</div>
<table class="table table-bordered">
	
	<tr>
		<th width="120"><label>Tanggal Mulai</label></th>
		<th width="120"><label>Tanggal Akhir</label></th>
		<th ><label>Harga Sewa</label></th>
		
	</tr>
	<tr>
		<td><input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control"   style="width: 140px; color:green;"></td>
		<td><input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control"   style="width: 140px; color:red;" onchange="tampilkan_nilai_p()"> 
		</td>
		<td>
		<?php 
		// menghitung harga iklan
		$tgl_mulai=$_POST['tgl_mulai'];
		$tgl_akhir=$_POST['tgl_akhir'];
		$datetime1= new DateTime($tgl_mulai); //penggunaan class Datetime yg sudah ada di php
		$datetime2= new Datetime($tgl_mulai);
		$interval=$datetime1->diff($datetime2);
		$selisih=$interval->format('%R%a');
		$selisih=3;

		 ?>
		<div id="hasil"></div>
			<script>		
				// membuat function tampilkan_nama
				function tampilkan_nilai_p() {
				    var tgl_akhir=document.getElementById("tgl_akhir").innerHTML;
				    document.getElementById("hasil").innerHTML=tgl_mulai;
				}
				function tampilkan_nama(){
					document.getElementById("hasil").innerHTML = parseChr('tgl_mulai');
				}
				
			</script>
		<input type="text" name="hargasewa" class="form-control"   style="width: 150px;" disabled>
		</td>
		
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
<div style="padding-top:20px; ">



</div>

<!-- <h3>Kirimkan iklan yang ingin anda pasang ke <a href="mailto:noval7sihabibi@gmail.com">noval7sihabibi@gmail.com</a> </h3> -->