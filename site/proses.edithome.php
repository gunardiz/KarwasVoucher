<?php 

include "../login/konfigurasi.php";
	
# Baca variabel Form (If Register Global ON)
$id_home	= $_REQUEST['id_home'];
$konten	 = $_REQUEST['konten'];

	$sql = "UPDATE home SET 			
			konten			= '$konten'
			WHERE id_home 	='$id_home'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
    header("Location: index.php?index=home");
	echo "Data berhasil diubah";
	include "index.php";
?>
