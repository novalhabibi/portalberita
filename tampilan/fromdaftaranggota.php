 <form action="" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Lengkap</label>
        <input name="nama_lengkap" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-success" name="daftar">Daftar</button> 
</form>
<?php 

if (isset($_POST['daftar'])) 
{
$nama_lengkap=$_POST['nama_lengkap'];
$email=$_POST['email'];
$password=$_POST['password'];
$aktif=1;

      $simpan=$koneksi->query("INSERT INTO anggota() VALUES(null,'$nama_lengkap','$password','$email','$aktif')");

        if ($simpan) {
          echo "<script>alert('Data tersimpan');</script>";
          echo "<script>location='index.php';</script>";
        }
        else{
          echo "<script>alert('Data tersimpan');</script>";
        }


}

 ?>
