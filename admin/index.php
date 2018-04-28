<?php 
session_start();
include "../pengaturan/koneksi.php";
// include "../pengaturan/waktu.php";
// include "../fungsi/fungsi.php";
 ?>



<!DOCTYPE html>
<html lang="en">

<head>	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Berita Aja || Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/shop-homepage.css" rel="stylesheet">   
    <!-- ckeditr -->
    <!-- <link href="../ckeditor/contents.css" rel="stylesheet">  -->
</head>

<body>

       <!-- Menu Atas -->    
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="index.php"><img src="../gambar/hiro_mkuning.png" style="width: 100px; height:50px;" ></a>
            </div>
      
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php">Beranda</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php 
                    if (isset($_SESSION['login'])) 
                    {
                     ?>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <?php 
                    } 
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<!-- End Menu Atas -->



    <!-- Page Content -->
    <div class="container">

  <div class="row">	
            <!-- Menu Kiri col-md-4 -->                    		
            <?php 
            include "slidekiri.php";
            ?>
			     <!-- End Menu Kiri col-md-4 -->                        
			<!-- Isi Utama -->
            <div class="col-md-9">

                <?php 
                include "tampilkonten.php";
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
        include "../perintah/footer.php";
         ?>
        <!-- End Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


<!-- Ck editor -->
<script src="../ckeditor/ckeditor.js"></script>
<script src="../ckeditor/styles.js"></script>
</body>

</html>
