<?php  
include "../login/konfigurasi.php";


# Baca variabel URL (If Register Global ON)
$idhapus = $_GET['idhapus'];
	
$sql = "DELETE FROM wilayah WHERE id_wilayah='$idhapus'";
mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
	  
	  header("Location: index.php?index=wilayah");

echo "Data berhasil dihapus";
include "usertampil.php";
?>
