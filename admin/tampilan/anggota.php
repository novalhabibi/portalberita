<?php 
//
if (empty($_SESSION['id_admin'])) {
    echo "<script type='text/javascript'>
            alert('anda belum login');
            document.location='index.php';
             </script>";
}else{
include '../pengaturan/koneksi.php';

if (isset($_GET['aksi'])=='hapus' AND isset($_GET['id_anggota'])) 
{
    $hapus=$koneksi->query("DELETE FROM anggota WHERE id_anggota='$_GET[id_anggota]' ");
    if ($hapus) 
    {
        echo "<script type='text/javascript'>
            alert('Data telah dihapus');
            document.location='index.php?tampilan=anggota';
             </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Data gagal dihapus');
            document.location='index.php?tampilan=anggota';
             </script>";
    }
   
}


 ?>
<h3>Ini Data anggota</h3>
<div class="table-responsive">
  <table class="table  table-bordered">
    <tr>
    	<th class="col-md-1">No</th>
        <th>Nama anggota</th>
        <th>Email anggota</th>
    	<th>Status anggota</th>
    	<th class="col-md-2">Aksi</th>
    </tr>
    
    	<?php 
    	$no=1;
    	$data=$koneksi->query("SELECT*FROM anggota");
    	while($anggota=$data->fetch_assoc()) 
    	{
    	?>
    	<tr>
	    	<td><?php echo $no; ?></td>
            <td><?php echo $anggota['nama_lengkap'];  ?></td>
            <td><?php echo $anggota['email'];  ?></td>
            <!-- merubah status di database menjadi string -->
	    	<td><?php
                    if ($anggota['aktif']==1) 
                    {
                        echo "Aktif";
                    }else
                    {
                     echo "Tidak aktif";
                    }
                    ?>
                    </td>
	    	<td>
	    		<a href="index.php?tampilan=editanggota&id_anggota=<?php echo $anggota['id_anggota'] ?>" class="btn btn-success btn-sm">Edit</a>
	    		<a href="index.php?tampilan=anggota&aksi=hapus&id_anggota=<?php echo $anggota['id_anggota'] ?>" class="btn btn-danger btn-sm">Hapus</a>
	    	</td>
	    </tr>
    	<?php 
    	$no++;
    	}
    	 ?>
    

  </table>
</div>
	<a href="index.php?tampilan=tambahanggota" class="btn btn-primary btn-sm">Tambah anggota</a>
