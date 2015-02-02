<?php
include "../login/konfigurasi.php";
?>

<script type="text/javascript" src="js/fancybox/jquery-latest.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<script type="text/javascript">
function validasi_input(form){
	
   if (form.old_password.value != form.password.value || form.old_password.value ==""){
    alert("Kesalahan Input Pada Password Lama!");
    form.old_password.focus();
    return (false);
   }
   if (form.new_password.value != form.repassword.value || form.new_password.value ==""){
    alert("Password baru tidak sama/belum diisi!");
    form.repassword.focus();
    return (false);
   }
   
return (true);
}
</script>
<?php 
include "konfigurasi.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>		
<?php
 ini_set( "display_errors", 0);
	$log= $_SESSION[login];
	$bag= $_SESSION[role];
	$id = $_SESSION[id_usr];
	
 	$query	= mysql_query( "SELECT * FROM user$wh WHERE id_user ='$id'");
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
    <div align="left" style="margin-left:0px;" class="style27">Ubah Password</div>
<div class="table-content-scroll-Y2">
<div class="table-content-container-fixed">

<div id="main-profil" style="width:500px;padding:10px;"> 
<div class="form-profil" style="width: 500px;">
    
 	<form id="form1" method="post" action="proses.editpassword.php" onSubmit="return validasi_input(this);">
    <div class="block form-row">
    
    <div style="height:10px">&nbsp;</div>
    
	<span class="label style78">Password Lama :</span>
    <input name="old_password" id="old_password" type="password" placeholder="password lama anda" class="input" style="width:320px;">
    <input name="password" type="hidden" id="password" value="<?= $data['password']; ?>">
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Password Baru :</span>
    <input name="new_password" type="password" id="new_password" min="5" placeholder="password baru anda" class="input"  style="width:320px;">
    
    <div style="height:10px">&nbsp;</div>
    
    <span class="label style78">Ulangi Password Baru :</span>
    <input name="repassword" type="password" id="repassword" placeholder="ulangi password baru anda" class="input" style="width:320px;">
    
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