<?php
ini_set( "display_errors", 0);
include"../login/session.php";
include "../login/konfigurasi.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php include "konfigurasi.php"; ?>
	
<?php
 ini_set( "display_errors", 0);
	$log= $_SESSION[login];
	$bag= $_SESSION[role];
	$id = $_SESSION[id_usr];
	
 	$query	= mysql_query( "SELECT * FROM user WHERE id_user ='$id'");
	$data	= mysql_fetch_array($query);
	?>
<div id="main-search" align='center' style="max-width:100%;">
<table width="100%">
<tr>
<td width="100%" height="26" align="center">
<div class="style27"><strong>&nbsp;</strong></div>
</td>
</tr>
</table>
</div>

<div id="main-nobg2"> 
<div align="left" class="table-box-scroll-X2">
<div class="table-container-500">
    <div align="left" class="style27">Profil</div>
<div class="table-content-scroll-Y2">
<div class="table-content-container-fixed">

<div id="main-profil" style="width:500px;padding:10px;"> 
<div class="form-profil" style="width: 500px;">
    
 	<form name="form1" method="post" action="proses.editprofil.php">
    <div class="block form-row">
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Username :</span>
    <input name="username" type="text" id="username" class="input" value="<?= $data['username']; ?>" size="45">
	
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Nama Lengkap :</span>
    <input name="nm_lengkap" type="text" id="nm_lengkap" class="input" value="<?= $data['nm_lengkap']; ?>" size="45">

    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">NIP :</span>
    <input name="nip" type="text" id="nip" class="input" value="<?= $data['nip']; ?>" size="45">
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Pangkat/Gol :</span>
    <div class="show"><?= $data['pangkat']; ?></div>
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Jabatan :</span>
   	<div class="show"><?= $data['jabatan']; ?></div>
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Theme :</span>
	<select name="themes" class="input" id="themes" required>
	<option selected value="<?= $data['themes']; ?>"><?= $data['themes']; ?></option>
   	<option value="Default">Default</option>
   	<option value="Dark">Dark</option>
	</select>
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78"></span>
   	<a href='index.php?index=password' title='Ubah Password' class="link_password">Ubah Password</a>
    
    <div style="height:10px">&nbsp;</div>
 
    <div align="right">
 	<input type="submit" name="Submit" class="button" value="Simpan">
 	<input name="id_user" type="hidden" value="<?= $data['id_user']; ?>">
    </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>