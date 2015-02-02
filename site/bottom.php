<body>
<div align="center">
<table width="100%">
<tr><td><div align="center" id="bottom_title" style="margin-top:2px;">
<?php ini_set( "display_errors", 0);
$admin = $_GET[admin];
if 	  ($admin==audit)			{ echo " ISO Filing System | <b>Audit Report</b>"; }
else if ($admin==audit_tl)		 { echo " ISO Filing System | <b>Tindak Lanjut Audit</b>"; }
else if ($admin==bantuan)		  { echo " ISO Filing System | <b>Bantuan</b>"; }
else if ($admin==catatanmutu)	  { echo " ISO Filing System | <b>Catatan Mutu</b>"; }
else if ($admin==catatanmutu_x)	{ echo " ISO Filing System | <b>Catatan Mutu Inaktif</b>"; }
else if ($admin==daftarformulir)   { echo " ISO Filing System | <b>Daftar Induk Formulir</b>"; }
else if ($admin==daftareksternal)  { echo " ISO Filing System | <b>Daftar Induk Dokumen Eksternal</b>"; }
else if ($admin==eksternal)		{ echo " ISO Filing System | <b>Dokumen Eksternal</b>"; }
else if ($admin==formulir)		 { echo " ISO Filing System | <b>Formulir</b>"; }
else if ($admin==history)		  { echo " ISO Filing System | <b>Riwayat Perubahan Dokumen</b>"; }
else if ($admin==int_lain)		 { echo " ISO Filing System | <b>Dokumen Internal Lainnya</b>"; }
else if ($admin==informasi)		{ echo " ISO Filing System | <b>Informasi Aplikasi</b>"; }
else if ($admin==internal)		 { echo " ISO Filing System | <b>Daftar Induk Dokumen Internal</b>"; }
else if ($admin==ikerja)		   { echo " ISO Filing System | <b>Instruksi Kerja</b>"; }
else if ($admin==jenis)			{ echo " ISO Filing System | <b>Daftar Jenis Dokumen</b>"; }
else if ($admin==kebijakan)		{ echo " ISO Filing System | <b>Kebijakan Mutu</b>"; }
else if ($admin==kadaluarsa)	   { echo " ISO Filing System | <b>Dokumen Kadaluarsa</b>"; }
else if ($admin==profil)		   { echo " ISO Filing System | <b>Profil</b>"; }
else if ($admin==pengembangan)	 { echo " ISO Filing System | <b>Pengembangan</b>"; }
else if ($admin==password)		 { echo " ISO Filing System | <b>Ubah Password</b>"; }
else if ($admin==pedoman)		  { echo " ISO Filing System | <b>Pedoman Mutu</b>"; }
else if ($admin==pengaturan)	   { echo " ISO Filing System | <b>Pengaturan</b>"; }
else if ($admin==prosedur)		 { echo " ISO Filing System | <b>Prosedur Mutu</b>"; }
else if ($admin==terbaru)		  { echo " ISO Filing System | <b>Data Terbaru</b>"; }
else if ($admin==dafobs)		   { echo " ISO Filing System | <b>Daftar Observasi</b>"; }
else if ($admin==dafLKPK)		  { echo " ISO Filing System | <b>Daftar LKPK</b>"; }
else if ($admin==dafper)		   { echo " ISO Filing System | <b>Daftar Pertanyaan</b>"; }
else if ($admin==arsip_lain)	   { echo " ISO Filing System | <b>Arsip Lainnya</b>"; }
else if ($admin==arsip_lain_x)	 { echo " ISO Filing System | <b>Arsip Lainnya Inaktif</b>"; }
else if ($admin==saran)	 		{ echo " ISO Filing System | <b>Saran Perbaikan</b>"; }
else if ($admin==sasaran)		  { echo " ISO Filing System | <b>Sasaran Mutu</b>"; }
?>
</div></td></tr>
</table>
</div> 
<br>
<?php
 ini_set( "display_errors", 0);
	$id = $_SESSION[id_usr];
	$query	= mysql_query( "SELECT * FROM user$wh WHERE id_anggota ='$id'");
	while($data	= mysql_fetch_array($query)){
	$wid = $data['resolusi'];
	$thm = $data['themes'];
	if		($wid == '1366'){?>
  
<div align="center">
<table class="style277" width="auto" cellspacing="1" cellpadding="1">
 <tr height="auto">
 <td width="auto">
 <a href='admin.php?admin=profil' class="lainnya_style">
 <div class="icon">
 <div class="profil_base"></div>
 <div class="profil_head"></div>
 <div class="profil_tie"></div>
 <div class="profil_tie2"></div>
 </div>
 <center><span style=" margin:2px">Ubah Profil</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=password' class="lainnya_style">
 <div class="icon">
 <div class="lockClosed_base"></div>
 <div class="lockClosed_handle"></div>
 </div>
 <center><span style="margin:2px">Ubah Password</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=pengaturan' class="lainnya_style">
 <div class="icon">
 <div class="tang_head"></div>
 <div class="tang_base"></div>
 <div class="tang_dot"></div>
 <div class="palu_head"></div>
 <div class="palu_base"></div>
 <div class="palu_dot"></div>
 </div>
 <center><span style=" margin:2px">Pengaturan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=saran' class="lainnya_style">
 <div class="icon">
 <div class="chat"></div>
 <div class="lines"></div>
 </div>
 <center><span style=" margin-top:5px;">Saran Perbaikan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=informasi' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_i">i</div>
 </div>
 <center><span style=" margin:2px">Informasi Aplikasi</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=bantuan' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_help">?</div>
 </div>
 <center><span style=" margin:2px">Bantuan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=terbaru' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_baru">Baru</div>
 </div>
 <center><span style="margin:2px">Data Terbaru</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=jenis' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_jenis">Jenis</div>
 </div>
 <center><span style="margin:2px">Daftar Jenis Dokumen</span></center></a>    
 </td>
 </tr>
</table>
</div>

<? }	else if		($wid == '1280'){?>
    
<div align="center">
<table class="style277" width="auto" cellspacing="1" cellpadding="1">
 <tr height="auto">
 <td width="auto">
 <a href='admin.php?admin=profil' class="lainnya_style">
 <div class="icon">
 <div class="profil_base"></div>
 <div class="profil_head"></div>
 <div class="profil_tie"></div>
 <div class="profil_tie2"></div>
 </div>
 <center><span style=" margin:2px">Ubah Profil</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=password' class="lainnya_style">
 <div class="icon">
 <div class="lockClosed_base"></div>
 <div class="lockClosed_handle"></div>
 </div>
 <center><span style=" margin:2px">Ubah Password</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=pengaturan' class="lainnya_style">
 <div class="icon">
 <div class="tang_head"></div>
 <div class="tang_base"></div>
 <div class="tang_dot"></div>
 <div class="palu_head"></div>
 <div class="palu_base"></div>
 <div class="palu_dot"></div>
 </div>
 <center><span style=" margin:2px">Pengaturan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=saran' class="lainnya_style">
 <div class="icon">
 <div class="chat"></div>
 <div class="lines"></div>
 </div>
 <center><span style=" margin-top:5px;">Saran Perbaikan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=informasi' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_i">i</div>
 </div>
 <center><span style=" margin:2px">Informasi Aplikasi</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=bantuan' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_help">?</div>
 </div>
 <center><span style=" margin:2px">Bantuan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=terbaru' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_baru">Baru</div>
 </div>
 <center><span style="margin:2px">Data Terbaru</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=jenis' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_jenis">Jenis</div>
 </div>
 <center><span style="margin:2px">Daftar Jenis Dokumen</span></center></a>    
 </td>
 </tr>
</table>
</div>
<? }else if ($wid == '1024'){?>
<div align="center">
<table class="style277" width="auto" cellspacing="3" cellpadding="1">
 <tr height="auto">
 <td width="auto">
 <a href='admin.php?admin=profil' class="lainnya_style">
 <div class="icon">
 <div class="profil_base"></div>
 <div class="profil_head"></div>
 <div class="profil_tie"></div>
 <div class="profil_tie2"></div>
 </div>
 <center><span style=" margin:2px">Ubah Profil</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=password' class="lainnya_style">
 <div class="icon">
 <div class="lockClosed_base"></div>
 <div class="lockClosed_handle"></div>
 </div>
 <center><span style=" margin:2px">Ubah Password</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=pengaturan' class="lainnya_style">
 <div class="icon">
 <div class="tang_head"></div>
 <div class="tang_base"></div>
 <div class="tang_dot"></div>
 <div class="palu_head"></div>
 <div class="palu_base"></div>
 <div class="palu_dot"></div>
 </div>
 <center><span style=" margin:2px">Pengaturan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=saran' class="lainnya_style">
 <div class="icon">
 <div class="chat"></div>
 <div class="lines"></div>
 </div>
 <center><span style=" margin-top:5px;">Saran Perbaikan</span></center></a>
 </td>
 </tr>
 <tr>
 <td width="auto">
 <a href='admin.php?admin=informasi' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_i">i</div>
 </div>
 <center><span style=" margin:2px">Informasi Aplikasi</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=bantuan' class="lainnya_style">
 <div class="icon">
 <div class="info_bg"></div>
 <div class="info_symb_help">?</div>
 </div>
 <center><span style=" margin:2px">Bantuan</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=terbaru' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_baru">Baru</div>
 </div>
 <center><span style="margin:2px">Data Terbaru</span></center></a>
 </td>
 <td width="auto">
 <a href='admin.php?admin=jenis' class="lainnya_style">
 <div class="icon">
 <div class="daftar_dot"></div>
 <div class="daftar_line"></div>
 <div class="daftar_jenis">Jenis</div>
 </div>
 <center><span style="margin:2px">Daftar Jenis Dokumen</span></center></a>    
 </td>
 </tr>
</table>
</div>
<? } }?>
<center>
</center>
</body>