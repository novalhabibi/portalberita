<?php 
session_start();
include "pengaturan/koneksi.php";
include "pengaturan/waktu.php";
include "fungsi/fungsi.php";
 ?>



<!DOCTYPE html>
<html lang="en">

<head>	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Berita Aja</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">    
</head>

<body>

    <!-- Menu Atas -->    
    <?php 
    include "tampilan/menuatas.php";
     ?>
<!-- End Menu Atas -->


<!-- Page Content -->
<div class="container">

  <div class="row">	
            <!-- Menu Kiri col-md-4 -->                    		
      <div class="col-md-3">
				<!-- Pencarian-->
				<div class="panel panel-default">
					<!--div class="panel-heading">Pencarian</div-->
				  <div class="panel-body">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pencarian">
						<span class="input-group-btn">
							<button class="btn btn-success" type="button"><i class="glyphicon glyphicon-search"></i></button>
						</span>
					</div>
				  </div>
				</div>
				<!-- end Pencarian-->

               
                <?php 
                //cek login
                if (isset($_SESSION['login'])) 
                {
                ?>
                 <!-- Menu Akun -->
                <div class="panel panel-danger">
                  <div class="panel-heading">Akun anda <strong><?php echo $_SESSION['nama_lengkap']; ?> <a href="index.php?tampilan=akun&id_anggota=<?php echo $_SESSION['id_anggota']; ?> "><i class="glyphicon glyphicon-cog"></i></a> </strong></div>
                  <div class="panel-body">
                    Panel content
                    <a href="perintah/logout.php">Logout</a>
                  </div>
                </div>
                <!-- End Menu Akun -->

                <?php 
                }
                //jika belom login
                else
                {
                ?>
                <!-- Menu Login -->
                <div class="panel panel-primary">
                  <div class="panel-heading">Menu Login</div>
                  <div class="panel-body">
                    <form action="perintah/login.php" method="POST">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <button type="submit" class="btn btn-success">Login</button>
                          <a href="index.php?tampilan=fromdaftaranggota" class="btn btn-primary">Daftar Anggota</a>
                    </form>

<!-- Simpan Anggota -->

<!-- Simpan Anggota End -->
                  </div>
                </div>
                <!-- End Menu LOgin -->
                <?php 
                } 
                ?>
                <!-- Berita Populer -->
                <div class="panel panel-primary">
                  <div class="panel-heading">Berita Populer</div>
                  <?php 
                include "tampilan/beritapopuler.php";
                 ?> 
                </div>
                <!--End Berita Populer -->
                <!-- Layanan Iklan -->
                <div class="panel panel-success">
                  <div class="panel-heading">Layanan Iklan</div>
                  <?php 
                include "tampilan/tampiliklan.php";
                 ?> 
                </div>
                <!--End Layanan Iklan -->
			</div>
			
			<!-- Isi Utama -->
            <div class="col-md-9">

                <?php 
                include "perintah/tampilkonten.php";
                 ?>  

            </div>


        </div>

    </div>
    <!-- /.container -->

    <!-- Footernya -->
	<div class="container">

        <hr>

        <!-- Footer -->
        <?php 
        include "perintah/footer.php";
         ?>
        <!-- End Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
</body>

</html>
