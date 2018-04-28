<?php 
include "../pengaturan/koneksi.php";
//hiutng jumlah berita
$berita=$koneksi->query("SELECT *FROM berita");
$jmlberita=$berita->num_rows;

//hiutng jumlah anggota
$anggota=$koneksi->query("SELECT *FROM anggota");
$jmlanggota=$anggota->num_rows;

//hiutng jumlah iklan
$iklan=$koneksi->query("SELECT *FROM iklan");
$jmliklan=$iklan->num_rows;

//hiutng jumlah kategori
$kategori=$koneksi->query("SELECT *FROM kategori");
$jmlkategori=$kategori->num_rows;

//hiutng jumlah komentar
$komentar=$koneksi->query("SELECT *FROM komentar");
$jmlkomentar=$komentar->num_rows;
?>

<div class="col-md-3">			
                <?php 
                //cek login
                if (isset($_SESSION['id_admin'])) 
                {
                ?>
                 <!-- Menu Akun -->
                <div class="panel panel-danger">
                  <div class="panel-heading">Akun anda <strong><?php echo $_SESSION['nama_lengkap']; ?> <a href="index.php?tampilan=akun&id_anggota=<?php echo $_SESSION['id_anggota']; ?> "><i class="glyphicon glyphicon-cog"></i></a> </strong></div>
                  <div class="panel-body">
                    Panel content
                    <a href="logout.php">Logout</a>
                  </div>
                </div>
                <!-- End Menu Akun -->
                <!-- menu Utama -->
                <div class="panel panel-primary">
                  <div class="panel-heading">Menu Utama</div>
                    <ul class="list-group">
                      <a href="index.php?tampilan=berita" class="list-group-item"><span class="badge"><?php echo $jmlberita; ?></span>
                        Berita
                      </a>
                      <a href="index.php?tampilan=anggota" class="list-group-item"><span class="badge"><?php echo $jmlanggota; ?></span>Anggota</a>
                      <a href="index.php?tampilan=iklan" class="list-group-item"><span class="badge"><?php echo $jmliklan; ?></span>Iklan</a>
                      <a href="index.php?tampilan=kategori" class="list-group-item"><span class="badge"><?php echo $jmlkategori; ?></span>Kategori</a>
                      <a href="index.php?tampilan=komentar" class="list-group-item"><span class="badge"><?php echo $jmlkomentar; ?></span>Komentar</a>
                    </ul>
                </div>
                <!-- End Menu Utama -->
                <?php 
                }
                //jika belom login
                else
                {
                ?>
                <!-- Menu Login -->
                <div class="panel panel-primary">
                  <div class="panel-heading">Menu LoginAdministrator</div>
                  <div class="panel-body">
                    <form action="login.php" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter username" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                          </div>
                          <button type="submit" class="btn btn-success">Login</button>
                    </form>
                  </div>
                </div>
                <!-- End Menu LOgin -->
                <?php 
                } 
                ?>


</div>