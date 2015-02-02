<?php error_reporting(0); 
 	$db_host    = 'localhost';
	$db_user    = 'root';
	$db_pass    = '';
	$db_data   	= 'karwas';	

	$cookie_nama = $_COOKIE['user_id'];
	//session_start();
		//require_once 'fungsi.php';
	$koneksi = mysql_connect($db_host, $db_user, $db_pass)
				or die ("Koneksi gagal".mysql_error());
	mysql_select_db($db_data, $koneksi) 
		or die ("Baca DB gagal".mysql_error());
?>
