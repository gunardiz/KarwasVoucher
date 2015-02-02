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


	$sql = "UPDATE user SET 			
			username	= '$username',
			nm_lengkap	= '$nm_lengkap',
			pangkat		= '$pangkat',
			password	= '$password',
			jabatan		= '$jabatan',
			status		= '$status',
			role		= '$role',
			nip			= '$nip'
			WHERE id_user ='$id_user'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
    header("Location: index.php?index=data_user");
	echo "Data berhasil diubah";
	include "index.php";
?>
