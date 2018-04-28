<?php 
include '../pengaturan/koneksi.php';

if (isset($_GET['aksi'])=='hapus' AND isset($_GET['id_kategori'])) 
{
    $hapus=$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id_kategori]' ");
    if ($hapus) 
    {
        echo "<script type='text/javascript'>
            alert('Data telah dihapus');
            document.location='index.php?tampilan=kategori';
             </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Data gagal dihapus');
            document.location='index.php?tampilan=kategori';
             </script>";
    }
   
}


 ?>
<h3>Ini Data Kategori</h3>
<div class="table-responsive">
  <table class="table  table-bordered">
    <tr>
    	<th class="col-md-1">No</th>
    	<th>Nama Kategori</th>
    	<th class="col-md-2">Aksi</th>
    </tr>
    
    	<?php 
    	$no=1;
    	$data=$koneksi->query("SELECT*FROM kategori");
    	while($kategori=$data->fetch_assoc()) 
    	{
    	?>
    	<tr>
	    	<td><?php echo $no; ?></td>
	    	<td><?php echo $kategori['kategori'];  ?></td>
	    	<td>
	    		<a href="index.php?tampilan=editkategori&id_kategori=<?php echo $kategori['id_kategori'] ?>" class="btn btn-success btn-sm">Edit</a>
	    		<a href="index.php?tampilan=kategori&aksi=hapus&id_kategori=<?php echo $kategori['id_kategori'] ?>" class="btn btn-danger btn-sm" onCLick="return confirm('Anda yakin mau hapus data ini ?')">Hapus</a>
	    	</td>
	    </tr>
    	<?php 
    	$no++;
    	}
    	 ?>
    

  </table>
</div>
	<a href="index.php?tampilan=tambahkategori" class="btn btn-primary btn-sm">Tambah Kategori</a>
