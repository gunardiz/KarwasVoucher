<?php 
include "../login/konfigurasi.php";

# Baca variabel Form (If Register Global ON)
$nm_wilayah	= $_REQUEST['nm_wilayah'];

	$sql = "INSERT INTO wilayah SET 
			nm_wilayah	= '$nm_wilayah'";
			
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	
header("Location: index.php?index=wilayah");

	$pesan= "Data berhasil disimpan";
		echo "Data berhasil diubah";
	include "index.php";

		
	
?>
