<?php 
include "konfigurasi.php";
include "fungsi_upload.php";
include"../login/session.php";

# Baca variabel Form (If Register Global ON)

#PETUGAS
$tgl_s = date("dmY");
$jam_s = date("His");
$login				   = $_SESSION['role'];
$id_dokumen			  = $_REQUEST['id_dokumen'];
$tgl_diterima_petugas	= $_REQUEST['tgl_diterima_petugas'];
$unit_layanan			= $_REQUEST['unit_layanan'];
$id_wilayah			  = $_REQUEST['id_wilayah'];
$jenis_dokumen 		   = $_REQUEST['jenis_dokumen'];
$periode 				 = $_REQUEST['periode'];
$nilai_pengajuan 		 = $_REQUEST['nilai_pengajuan'];
$catatan				 = $_REQUEST['catatan'];
$name				    = $_REQUEST['name'];

#KASUBAG
$tgl_diterima_kasubag    = $_REQUEST['tgl_diterima_kasubag'];
$status1				 = $_REQUEST['status1'];

#PPK
$tgl_diterima_ppk	    = $_REQUEST['tgl_diterima_ppk'];
$status2				 = $_REQUEST['status2'];

#BENDAHARA
$tgl_diterima_bendahara  = $_REQUEST['tgl_diterima_bendahara'];
$tgl_transfer 			= $_REQUEST['tgl_transfer'];
$nilai_transfer		  = $_REQUEST['nilai_transfer'];
$tgl_drpp				= $_REQUEST['tgl_drpp'];
$no_drpp				 = $_REQUEST['no_drpp'];
$fupload_name2		   = $_REQUEST['file2'];
$vdir_upload2  			= "../file/bukti_transfer/";

# UPLOAD DOKUMEN PETUGAS
  $lokasi_file1	= $_FILES['fupload1']['tmp_name'];
  $nama_file1	  = $_FILES['fupload1']['name'];
  $ukuran_file1	= $_FILES['fupload1']['size'];
  $konten_file1	= $_FILES['fupload1']['content'];
  $tipe_file1	  = $_FILES['fupload1']['type'];
  $nama_file_unik1 = $name; 
  
# UPLOAD DOKUMEN BENDAHARA
  $lokasi_file2	= $_FILES['fupload2']['tmp_name'];
  $nama_file2	  = $_FILES['fupload2']['name'];
  $ukuran_file2	= $_FILES['fupload2']['size'];
  $konten_file2	= $_FILES['fupload2']['content'];
  $tipe_file2	  = $_FILES['fupload2']['type'];
  $nama_file_unik2 = 'BT_'.$tgl_s.'_'.$jam_s.'.pdf'; 

if ($login == "petugas" and $tipe_file1 != "application/pdf" and $nama_file1 != "") {
echo "<center>Terjadi kesalahan upload dokumen ! silahkan ulangi proses ! <br><a href='index.php?index=data'><button>kembali</button></a></center>";
}
else if ($login == "bendahara" and $tipe_file2 != "application/pdf" and $nama_file2 != "") {
echo "<center>Terjadi kesalahan upload dokumen Bukti Transfer! silahkan ulangi proses ! <br><a href='index.php?index=data'><button>kembali</button></a></center>";
}

//PETUGAS
else if ($login == "petugas" and $tipe_file1 == "application/pdf"){ 
	
    Upload_doc($nama_file_unik1);
	$sql = "UPDATE data SET
			tgl_diterima_petugas	= '$tgl_diterima_petugas',
			unit_layanan			= '$unit_layanan',
			id_wilayah				= '$id_wilayah',
			jenis_dokumen			= '$jenis_dokumen',
			periode					= '$periode',
			nilai_pengajuan			= '$nilai_pengajuan',
			catatan					= '$catatan',
			
			name					= '$nama_file_unik1',
			size					= '$ukuran_file1',
			type					= '$tipe_file1'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());		  
		  
    header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";

}
else if ($login == "petugas" and $tipe_file1 == ""){ 

	$sql = "UPDATE data SET
			tgl_diterima_petugas	= '$tgl_diterima_petugas',
			unit_layanan			= '$unit_layanan',
			id_wilayah				= '$id_wilayah',
			jenis_dokumen			= '$jenis_dokumen',
			periode					= '$periode',
			nilai_pengajuan			= '$nilai_pengajuan',
			catatan					= '$catatan'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());		  
		  
    header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";

}

//KASUBAG
else if ($login == "kasubag"){ 
		  
	$sql = "UPDATE data SET
			tgl_diterima_kasubag	= '$tgl_diterima_kasubag',
			status1					= '$status1'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());	
			
	header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";
}

//PPK
else if ($login == "ppk"){ 
		  
	$sql = "UPDATE data SET
			tgl_diterima_ppk		= '$tgl_diterima_ppk',
			status2					= '$status2'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());	
			
	header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";
}

//BENDAHARA
else if ($login == "bendahara" and $tipe_file2 == "application/pdf"){ 

	unlink($vdir_upload2 . $fupload_name2); 
    Upload_trf($nama_file_unik2);
	$sql = "UPDATE data SET
			tgl_diterima_bendahara	= '$tgl_diterima_bendahara',
			tgl_transfer			= '$tgl_transfer',
			nilai_transfer			= '$nilai_transfer',
			tgl_drpp				= '$tgl_drpp',
			no_drpp					= '$no_drpp',
						
			name2					= '$nama_file_unik2',
			size2					= '$ukuran_file2',
			type2					= '$tipe_file2'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());	
			
	header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";
}
else if ($login == "bendahara" and $tipe_file2 == ""){ 
		  
	$sql = "UPDATE data SET
			tgl_diterima_bendahara	= '$tgl_diterima_bendahara',
			tgl_transfer			= '$tgl_transfer',
			nilai_transfer			= '$nilai_transfer',
			tgl_drpp				= '$tgl_drpp',
			no_drpp					= '$no_drpp'
			WHERE id_dokumen		= '$id_dokumen'";
	
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());	
			
	header("Location: index.php?index=data");
	$pesan= "Data berhasil disimpan";
}
?>
