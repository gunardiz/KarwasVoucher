
<script type="text/javascript" src="../js/animation.js"></script>
<script type="text/javascript" src="../js/jquery.colorbox.js"></script>
<script language="JavaScript" type="text/javascript">
function roll_over(img_name, img_src){document[img_name].src = img_src;};
</script>
<script type="text/javascript">
		$(document).ready(function() {
		$(".overlay").colorbox();
		});
</script>
<?php
include "../login/konfigurasi.php";
include "../includes/fungsi_indotgl.php";

switch ($_GET['aksi']){
default: lists(); break;
case "list": lists(); break;
case "dellist";	del(); lists(); break;}
function lists(){

if($_POST['cari']){ 
$query	= $_POST['query'];
$tipe	= $_POST['tipe'];
$wh		= "and $tipe LIKE '%$query%' ";}?>

<div id="main-search" align='center' style="max-width:100%;">
<table width="100%">
<tr>
<td align="left" width="35%"><span class="style27">Daftar <b>Dokumen</b></span></td>
<td align="right" width="64%">
<section class="form-search">
<form id="form1" name="form1" method="post" action="">
<select name="tipe" id="tipe" class="input" >
	<option value="unit_layanan" selected="selected">Unit Layanan</option>
    <option value="jenis_dokumen">Jenis Dokumen</option>
	<option value="periode">Periode</option>
    <option value="nilai_pengajuan">Nilai Pengajuan</option>
    <option value="nilai_transfer">Nilai Transfer</option>
    <option value="no_drp">Nomor DRP</option>
    <option value="status1">Status (Kasubag RT)</option>
    <option value="status2">Status (PPK)</option>
</select>
<input name="query" type="text" id="query" placeholder="cari..." maxlength="200" class="input" size="30"/>
<input name="cari" type="submit" id="cari" value="L" class="look"/>
	  <?php 
	  $role 	= $_SESSION[role];
	  if($role=='petugas'){
	  ?>
	  <a href="tambahdata.php?idtambah=<? echo $data[id_tambah]; ?>" title="Tambah data Mutu" class="overlay">
	  <button class="button"><span class="sym-white3">+</span> Tambah</button>
	  </a>
      <?php } else {echo"";}?>
      
</form>
</section></td>

<td align="right" width="auto"><div class="form-search"><a href="../export/data_ex.php"  target="_blank">
<button title="Export to Ms.Excel" class="excel"><img src="images/printer.png" title="Export to Ms.Excel" align="top" width="16" height="16" /></button>
</a></div>
</td>
</tr>
</table>
</div>

<div id="main-table"> 
<div align="center" class="table-box-scroll-X">
<div align="center" class="table-container-1950">
<div class="table-header-scroll-Y">
<table id="table-header" width="100%" border="0" cellpadding="1" cellspacing="0">
<tr align="left" height="25">
<td width="40" align="center" id="table-left"><div class="style21">No.</div></td>
<td width="100"><div class="style21">Berkas diterima Petugas</div></td>
<td width="60"><div class="style21">Unit Layanan</div></td>
<td width="130"><div class="style21">Wilayah</div></td>
<td width="100"><div class="style21">Jenis Dokumen</div></td>
<td width="100"><div class="style21">Periode (Bulan)</div></td>
<td width="120"><div class="style21">Nilai <p>Pengajuan</p></div></td>
<td width="155"><div class="style21">Dokumen</div></td>
<td width="100"><div class="style21">Diterima <p>Kasubag RT</p></div></td>
<td width="80" align="center"><div class="style21">Status (Kasubag RT)</div></td>
<td width="100"><div class="style21">Diterima PPK</div></td>
<td width="80" align="center"><div class="style21">Status (PPK)</div></td>
<td width="100"><div class="style21">Diterima Bendahara</div></td>
<td width="100"><div class="style21">Tanggal Transfer</div></td>
<td width="120"><div class="style21">Nilai <p>Transfer</p></div></td>
<td width="155"><div class="style21">Bukti Transfer</div></td>
<td width="100"><div class="style21">Tanggal DRPP</div></td>
<td width="120"><div class="style21">No. DRPP</div></td>
<td width="60" align="center"><span class="sym-white2">+</span><span class="style21"> Aksi</span></td>
</tr>
</table>
</div>

<div align="center" class="table-content-scroll-Y">
<div align="center" class="table-content-container">   
<table class="hovered" width="100%" height="30" border="0" cellpadding="1" cellspacing="0" >
<?php $dataPerPage = 30;
if(isset($_GET['pages'])) { $noPage = $_GET['pages']; } 
else { $noPage = 1; }
	
$id 	= $_SESSION[id_usr];
$role  = $_SESSION[role];
$q_dv	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
$d_dv	= mysql_fetch_array($q_dv);
$datv 	= $d_dv['data_view'];
$bdng 	= $d_dv['kode_bidang_us'];
$view	= "and kode_bidang = '$bdng'";

$z		= 1;
$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM wilayah$wh");
$row	= mysql_fetch_array($pag);
$jumData = $row['jumData'];
$jumPage = ceil($jumData/$dataPerPage);
$offset = ($noPage - 1) * $dataPerPage;
$query	= mysql_query( "SELECT * FROM data, wilayah WHERE data.id_wilayah=wilayah.id_wilayah $wh	ORDER BY id_dokumen DESC LIMIT $offset, $dataPerPage");
$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
while($data	= mysql_fetch_array($query)){
$tgl_diterima_petugas	= tgl_indo($data['tgl_diterima_petugas']);
$tgl_diterima_ppk		= tgl_indo($data['tgl_diterima_ppk']);
$tgl_diterima_bendahara  = tgl_indo($data['tgl_diterima_bendahara']);
$tgl_diterima_kasubag	= tgl_indo($data['tgl_diterima_kasubag']);
$tgl_transfer			= tgl_indo($data['tgl_transfer']);
$tgl_drpp				= tgl_indo($data['tgl_drpp']);

$np = $data['nilai_pengajuan'];
$nt = $data['nilai_transfer'];

$nilai_pengajuan=number_format($np,0,',',',');
$nilai_transfer=number_format($nt,0,',',',');
?>
<tr height="30">
<td id="table-rec-left" align="center" width="40" height="30"><span class="styleNO"><?= $i;?></span></td>
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;"><?php echo $tgl_diterima_petugas; ?></div></td>
<td width="60" class="style21x"><div style="margin-left:3px; margin-right:3px;"><?php echo $data['unit_layanan']; ?></div></td>
<td width="130" class="style21x"><div style="margin-left:3px; margin-right:3px;"><?php echo $data['nm_wilayah']; ?></div></td>
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;"><?php echo $data['jenis_dokumen']; ?></div></td>
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;"><?php echo $data['periode']; ?></div></td>
<td width="120" class="style21x"><div style="margin-left:3px; margin-right:3px;">Rp <?php echo $nilai_pengajuan; ?></div></td>
<td width="155" class="style29"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $typ = $data['type'];  
								 if 	 ($typ == ''){ echo "-"; }
								 else if($typ != ''){?>
								 <a href="../detail/detaildokumen.php?iddetail=<?php echo $data['id_dokumen']; ?>" title="Lihat Dokumen">
								 <?php echo $data['name']; ?>
                                 <?php }?>
                                 </a>
                                 </div></td>
                                 
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $tgl1 = $data['tgl_diterima_kasubag'];  
								 if 	 ($tgl1 == '0000-00-00' and $role == 'kasubag')
								 							   { echo " <a href='editdata.php?idubah=$data[id_dokumen]&&file2=$data[name2]' 
								 										   class='overlay' title='Input Data Kasubag RT'>
																		<button class='revisi'>Input</button>
																		</a>"; }
								 elseif ($tgl1 == '0000-00-00' and $role != 'kasubag')
								 							   { echo "-"; }
								 else 						  { echo $tgl_diterima_kasubag; }
								 ?>
                                 </div>
                                 </td>
                                 
<td width="80" class="style21x">
                                 <?php ini_set( "display_errors", 0);
								 $st1 = $data['status1'];  
								 if 	 ($st1 == 'Disetujui')   { echo "<div class='aktif' >Disetujui</div>"; }
								 else if($st1 == 'Dikembalikan'){ echo "<div class='inaktif' >Dikembalikan</div>"; }
								 else if($st1 == '')			{ echo "<div align='center' >-</div>"; }
								 ?>
                                 </td>
                                 
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $tgl2 = $data['tgl_diterima_ppk'];  
								 if 	 ($tgl2 == '0000-00-00' and $role == 'ppk')
								 							   { echo " <a href='editdata.php?idubah=$data[id_dokumen]&&file2=$data[name2]' 
								 										   class='overlay' title='Input Data PPK'>
																		<button class='revisi'>Input</button>
																		</a>"; }
								 elseif ($tgl2 == '0000-00-00' and $role != 'ppk')
								 							   { echo "-"; }
								 else 						  { echo $tgl_diterima_ppk; }
								 ?>
								 </div></td>
                                 
<td width="80" class="style21x">
                                 <?php ini_set( "display_errors", 0);
								 $st2 = $data['status2'];  
								 if 	 ($st2 == 'Disetujui')   { echo "<div class='aktif' >Disetujui</div>"; }
								 else if($st2 == 'Dikembalikan'){ echo "<div class='inaktif' >Dikembalikan</div>"; }
								 else if($st2 == '')			{ echo "<div align='center' >-</div>"; }
								 ?>
                                 </td>
                                 
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $tgl3 = $data['tgl_diterima_bendahara'];  
								 if 	 ($tgl3 == '0000-00-00' and $role == 'bendahara')
								 							   { echo " <a href='editdata.php?idubah=$data[id_dokumen]&&file2=$data[name2]' 
								 										   class='overlay' title='Input Data Bendahara'>
																		<button class='revisi'>Input</button>
																		</a>"; }
								 elseif ($tgl3 == '0000-00-00' and $role != 'bendahara')
								 							   { echo "-"; }
								 else 						  { echo $tgl_diterima_bendahara; }
								 ?>
                                 </div></td>
                                 
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $tgl4 = $data['tgl_transfer'];  
								 if 	 ($tgl4 == '0000-00-00'){ echo "-"; }
								 else 						  { echo $tgl_transfer; }
								 ?>
                                 </div></td>
                                 
<td width="120" class="style21x"><div style="margin-left:3px; margin-right:3px;">
								 <?php if ((!empty ($data['nilai_transfer']))){echo "Rp $nilai_transfer"; }else{echo"-";};?>
                                 </div></td>
                                 
<td width="155" class="style29"><div style="margin-left:3px; margin-right:3px;">
								 <?php if ((!empty ($data['type2'])))
								 			{echo "<a href='../detail/detailbukti_transfer.php?iddetail=$data[id_dokumen]' title='Lihat Bukti Transfer'>
								 			$data[name2]</a>"; }else{echo"-";};?>
                                 </a>
                                 </div></td>
                                 
<td width="100" class="style21x"><div style="margin-left:3px; margin-right:3px;">
                                 <?php ini_set( "display_errors", 0);
								 $tgl5 = $data['tgl_drpp'];  
								 if 	 ($tgl5 == '0000-00-00'){ echo "-"; }
								 else 						  { echo $tgl_drpp; }
								 ?>
                                 </div></td>
                                 
<td width="120" class="style21x"><div style="margin-left:3px; margin-right:3px;">
								 <?php if ((!empty ($data['no_drpp']))){echo $data['no_drpp']; }else{echo"-";};?>
                                 </div></td>

<td align="center" width="60" class="col-act">
<div class="act-container">
<?php ini_set( "display_errors", 0);	 
$allow = $_SESSION[role];
if ($allow == 'petugas' or $allow == 'kasubag' or $allow == 'ppk' or $allow == 'bendahara'){ echo "
<a href='editdata.php?idubah=$data[id_dokumen]&&file2=$data[name2]' class='overlay' title='Ubah Data'>
<button class='edit'><img src='images/edit.png' width='14' height='14' border='0' align='absmiddle' /></button> </a>
<a href='hapusdata.php?idhapus=$data[id_dokumen]&&file1=$data[name]&&file2=$data[name2]' title='Hapus Data' 
onClick=\"return confirm('Anda yakin untuk menghapus data ini?')\">
<button class='delete'><img src='images/b_drop.png' width='14' height='14' border='0' align='absmiddle' /></button></a>"
	; }
			
else { echo " 	
<button class='dis' title='Disabled'><img src='images/edit_dis.png' width='14' height='14' border='0' align='absmiddle' /></button>
<button class='dis' title='Disabled'><img src='images/b_drop_dis.png' width='14' height='14' border='0' align='absmiddle' /></button>" 
	; } ?>
</div>
</td>
</tr>
<?php $i++; $z++;}?>
</table>
</div>
</div>
</div>
</div>
</div>
<?php } ?>