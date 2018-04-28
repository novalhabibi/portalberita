<?php 
// memanggil koneksi
 //include "pengaturan/koneksi.php";

//fungsi untuk mengambil/ id admin untuk dirubah nilainya ke dalam bentuk nama
function nama($parameter){

	include "pengaturan/koneksi.php";
	$data1=$koneksi->query("SELECT nama_lengkap FROM admin WHERE id_admin='$parameter'");
	$data=array();
	//$admin=mysqli_fetch_array($data[]);
	while($data[]=$data1->fetch_assoc());

	return $data[0]['nama_lengkap']; //ini sama saja dengan mengetik $data[nama_lengkap]
}

// fungsi mengacak angga
function random()
{
echo rand(0,99);// menampilkan 1 angka acak dari 0 sampai 999
}


// fungsi untuk memberikan Pesan Kotak atau MsgBox
function msgbox($msg,$url){
	echo "<script>windows.alert('$msg'); windows.location=('$url');</script>";
}

// fungsi untuk nge direction
function rdir($url){
	header("location:$url");
}


//fungsi untuk menampilkan status
function status($parameter){
	if ($parameter) 
	{
		$status="<div class='alert alert-success'>Aktif</div>";
	}
	else
	{
		$status="<div class='alert alert-danger'>Tidak Aktif</div>";
	}

	return $status;
}

//membuat angka menjadi format rupiah
function rupiah($parameter){
	$rupiah="IDR ".number_format($parameter,0,',','.');
return $rupiah;
}


//fungsi selisih waktu
function selisihwaktu($waktupembuatan){//memasukan parameter waktupembuatan
	$waktusekarang=date("Y-m-d H:i:s");

	$datetime1= new DateTime($waktusekarang); //penggunaan class Datetime yg sudah ada di php
	$datetime2= new Datetime($waktupembuatan);
	$interval=$datetime1->diff($datetime2);
	$selisih=$interval->format('%R%a');
	return $selisih;// mengubha nilai parameter menjadi nilai selisih

}


// merubah waktu ke dalam format Indonesia
function tgl_ina($parameter){ //ini untuk mengubah format 2015-06-15 ke dalam format 15 Juni 2015
	$thn=substr($parameter, 0,4) ;//ini untuk mengubah format 2015-06-15 ke dalam format 15 Juni 2015
	$b=substr($parameter, 5,2);//mengambil 2 digit, index 5 adalah angka 0 dari 06
	$tgl=substr($parameter,-2);//mengambil 2 digit dari kanan

	if ($b==1) {
		$bln="Januari";
	}
	elseif ($b==2) {
		$bln="Februari";
	}
	elseif ($b==3) {
		$bln="Maret";
	}
	elseif ($b==4) {
		$bln="April";
	}
	elseif ($b==5) {
		$bln="Mei";
	}
	elseif ($b==6) {
		$bln="Juni";
	}
	elseif ($b==7) {
		$bln="Juli";
	}
	elseif ($b==8) {
		$bln="Agustus";
	}
	elseif ($b==9) {
		$bln="September";
	}
	elseif ($b==10) {
		$bln="Oktober";
	}
	elseif ($b==11) {
		$bln="November";
	}
	elseif ($b==12) {
		$bln="Desember";
	}
$tanggal=$tgl." ".$bln." ".$thn;

return $tanggal;
}

// function mengubah format
function tgl_ina2($parameter1){ //ini untuk mengubah format 2015-06-15 17:00:00 ke dalam format 15/06/2015
$parameter2=substr($parameter1,0,10);//10 digit dari kiri,ini untuk peroleh nilai 2015-06-15 dari nilai 2015-06-15 17:00:00
$parameter3=substr($parameter1,-8);  //10 digit dari kanan,ini untuk peroleh 17:00:00 dari nilai  2015-06-15 17:00:00

$thn=substr($parameter2,2,2); //menngambil 2 digit dari kiri, 2 adalah index ketiga dari tahun (angka 1 dari 2015), 2 banyaknya digit yg diambil
$bln=substr($parameter2,5,2);
$tgl=substr($parameter2,-2); //mengambil 2 digit dari kanan

$tanggal=$tgl. "/".$bln."/".$thn;
$jam=$parameter3;
$waktu=$tanggal." .:::. ".$jam;

return $waktu;
}



// copy-paste-edit dari yg atas, kegunaaan dari function ini adalah untuk penyusunan laporan
function tgl_ina3($parameter){ //ini untuk mengubah format 2015-06-15 17:00:00 ke dalam format 15/06/2015

$thn=substr($parameter,2,2); //menngambil 2 digit dari kiri, 2 adalah index ketiga dari tahun (angka 1 dari 2015), 2 banyaknya digit yg diambil
$bln=substr($parameter,5,2);
$tgl=substr($parameter,-2); //mengambil 2 digit dari kanan

$tanggal=$tgl. "/".$bln."/".$thn;

$waktu=$tanggal;

return $waktu;
}


// fungsi hari
//mengubah hari bahasa inggiris ke dalam bahasa indonesia
function hari_ina($day){
	if ($day=="Monday") {
		$hari="Senin";
	}
	elseif ($day=="Tuesday") {
		$hari="Selasa";
	}
	elseif ($day=="Wednesday") {
		$hari="Rabu";
	}
	elseif ($day=="Thursday") {
		$hari="Kamis";
	}
	elseif ($day=="Friday") {
		$hari="Jumat";
	}
	elseif ($day=="Saturday") {
		$hari="Sabtu";
	}
	elseif ($day=="Sunday") {
		$hari="Minggu";
	}

	return $hari;
}


// fugsi jangka waktu
 function jangkawaktu($waktu1,$waktu2)
{
	$start_date= new DateTime($waktu1);
	$end_date=new DateTime($waktu2);
	$interval=$start_date->diff($end_date);
	$selisih=$interval->d;
	$jangkawaktu=$selisih+1; // ditambah 1 karena yg dihitung bukan selisih hari,
	//tapi jangka waktu, dari tgl 11 sampai 13 adalah 3 hari.
	//bukan 13-11= 2 hari
	return $jangkawaktu;
}
?>