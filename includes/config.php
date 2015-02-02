<?
/*---------------------------------------------------------------------------------
	konfigurasi database
---------------------------------------------------------------------------------*/
define('DEVEL_MEDIA', true);

$mysql_user = 'root';
$mysql_password = '';
$mysql_database = 'karwas';
$mysql_host = 'localhost';



/*if (file_exists('includes/fungsi.php')){
	include 'includes/fungsi.php';
}*/

if (substr(phpversion(),0,3) >= 5.1) {
date_default_timezone_set('Asia/Jakarta');
}

$tgl_sekarang = date("Ymd");
$tgl_skrg     = date("d");
$bln_sekarang = date("m");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

mysql_connect($mysql_host,$mysql_user,$mysql_password)or die ('Database Gagal Koneksi');
mysql_select_db($mysql_database);

