<?php 
$id_berita=$_GET['id_berita'];

$data=$koneksi->query("SELECT *FROM berita WHERE id_berita='$id_berita' ");
$berita=$data->fetch_assoc();
 ?>
<h3>Edit Berita</h3>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Judul Berita</label>
    <input type="text" class="form-control" name="judul" id="exampleInputEmail1" value="<?php echo $berita['judul'] ?>" style="width: 540px;">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Isi Berita</label>
    <select name="id_kategori" id="" class="form-control" style="width: 240px;">
    	 <?php 
                $data=$koneksi->query("SELECT *from kategori");
                while($kat=$data->fetch_assoc()){
                if ($kat['id_kategori']==$berita['id_kategori']) 
                {
                    echo "<option value='$kat[id_kategori]' selected='selected'>$kat[kategori]</option>";
                }
                else
                {
                  echo "<option value='$kat[id_kategori]'>$kat[kategori]</option>";
                }
                }
            
        ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Gambar Berita</label>
    <img src="../gambar/news/<?php echo $berita['gambar']; ?>" width="200px" class="img-thumbnail">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Ganti Gambar Berita</label>
    <input type="file" name="gambar" id="exampleInputFile">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Teks Berita</label>

    <textarea name="teks_berita" class="ckeditor" id="ckeditor"><?php echo $berita['teks_berita'] ?></textarea>
  
  </div>
  <button type="submit" class="btn btn-info" name="ubah" value="ubah">Ubah</button>
</form>
<?php 

//untuk mensimoan Editjudul
if (isset($_POST['ubah'])) 
{
    $judul=$_POST['judul'];
    $id_kategori=$_POST['id_kategori'];
    $teks_berita=$_POST['teks_berita'];
    $gambar=$_FILES['gambar']['name'];
    $lokasi=$_FILES['gambar']['tmp_name'];
$id_admin=$_SESSION['id_admin'];
$tgl_posting=date('Y-m-d');
    if (!empty($lokasi)) 
    {
        move_uploaded_file($lokasi, "../gambar/news/".$gambar);
        $update=$koneksi->query("UPDATE  berita set judul='$judul', id_kategori='$id_kategori', gambar='$gambar',teks_berita='$teks_berita',tgl_posting='$tgl_posting',id_admin='$id_admin' WHERE id_berita='$_GET[id_berita]'") or die(mysqli_error($koneksi));

        
        if ($update) 
        {
            echo "<script>alert('Data sukses terupdate');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=berita'>";    
        }
        else
        {
            echo "<script>alert('Data gagal di update');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=editberita'>";  
        }
    }
    else
    {
        $update=$koneksi->query("UPDATE  berita set judul='$judul', id_kategori='$id_kategori',teks_berita='$teks_berita',tgl_posting='$tgl_posting',id_admin='$id_admin' WHERE id_berita='$_GET[id_berita]'") or die(mysqli_error($koneksi));

        
        if ($update) 
        {
            echo "<script>alert('Data sukses terupdate');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=berita'>";    
        }
        else
        {
            echo "<script>alert('Data gagal di update');</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php?tampilan=editberita'>";  
        }
    }

}

 ?>
<!-- end Edit produk -->
