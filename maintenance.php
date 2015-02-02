<?php
error_reporting(0); ?><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="admin/styles.css" rel="stylesheet" type="text/css" media="screen" />
<title>LPSE | Maintenance</title>
</head>



<link rel="shortcut icon" href="crvaf.png" type="image/icon">
<body>
<div align="center" style="height:95%;">
<?php 
include "login/konfigurasi.php";
?>
<?php 
$query	= mysql_query( "SELECT * FROM informasi WHERE id_info='2789'");
$info	= mysql_fetch_array($query);
?>
	<table width="900">
    <tr>
    <td align="center"><span class="style228">Informasi</span></td>
    </tr>
	</table>
	<div style="overflow-y:scroll; height:80%; vertical-align:middle; scroll-color:hidden; ">
    <div style="margin-bottom:15px; margin-top:15px;">
  	<table width="900">
    <tr>
    <td align="justify"><div id="maintenance" style="margin:20px; margin-top:8px;"><?php echo $info['isi_info']; ?></div></td>
    </tr>
  	</table>
	</div>
    </div>
    
    <?php ini_set( "display_errors", 0);
	  
	$apstt = $info['app_stat'];
	  
	if 		($apstt == 'Running' )		{ echo "	<a href='index.php'> <div class='side_aktif2' align='center' style='margin:20px;'>Running 
													<p><span class='style28'>Silahkan klik untuk kembali ke halaman login.</span></p></div></a>"; }
	else if ($apstt == 'Ready' )		{ echo " 	<div class='side_none2' align='center' style='margin:20px;'>&nbsp;Ready&nbsp;
													<p><span class='style28'>Sistem akan segera dijalankan atau akan segera dilakukan maintenance</span></p></div>"; }
	else if ($apstt == 'Maintenance')	{ echo "	<div class='side_inaktif2' align='center' style='margin:20px;'>Under Maintenance
													<p><span class='style28'>Sedang dilakukan maintenance sistem</span></p></div> "; }?>
    </div>
<!-- footer ends-->
</body>
</html>