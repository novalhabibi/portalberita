<?php 
include '../pengaturan/koneksi.php';
include 'tampilan/fungsi.php';

if (isset($_GET['aksi'])=='hapus' AND isset($_GET['id_iklan'])) 
{
    $data=$koneksi->query("SELECT *FROM iklan WHERE id_iklan='$_GET[id_iklan]' ");
    $iklan=$data->fetch_assoc();
    $foto_iklan=$iklan['gambar'];
     if (file_exists("../gambar/$foto_iklan")) 
    {
        unlink("../gambar/$foto_iklan");
    }
    $hapus=$koneksi->query("DELETE FROM iklan WHERE id_iklan='$_GET[id_iklan]' ");
    if ($hapus) 
    {
        echo "<script type='text/javascript'>
            alert('Data telah dihapus');
            document.location='index.php?tampilan=iklan';
             </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Data gagal dihapus');
            document.location='index.php?tampilan=iklan';
             </script>";
    }
   
}


 ?>
<h3>Ini Data iklan</h3>
<div class="table-responsive">
  <table class="table  table-bordered">
    <tr>
    	<th class="col-md-1">No</th>
        <th>Nama Perusahaan</th>
        <th>Gambar</th>
        <th>Tgl Mulai </th>
        <th>Tgl Akhir </th>
        <th>Total Harga </th>
        <th>Email iklan</th>
    	<th>Status iklan</th>
    	<th class="col-md-3">Aksi</th>
    </tr>
    
    	<?php 
    	$no=1;
        $total=0;
    	$data=$koneksi->query("SELECT*FROM iklan");
    	while($iklan=$data->fetch_assoc()) 
    	{
    	?>
    	<tr>
	    	<td><?php echo $no; ?></td>
            <td><?php echo $iklan['nm_perusahaan'];  ?></td>
            <td><img src="../gambar/<?php echo $iklan['gambar'];  ?>" width="75px"></td>
            <td><?php echo tgl_ina3($iklan['tgl_mulai']); ?></td>
            <td><?php echo tgl_ina3($iklan['tgl_mulai']); ?></td>
            <td><?php echo rupiah($iklan['totalharga']); ?></td>
            <td><?php echo $iklan['email'];  ?></td>
            <!-- merubah status di database menjadi string -->
	    	<td><?php
                echo status($iklan['aktif']);        
                ?>
            </td>
	    	<td>
                <a href="index.php?tampilan=detailiklan&id_iklan=<?php echo $iklan['id_iklan'] ?>" class="btn btn-info btn-sm" >Detail</a>
	    		<a href="index.php?tampilan=editiklan&id_iklan=<?php echo $iklan['id_iklan'] ?>" class="btn btn-success btn-sm">Edit</a>
	    		<a href="index.php?tampilan=iklan&aksi=hapus&id_iklan=<?php echo $iklan['id_iklan'] ?>" class="btn btn-danger btn-sm" onCLick="return confirm('Anda yakin mau hapus data ini ?')">Hapus</a>
	    	</td>
	    </tr>
    	<?php 

        $total=$total+$iklan['totalharga'];
    	$no++;
    	}
    	 ?>
    <tr>
        <tfoot>
            <tr>
                <th colspan="5">Total keuntungan dari iklan</th>
                <th><?php echo rupiah($total);   ?></th>
            </tr>
        </tfoot>
    </tr>

  </table>
</div>
	<a href="index.php?tampilan=tambahiklan" class="btn btn-primary btn-sm">Tambah iklan</a>

