<?php 
if (isset($_GET['tampilan'])) 
{
	$tampilan=$_GET['tampilan'];
}
else
{
	$tampilan="";
}

switch ($tampilan) {
	case 'berita':
		include "tampilan/berita.php";
		break;
	case 'kategori':
		include "tampilan/kategori.php";
		break;
	case 'tambahkategori':
		include "tampilan/tambahkategori.php";
		break;
	case 'editkategori':
		include 'tampilan/editkategori.php';
		break;
	case 'anggota':
		include "tampilan/anggota.php";
		break;
	case 'tambahanggota':
		include "tampilan/tambahanggota.php";
		break;
	case 'editanggota':
		include 'tampilan/editanggota.php';
		break;
	case 'iklan':
		include "tampilan/iklan.php";
		break;
	case 'detailiklan':
		include 'tampilan/detailiklan.php';
		break;
	case 'tambahiklan':
		include "tampilan/tambahiklan.php";
		break;
	case 'editiklan':
		include 'tampilan/editiklan.php';
		break;
	case 'berita':
		include "tampilan/berita.php";
		break;
	case 'detailberita':
		include 'tampilan/detailberita.php';
		break;
	case 'tambahberita':
		include "tampilan/tambahberita.php";
		break;
	case 'editberita':
		include 'tampilan/editberita.php';
		break;
	default: // default halaman yang tampil
		include 'tampilan/home.php';
		break;
}

 ?>