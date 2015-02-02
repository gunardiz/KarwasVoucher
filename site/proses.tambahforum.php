<?php 

include"konfigurasi.php";
include "fungsi_seo.php";


# Baca variabel Form (If Register Global ON)
$id_user 	= $_REQUEST['id_user'];
$isi_forum 		= $_REQUEST['isi_forum'];

	$sql = "INSERT INTO forum SET 
			id_user='$id_user',
			isi_forum='$isi_forum',
			tgl_input=CURDATE()";
		
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  
	header("Location:  index.php?index=forum");

	$pesan= "Data berhasil disimpan";
?>
