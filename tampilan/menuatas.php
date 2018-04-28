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
                <a class="" href="index.php"><img src="gambar/hiro_mkuning.png" style="width: 100px; height:50px;" ></a>
            </div>
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php?tampilan=home">Beranda</a>
                    </li>
					<li class="dropdown">
					  <a href="" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
						Berita
						<span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
						<?php 
                        $data=$koneksi->query("SELECT *FROM kategori");
                        while($kat=$data->fetch_assoc())
                        {


                         ?>

                        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?tampilan=kategori&id_kategori=<?php echo  $kat['id_kategori'];?>&kategori=<?php echo $kat['kategori'];?>"><?php echo strtoupper($kat['kategori']); ?></a></li>
						<?php 

                        } ?>


					  </ul>
					</li>					
                    <li>
                        <a href="index.php?tampilan=layananiklan">Layanan Iklan</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <?php 
                    if (isset($_SESSION['login'])) 
                    {
                     ?>
                    <li>
                        <a href="perintah/logout.php">Logout</a>
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
