<?php include"../login/session.php";
include"konfigurasi.php";
include"cek.php";
?>
<?php $allow = $_SESSION[role]; $st= $_SESSION[ac_st];
if (($allow == 'petugas' or $allow == 'kasubag' or $allow == 'ppk' or $allow == 'bendahara' or $allow == 'user' or $allow == 'admin') and $st == 'aktif') {?>
<html>
<head>
<?php ini_set( "display_errors", 0);
$id = $_SESSION[id_usr];
$query4	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
$data4	= mysql_fetch_array($query4); ?>
<title>KARWAS | <?php echo $data4['nm_lengkap'];?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href='../favicon.png' rel='SHORTCUT ICON'/>
<?php 
$id = $_SESSION[id_usr];
$queryth	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
$datath	= mysql_fetch_array($queryth);
$theme = $datath['themes'];
if($theme == 'Dark'){?>
<link href="../theme/jquery.ui.all-dark.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../css/styles-dark.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../css/newlook-dark.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/sidetabs-dark.css" rel="stylesheet" type="text/css" media="screen"> 
<?php }
else if($theme == 'Bright' or $theme == 'Default' or $theme == ''){?>
<link href="../theme/jquery.ui.all-bright.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../css/styles-bright.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../css/newlook-bright.css" rel="stylesheet" type="text/css" media="screen">
<link href="../css/sidetabs-bright.css" rel="stylesheet" type="text/css" media="screen"> 
<?php };?>
<link href="../js/jquery.treeview.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../css/icon_side.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="../js/screen.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="../js/dropdown.js"></script>
</head>
<body id="appbg">
<div align="center">

<div class="sidebar"><?php include "side-dark.php";?></div>
<?php include "side-pop.php";?>
<div align="left" style="width:auto;"><?php include "menu2.php";?></div>
<div id="footer_paged"><?php include "page-dark.php"; ?></div>

<?php ini_set( "display_errors", 0);
$admin = $_GET[admin]; 
if ($admin==home){echo ""; } else {?>
<div id="lisensi">2013, ISO Filing System &copy; Pusat Layanan Pengadaan Secara Elektronik</div><? } ?>

<?php }
		
		else { echo "
		<link href='../styles.css' rel='stylesheet' type='text/css' media='screen' /> 
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<center><span class='denied'>Unauthorized Acces!!</span>
		<br><br><br>
		<a href='../index.php'/>Login</a><center>
		"; } ?>
</div>
</body>
</html>