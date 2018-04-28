<?php 
include "../pengaturan/koneksi.php";
$email=$_POST['email'];
$password=md5($_POST['password']);

$data=$koneksi->query("SELECT *FROM anggota WHERE email='$email' AND password='$password' AND aktif='1' ");
$jumlahdata=$data->num_rows;
$anggota=$data->fetch_assoc();

if ($jumlahdata > 0) 
{
	session_start();
	$_SESSION['id_anggota']=$anggota['id_anggota'];
	$_SESSION['nama_lengkap']=$anggota['nama_lengkap'];
	$_SESSION['email']=$anggota['email'];
	$_SESSION['login']=1;


?>

 <script type="text/javascript">
 	alert("Selamat Datang, Saudara/i <?php echo $anggota['nama_lengkap']; ?> ");
 	document.location="../";
 </script>

<?php 
}
else
{
//Msgbox Gagal login
?>
 <script type="text/javascript">
 	alert("Anda Gagl Login");
 	history.go(-1);
 </script>
 <?php 
 }
  ?>
