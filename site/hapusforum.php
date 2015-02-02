<?php  
include "konfigurasi.php";


# Baca variabel URL (If Register Global ON)
$idhapus 	= $_GET['idhapus'];

unlink($vdir_upload . $fupload_name);	
$sql = "DELETE FROM forum WHERE id_forum='$idhapus'";
		mysql_query($sql, $koneksi) 
		or die ("SQL Error".mysql_error());
	  	header("Location:  index.php?index=forum");

		echo "Data berhasil dihapus";
		include " index.php?index=forum";

?>
