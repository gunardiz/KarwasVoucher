<?php 
include "../login/konfigurasi.php";
	
# Baca variabel Form (If Register Global ON)

$username   = $_REQUEST['username'];
$nip 		= $_REQUEST['nip'];
$nm_lengkap = $_REQUEST['nm_lengkap'];
$id_user	= $_REQUEST['id_user'];
$password   = $_REQUEST['password'];
$themes 	 = $_REQUEST['themes'];

	$sql = "UPDATE user SET 			
			username		= '$username',
			themes			= '$themes',
			nm_lengkap		= '$nm_lengkap',
			nip				= '$nip'
			WHERE id_user 	= '$id_user'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
    header("Location: index.php?index=profil");
	echo "Data berhasil diubah";
	include "index.php";

	
?>
