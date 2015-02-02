<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include "../login/konfigurasi.php";
include "../login/session.php";
?>
<head>
<title>LPSE/INFORMASI</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<div id="main-search" align='left' style="max-width:100%;">
<span class="style228">Home</span>
</div>

<div id="main-nobg2"> 
<div align="left" class="table-box-scroll-X2">
<div align="left" class="table-container-500">
<div align="left" class="table-content-scroll-Y2">
<div align="left" class="table-content-container-fixed">
  	<table width="650" class="kebijakan">
    <tr>
    <td align="justify">
	<?php 
	$bag = $_SESSION[role];
	$query	= mysql_query( "SELECT * FROM home");
	$info=mysql_fetch_array($query);
	
	if($bag == 'admin'){
	?>
    <a href='index.php?index=edithome&&idubah=<?= $info['id_home']; ?>'title="Ubah Konten Home">
	<button class="edit_kebijakan"><img src="images/edit.png" width="14" height="14" border="0"  align="absmiddle"/></button></a>
    <?php }else {echo "";};?>
    <div class="kebijakan-content"><?php echo $info['konten']; ?></div></td>
    </tr>
  	</table>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

