<?php 
include"konfigurasi.php";
include "fungsi_seo.php";
include "fungsi_upload.php";


# Baca variabel Form (If Register Global ON)
$tgl_s = date("dmY");
$jam_s = date("His");
$tgl_diterima_petugas	= $_REQUEST['tgl_diterima_petugas'];
$unit_layanan			= $_REQUEST['unit_layanan'];
$id_wilayah			  = $_REQUEST['id_wilayah'];
$jenis_dokumen 		   = $_REQUEST['jenis_dokumen'];
$periode 				 = $_REQUEST['periode'];
$nilai_pengajuan 		 = $_REQUEST['nilai_pengajuan'];
$catatan				 = $_REQUEST['catatan'];
$nama_dokumen	 		= $_REQUEST['nama_dokumen'];

  $lokasi_file1	= $_FILES['fupload1']['tmp_name'];
  $nama_file1	  = $_FILES['fupload1']['name'];
  $ukuran_file1	= $_FILES['fupload1']['size'];
  $konten_file1	= $_FILES['fupload1']['content'];
  $tipe_file1	  = $_FILES['fupload1']['type'];
  $rename1         = $_REQUEST['no_prosedur'];
  $nama_file_unik1 = 'DKV_'.$tgl_s.'_'.$jam_s.'.pdf'; 

Upload_doc($nama_file_unik1);

	$sql = "INSERT INTO data SET 
			tgl_diterima_petugas	= '$tgl_diterima_petugas',
			unit_layanan			= '$unit_layanan',
			id_wilayah				= '$id_wilayah',
			jenis_dokumen			= '$jenis_dokumen',
			periode					= '$periode',
			nilai_pengajuan			= '$nilai_pengajuan',
			catatan					= '$catatan',
			name					= '$nama_file_unik1',
			size					= '$ukuran_file1',
			type					= '$tipe_file1'";
		
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  
		      header("Location: index.php?index=data");

	$pesan= "Data berhasil disimpan";
?>
