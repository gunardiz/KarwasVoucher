<?php 

include "../login/konfigurasi.php";


# Baca variabel Form (If Register Global ON)
$username	= $_REQUEST['username'];
$password 	= $_REQUEST['password'];
$nm_lengkap  = $_REQUEST['nm_lengkap'];
$nip		 = $_REQUEST['nip'];
$jabatan	 = $_REQUEST['jabatan'];
$status	  = $_REQUEST['status'];
$id_user 	 = $_REQUEST['id_user'];
$role 		= $_REQUEST['role'];
$pangkat 	 = $_REQUEST['pangkat'];

	$sql = "INSERT INTO user SET 
			username	= '$username',
			nm_lengkap	= '$nm_lengkap',
			pangkat		= '$pangkat',
			password	= '$username',
			jabatan		= '$jabatan',
			status		= 'aktif',
			role		= '$role',
			nip			= '$nip'";
			
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	
header("Location: index.php?index=data_user");

	$pesan= "Data berhasil disimpan";
		echo "Data berhasil diubah";
	include "index.php";

		
	
?>
