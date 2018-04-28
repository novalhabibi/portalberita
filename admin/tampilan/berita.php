<?php 
if (empty($_SESSION['id_admin'])) {
    echo "<script type='text/javascript'>
            alert('anda belum login');
            document.location='index.php';
             </script>";
}else{

include '../pengaturan/koneksi.php';

if (isset($_GET['aksi'])=='hapus' AND isset($_GET['id_berita'])) 
{
    //hapus fotot
    $data=$koneksi->query("SELECT *FROM berita WHERE id_berita='$_GET[id_berita]' ");
    $berita=$data->fetch_assoc();
    $foto_berita=$berita['gambar'];
     if (file_exists("../gambar/news/$foto_berita")) 
    {
        unlink("../gambar/news/$foto_berita");
    }
    $hapus=$koneksi->query("DELETE FROM berita WHERE id_berita='$_GET[id_berita]' ");
    if ($hapus) 
    {
        echo "<script type='text/javascript'>
            alert('Data telah dihapus');
            document.location='index.php?tampilan=berita';
             </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
            alert('Data gagal dihapus');
            document.location='index.php?tampilan=berita';
             </script>";
    }
   
}
?>

<h3>Data Berita</h3>
<div class="table-responsive">
  <table class="table  table-bordered">
    <tr>
    	<th class="col-md-1">No</th>
    	<th>Nama Berita</th>
    	<th>Kategori</th>
    	<th>Gambar</th>
    	<th>Isi Berita</th>
    	<th>Dilihat</th>
    	<th class="col-md-2">Aksi</th>
    </tr>
    <?php 
    $no=1;
    $data=$koneksi->query("SELECT *FROM berita JOIN kategori ON berita.id_kategori=kategori.id_kategori");
    while ($berita=$data->fetch_assoc()) 
    {
    ?>
    <tr>
    	<td><?php echo $no; ?></td>
    	<td><?php echo $berita['judul']; ?></td>
    	<td><?php echo $berita['kategori']; ?></td>
    	<td><img src="../gambar/news/<?php echo $berita['gambar']; ?>" width="75px"></td>
    	<td><?php echo substr($berita['teks_berita'], 0,50); ?></td>
    	<td><?php echo $berita['dilihat']." Kali"; ?></td>
    	<td><a href="index.php?tampilan=editberita&id_berita=<?php echo $berita['id_berita'] ?>" class="btn btn-primary btn-sm">Edit</a>
    		<a href="index.php?tampilan=berita&aksi=hapus&id_berita=<?php echo $berita['id_berita'] ?>" class="btn btn-danger btn-sm" onCLick="return confirm('Anda yakin mau hapus data ini ?')">Hapus</a>
	    </td>
    </tr>
    <?php 
    $no++;	# code...
    }
    ?>
  </table>
</div>
<a href="index.php?tampilan=tambahberita" class="btn btn-primary btn-sm">Tambah Berita</a>
<?php } ?>