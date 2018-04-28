  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php  
    $srt=$koneksi->query("SELECT * FROM berita ORDER BY tgl_posting DESC LIMIT 1");
    $gbr=$srt->fetch_assoc();
    ?>
    <div class="item active">
      <img src="gambar/news/<?php echo $gbr['gambar']; ?>" style="width: 920px; height: 400px">
      <div class="carousel-caption">
        <?php echo $gbr['judul']; ?>
      </div>
    </div>
    <?php 
    $q=$koneksi->query("SELECT * FROM berita ORDER BY tgl_posting DESC LIMIT 1,3 ");
    while ($gmb=$q->fetch_assoc()) 
    {
    ?>
    <div class="item">
      <img src="gambar/news/<?php echo $gmb['gambar']; ?>" style="width: 920px; height: 400px">
      <div class="carousel-caption">
        <?php echo $gmb['judul']; ?> gambar
      </div>
    </div>
    <?php   # code...
    } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- //Header Berita -->

<?php 
//include "../fungsi/fungsi.php";
//echo hari_ina(date('l')).", ".tgl_ina($tgl_sekarang).".::.".$jam_sekarang;
 ?>

<!-- End//Header Berita -->

<?php 
// $data=$koneksi->query("SELECT *FROM berita ORDER BY id_berita DESC limit 0,5 ");
 //$data2=$koneksi->query("SELECT *FROM berita");
// $jmlberita=$data2->num_rows;
// echo "<div class='jcarousel-wrapper'>
//    <div class='jcarousel'>
//     <ul>
//       ";//ini sebagai bingkai berita
//       while ($berita=$data->fetch_assoc()) 
//       {
//         echo "<li><h3> <a href='index.php?tampilan=detailberita&id_berita=$berita[id_berita]'>".ucwords($berita['judul'])."</h3> </a>";
//         //echo "<li><h5>".ucwords($berita['tgl_posting'])."</h5>";
//         echo "<span class='small'>".tgl_ina2($berita['tgl_posting'])."<br> Diposting oleh :".nama($berita['id_admin'])."</span>";

//         if (empty($berita['gambar'])) 
//         {
//           $gambar="nopic.png";
//         }
//         else
//         {
//           $gambar=$berita['gambar'];
//         }
//         echo "<div><img src='gambar/news/$gambar' width='300px' height='200px' ></div>
//         <p>$berita[teks_berita]</p>
//         <br>
//         </li>
//         ";
//         echo selisihwaktu($berita['tgl_posting']);
//       }//tutup perulangan
//       echo "</ul></div>";//tutup bingkai 1
 ?>
 
<div class="col-md-12">
   <h2>Berita Terkini</h2>
   <span class="small"><?php echo tgl_ina($tgl_sekarang).".::.".$jam_sekarang; ?></span>
   <hr>
<?php 
$data=$koneksi->query("SELECT *FROM berita ORDER BY id_berita DESC limit 0,3 ");
 $data2=$koneksi->query("SELECT *FROM berita");
$jmlberita=$data2->num_rows;
      while ($berita=$data->fetch_assoc()) 
      {
?>

 
   <h3>
     <a href="index.php?tampilan=detailberita&id_berita=<?php echo $berita['id_berita']; ?>"><?php echo $berita['judul']; ?></a>
   </h3>
   <p><i class="glyphicon glyphicon-time"> Posted on <?php echo  tgl_ina2($berita['tgl_posting']); ?></i><br>
    <i class="glyphicon glyphicon-user"> Posted by <?php echo  nama($berita['id_admin']); ?></i></p>
    <hr>
    <a href="blog-p">
      <img class="img-responsive img-hover" src="gambar/news/<?php echo $berita['gambar']; ?>
      " style="width: 800px; height: 350px">
    </a>
    <div style="padding-top:10px "> 
      <?php echo substr($berita['teks_berita'], 0,50); ?>
      <a href="index.php?tampilan=detailberita&id_berita=<?php echo $berita['id_berita']; ?>">Read More <span aria-hidden="true">&rarr;</span></a>
    </div>
    <p><i class="glyphicon glyphicon-time"> Diposting <?php echo selisihwaktu($berita['tgl_posting']); ?> Hari yang lalu</i></p>
    <hr>
 <hr>
<?php
 }//tutup perulangan
//       echo "</ul></div>";//tutup bingkai 1
 ?>
 </div><!-- tutup bingkai -->

 <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
 <a href="#" class="jcarousel-control-next">&lsaquo;</a>


 

 </div> <!-- tutup bingkai 2 -->
