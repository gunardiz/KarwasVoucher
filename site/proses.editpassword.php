<?php 
include"konfigurasi.php";
include "fungsi_seo.php";
	
# Baca variabel Form (If Register Global ON)
$old_password	= $_REQUEST['old_password'];
$password  		= $_REQUEST['repassword'];
$id_user		 = $_REQUEST['id_user'];

$cekku=mysql_query("SELECT * FROM user WHERE id_user='$id_user' AND password='$old_password'");
$cek=mysql_num_rows($cekku);
if($cek>0){
			$sql="UPDATE user SET password='$password' WHERE id_user='$id_user'";
			$hasil=mysql_query($sql, $koneksi);
			if($hasil){echo "<script language='JavaScript'>alert('Ubah password berhasil.');history.go(-1)</script>";}
			else{echo "<script language='JavaScript'>alert('Ubah password gagal.'); history.go(-1) </script>";}
		   	}

else{echo "<script language='JavaScript'>alert('Ubah password gagal.'); history.go(-1) </script>"; }
?>