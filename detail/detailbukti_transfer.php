<?php 
include "../login/konfigurasi.php";
include "../login/session.php";
include "../includes/config.php";
include "../includes/mysql.php";
include "../includes/fungsi_indotgl.php";

# Baca variabel URL (If Register Global ON)
$iddetail = $_REQUEST['iddetail'];

# Penyimpanan
$sql = "SELECT * FROM data, wilayah 
		WHERE data.id_wilayah=wilayah.id_wilayah and id_dokumen='$iddetail'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
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

?><head>
<title>Detail Bukti Transfer</title></head>




<link href='../favicon.gif' rel='SHORTCUT ICON'/>
<?php 
$id = $_SESSION[id_usr];
$queryth	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
$datath	= mysql_fetch_array($queryth);
$theme = $datath['themes'];
if ($theme == 'Default' or $theme == 'Grey' or $theme == '' or $theme == 'Bright'){?>
<link href="../css/styles-bright.css" rel="stylesheet" type="text/css" media="screen"/>
<?php }
else if($theme == 'Dark'){?>
<link href="../css/styles-dark.css" rel="stylesheet" type="text/css" media="screen"/>
<?php };?>

<body id="detail_bg">
<div align="center">
<table width="99%" height="99%" border="0" align="center" cellpadding="3" cellspacing="10" bordercolor="#003333">
  <tr>
  <td  valign="top" width="20%">
  <div align="center" style="margin-bottom:6px;" class="styledet">Detail <b>Bukti Transfer</b></div>
  
  <div id="detail" style=" padding-bottom:0px; padding-top:10px;">
  <div class="style323">Berkas diterima Petugas</div>
  <div class="style111"><?php echo $tgl_diterima_petugas; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Unit Layanan</div>
  <div class="style111"><?php echo $data['unit_layanan']; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Nama Wilayah</div>
  <div class="style111"><?php echo $data['nm_wilayah']; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Jenis Dokumen</div>
  <div class="style111"><?php echo $data['jenis_dokumen']; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Periode</div>
  <div class="style111"><?php echo $data['periode']; ?></div>
    
  <div id="detail_content"></div>
  
  <div class="style323">Nilai Pengajuan</div>
  <div class="style111">Rp <?php echo $nilai_pengajuan; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Diterima Kasubag RT</div>
  <div class="style111"><?php echo $tgl_diterima_kasubag; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Status (Kasubag RT)</div>
  <div class="style111"><?php echo $data['status1']; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Diterima PPK</div>
  <div class="style111"><?php echo $tgl_diterima_ppk; ?></div>
    
  <div id="detail_content"></div>
  
  <div class="style323">Status (PPK)</div>
  <div class="style111"><?php echo $data['status2']; ?></div>
    
  <div id="detail_content"></div>
  
  <div class="style323">Diterima Bendahara</div>
  <div class="style111"><?php echo $tgl_diterima_bendahara; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Tanggal Transfer</div>
  <div class="style111"><?php echo $tgl_transfer; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Nilai Transfer</div>
  <div class="style111">Rp <?php echo $nilai_transfer; ?></div>
  
  <div id="detail_content"></div>
  
  <div class="style323">Tanggal DRPP</div>
  <div class="style111"><?php echo $tgl_drpp; ?></div>
    
  <div id="detail_content"></div>
  
  <div class="style323">Nomor DRPP</div>
  <div class="style111"><?php echo $data['no_drpp']; ?></div>
  
  </div>
  
  
  <br />
  <div id="detail_file" style=" padding-bottom:10px; padding-top:10px;">
  
  <div class="style323">Ukuran File</div>
  <div class="style111"><?php ini_set( "display_errors", 0);
	  $rev = $data['size2'];
	  $ukuran = $rev/1000;
	  echo "".number_format($ukuran) ; echo" KB";
	  ?></div>
  
  <div id="detail_content_file"></div>
  
  <div class="style323">Nama File</div>
  <div class="style111"><?php echo $data['name2']; ?></div>
  
  </div>
  
  <br>
  
  <div class="form-search">
  <a href='../site/index.php?index=data'><button class="button">&nbsp;back&nbsp;</button></a>
  <a href="../detail/detaildokumen.php?iddetail=<?php echo $data['id_dokumen']; ?>" title="Preview Dokumen" target="_self">
  <button class="button">Dokumen Terkait</button>
  </a>
  </div>
    
  </td>
  <td align="center" width="80%">
  <iframe id="det_iframe" frameborder="0" width="100%" height="100%" src="../file/bukti_transfer/<?php echo $data['name2']; ?>">
  </td>
  </tr>
  
    
</table>
</div>