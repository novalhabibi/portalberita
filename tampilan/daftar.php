<?php 
include "../pengaturan/koneksi.php";
include "../fungsi/fungsi.php";

$nama=$_POST['nama'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$kode1=$_POST['kode1'];
$kode2=$_POST['kode2'];

if ($kode1 == $kode2) 
{
	$simpan=$koneksi->query("INSERT INTO anggota() VALUES(null,'$nama','$password','$email',1) ");
	if ($simpan)
	{
		msgbox("Berhasil terdaftar","../");
	}
	else
	{
		msgbox("Gagal terdaftar","../index.php?tampilan=daftar");
	}
}
else
{
	msgbox("Kode berbeda","../index.php?tampilan=daftar");
}

 ?>