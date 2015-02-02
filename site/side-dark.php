<?php
include "../login/konfigurasi.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta charset="utf-8">
<script src="../lib/jquery.js" type="text/javascript"></script>
<script src="../lib/jquery.cookie.js" type="text/javascript"></script>
<script src="../js/jquery.treeview.js" type="text/javascript"></script>
<script src="../ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="../ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="../ui/jquery.ui.accordion.js" type="text/javascript"></script>
<script>
	$(function() {
		$( "#accordion" ).accordion();
	});
</script>
<script type="text/javascript">
		$(function() {
			$("#tree").treeview({
				collapsed: false,
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
</script>
<?php include "konfigurasi.php"; ?>
</head>
<body>
<a href='index.php?index=profil' title='Profil'>
<div class="login-detail" style="width:auto; max-width:178px;" align="left">
    <?php 
	$id = $_SESSION[id_usr];
 	$query2	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
	while($data2	= mysql_fetch_array($query2)){
	echo"	<div class='login_username'>$data2[nm_lengkap]</div>
			<div class='login_bidang'>$data2[jabatan]</div>"; }?>
</div>
</a>
<div id="side" style="height:auto;width:185px; overflow:hidden;">
<table cellspacing="0" cellpadding="0" width="183px">
<tr>
<td valign="top" align="left">
  <div class="nav-bar">
	<div class="nav-bar-inner">
	<ul class="menu">    
    <li class="bordermenu"><a href='index.php?index=home'><span class="sym-blue-menu">)</span> Home</a></li>
    <?php 
	  $role 	= $_SESSION[role];
	  if($role=='admin'){echo"";} else {?>
    <li class="bordermenu"><a href='index.php?index=data'><span class="sym-blue-menu">)</span> Data Karwas Voucher</a></li>
    <?php };?>
    
    <?php 
	  $role 	= $_SESSION[role];
	  if($role=='admin'){
	  ?>    
    <li class="bordermenu"><a href='index.php?index=wilayah'><span class="sym-blue-menu">)</span> Daftar Wilayah</a></li>
    <li class="bordermenu"><a href='index.php?index=data_user'><span class="sym-blue-menu">)</span> Daftar Anggota</a></li>
    <?php } else {echo"";}?>
    
    <li class="bordermenu">
    <a href='../login/logout.php' onClick="return confirm('Anda akan keluar dari aplikasi, lanjutkan ?')"><span class="sym-red-menu">X</span> <span class="lg-side">Logout</span></a></li>
	</ul>
	</div>
  </div>
</td>
</tr>
</table>
</div>

</body>