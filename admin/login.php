<?php 
include "../pengaturan/koneksi.php";
$username=$_POST['username'];
$password=md5($_POST['password']);

$data=$koneksi->query("SELECT *FROM admin WHERE username='$username' AND password='$password'");
$jumlahdata=$data->num_rows;
$admin=$data->fetch_assoc();

if ($jumlahdata > 0) 
{
	session_start();
	$_SESSION['id_admin']=$admin['id_admin'];
	$_SESSION['nama_lengkap']=$admin['nama_lengkap'];
	


?>

 <script type="text/javascript">
 	alert("Selamat Datang, Saudara/i <?php echo $admin['nama_lengkap']; ?> ");
 	document.location="./";
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
