<?php
$get=$_GET['id'];
session_start();
?>
<!doctype html>
<html lang="en-US">
<?php
error_reporting(0); ?>

<script language="javascript">
function informasi(){
var info="Maaf..!\n\n";
if(document.ok.username.value.length==0)
{
info=info+"*"+ "Username Belum Diisi\n";
}
if(document.ok.password.value.length==0)
{
info=info+"*"+ "Password Belum Diisi\n";
}

if(info.length>10){
info=info+"\n"+"Semua Harus Terisi Dengan Benar..!";
alert(info);
return false;
}else{
return true;
}
}
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KARWAS | Login</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="shortcut icon" href="favicon.png" type="image/icon">
</head>

<body>
<a href="login/cr.php" target="_blank"><img src="images/cr.png" width="10" height="10"></a>
<center>
<div align="center" class="form_title-container">
	<!-- ### Ribbon ### -->
	<div class="form_title-left">Karwas Voucher&nbsp;</div>
	<div class="form_title-right"><strong>KV</strong></div>
</div>
</center>

<div id="login">
<form id="ok" name="ok" method="post" action="login/akses.php" onSubmit="return informasi()">
	<p>
    <span class="username">
    <div class="icon">
		<div class="user"></div>
		<div class="neck"></div>
		<div class="shoulder"></div>
	</div>
    </span><input type="text" placeholder="Username" name="username" required/></p>
	<p><span class="password">
    <!-- ### Key ### -->
	<div class="icon">
		<div class="key_base"></div>
		<div class="key_squares"></div>
	</div>
    </span><input type="password" name="password" placeholder="Password" required/></p>
    <p><input type="submit" name="submit" value="login" /></p>
</form>
</div>

<center>
<div align="center">
<?php if ($get==1) { echo "<span class='failed'><span class='blink'><img src='images/warning.png' width='16' height='16'> Invalid Username or Password!</span></span>"; };?>

<?php if ($get==2) { echo "
<div class='failed'>
<div class='blink'><img src='images/warning.png' width='16' height='16'> Your account has been DISABLED!!</div>
<div class='blink'>Please contact your account administrator for further information!</div>
</div>"; };?>
</div>
</center>
<div id="footer" align="center">
<center><div id="logo-footer-separator"></div></center>

<div id="logo_container">
<img src="images/logo_menkeu_bw.png" width="65" height="62" class="logo_image">
<img src="images/logo_lpse_bw.png" width="98" height="40" class="logo_image">
</div>

<center><div id="logo-footer-separator"></div></center>

<p>KARWAS VOUCHER</p>
<p>Copyright &copy; <?php echo date('Y'); ?> Pusat Layanan Pengadaan Secara Elektronik (PLPSE)</p>
<p>Created by <b>Adam Gunardi &amp; Rachman Sukri</b></p>
</div>
<!-- footer ends-->
</body>
</html>