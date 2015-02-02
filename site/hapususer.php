<?php  
include "../login/konfigurasi.php";


# Baca variabel URL (If Register Global ON)
$idhapus = $_GET['idhapus'];
	
$sql = "DELETE FROM user WHERE id_user='$idhapus'";
mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
	  
	  header("Location: index.php?index=data_user");

echo "Data berhasil dihapus";
include "usertampil.php";
?>
