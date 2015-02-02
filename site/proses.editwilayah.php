<?php 

include "../login/konfigurasi.php";
	
# Baca variabel Form (If Register Global ON)
$nm_wilayah	= $_REQUEST['nm_wilayah'];
$id_wilayah 	= $_REQUEST['id_wilayah'];


	$sql = "UPDATE wilayah SET 			
			nm_wilayah			= '$nm_wilayah'
			WHERE id_wilayah 	= '$id_wilayah'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
    header("Location: index.php?index=wilayah");
	echo "Data berhasil diubah";
	include "index.php";
?>
