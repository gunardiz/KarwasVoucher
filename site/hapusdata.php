<?php  
include "konfigurasi.php";

# Baca variabel URL (If Register Global ON)
$idhapus = $_GET['idhapus'];
$fupload_name1 = $_GET['file1'];
$fupload_name2 = $_GET['file2'];
$vdir_upload1  = "../file/dokumen/";
$vdir_upload2  = "../file/bukti_transfer/";

unlink($vdir_upload1 . $fupload_name1); 
unlink($vdir_upload2 . $fupload_name2); 
		  
$sql = "DELETE FROM data WHERE id_dokumen='$idhapus'";
		mysql_query($sql, $koneksi) 
		or die ("SQL Error".mysql_error());

	  	header("Location:  index.php?index=data");

		echo "Data berhasil dihapus";
		include " index.php?index=data";
?>