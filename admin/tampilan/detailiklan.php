<?php  
include 'tampilan/fungsi.php';
$id_iklan=$_GET['id_iklan'];
$data=$koneksi->query("SELECT *FROM iklan WHERE id_iklan='$id_iklan' ");
$iklan=$data->fetch_assoc();
?>
<h3>Detail Iklan</h3>

<form>
<div class="form-group">
  	<label>Id Iklan</label>
    <input type="text" class="form-control" value="<?php echo $id_iklan; ?>" disabled style="width: 50px;">
</div>
<div class="form-group">
  	<label>Nama Perusahaan</label>
    <input type="text" class="form-control"  value="<?php echo $iklan['nm_perusahaan']; ?>" disabled style="width: 540px;">
</div>
<div class="form-group">
  	<label>Isi Iklan</label>
    <textarea type="text" class="form-control" disabled><?php echo $iklan['isi_iklan']; ?></textarea>
</div>
<div class="form-group">
	<label>Gambar Iklan</label>
  	<img src="../gambar/<?php echo $iklan['gambar'] ?>" width="100px" class="form-control img-thumbnail" style="width: 200px; height: 100px">
</div>

<table class="table table-bordered">
	<tr>
		<th><label>Tanggal Mulai</label></th>
		<th><label>Tanggal Akhir</label></th>
		<th><label>Harga Sewa</label></th>
		<th><label>Lama Sewa</label></th>
		<th><label>Total Harga</label></th>
		<th ><label>Status</label></th>
	</tr>
	<tr>
		<td><input type="text" class="form-control"  value="<?php echo tgl_ina3($iklan['tgl_mulai']); ?>" disabled style="width: 100px; color:green;"></td>
		<td><input type="text" class="form-control"  value="<?php echo tgl_ina3($iklan['tgl_akhir']); ?>" disabled style="width: 100px; color:red;"></td>
		<td><input type="text" class="form-control"  value="<?php echo rupiah($iklan['hargasewa']); ?>" disabled style="width: 150px;"></td>
		<td align="center"><input type="text" class="form-control"  value="<?php echo $iklan['lamasewa']." Hari"; ?>" disabled style="width: 90px;"></td>
		<td><input type="text" class="form-control"  value="<?php echo rupiah($iklan['totalharga']); ?>" disabled style="width: 150px;"></td>
		<!-- merubah integr ke stirng -->
		<?php 
		if ($iklan['aktif']==1) 
		{
		$status="Aktif";
		echo "
		<td><input type='text' class='form-control'  value='$status' disabled style='width: 60px;color:blue;'></td>";
		}
		else 
		{
			$status="Non Aktif";
		echo "
		<td><input type='text' class='form-control'  value='$status' disabled style='width: 90px; color:red;'></td>";
		}
		 ?>
	</tr>
</table>
<div class="form-group" disabled>
  	<label>Email Perusahaan</label>
    <input type="email" class="form-control"  value="<?php echo $iklan['email']; ?>" style="width: 540px;">
</div>
<div class="form-group">
  	<label>Link Iklan</label>
  	<label class="form-control"  style="width: 540px;"><?php echo $iklan['link']; ?></label>
</div>
<a href="index.php?tampilan=iklan" class="btn btn-default">Kembali</a>
</form>