<?php  
include "konfigurasi.php";

# Baca variabel URL (If Register Global ON)
$idubah = $_REQUEST['idubah'];

	$sql = "UPDATE user SET status='inaktif' WHERE id_user='$idubah'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

		  
	  header("Location:  index.php?index=data_user");

echo "Anggota di nonaktifkan";
include "index.php";
?>