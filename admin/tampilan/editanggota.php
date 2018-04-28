 <?php 
include '../pengaturan/koneksi.php';

$id_anggota=$_GET['id_anggota'];
$data=$koneksi->query("SELECT * FROM anggota WHERE id_anggota='$id_anggota' ");
$anggota=$data->fetch_assoc();
//print_r($anggota);
?>
 <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Lengkap</label>
        <input name="nama_lengkap" type="text" class="form-control" value="<?php echo $anggota['nama_lengkap']; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" value="<?php echo $anggota['email']; ?>">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="text" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary" name="edit">Edit</button> 
</form>
<?php 

if (isset($_POST['edit'])) 
{
$nama_lengkap=$_POST['nama_lengkap'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$aktif=1;

$update=$koneksi->query("UPDATE anggota SET nama_lengkap='$nama_lengkap', password='$password', email='$email', aktif='$aktif' WHERE id_anggota='$id_anggota'");

if ($update) {
          echo "<script>alert('Data tersimpan');</script>";
          echo "<script>location='index.php?tampilan=anggota';</script>";
        }
        else{
          echo "<script>alert('Data Gaagal tersimpan');</script>";
        }

}

 ?>
 