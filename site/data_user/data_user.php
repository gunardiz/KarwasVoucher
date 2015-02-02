<?php
include "../login/konfigurasi.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="../js/animation.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.colorbox.js"></script>
<script language="JavaScript" type="text/javascript">
function roll_over(img_name, img_src){document[img_name].src = img_src;};
</script>
 <script type="text/javascript">
		$(document).ready(function() {
		$(".overlay").colorbox();
		});
	</script>
</head>
<body>
<?php
switch ($_GET['aksi']){
	default:
		lists();
	break;
	case "list":
		lists();
	break;
	
	case "dellist";
		del();
		lists();
	break;
}
?>

<?php
function lists(){

if($_POST['cari']){
	$query	= $_POST['query'];
	$tipe	= $_POST['tipe'];
	
	$wh		= " WHERE $tipe LIKE '%$query%'";
}
?>

<?php 
include "konfigurasi.php";
?>
<div id="main-search" align='center' style="max-width:100%;">
<table width="100%">
<tr>
<td align="left" width="40%">
<span class="style27">Daftar <b>Anggota</b></span>
</td>
<td align="right" width="59%">
<div class="form-search">
	<form id="form1" name="form1" method="post" action="">
        <select name="tipe" id="tipe" class="input">
          <option value="username" selected="selected">Username</option>
          <option value="nm_lengkap" selected="selected">Nama Lengkap</option>
		  <option value="nip">NIP</option>
          <option value="pangkat">Pangkat/Gol</option>
          <option value="jabatan">Jabatan</option>
          <option value="role">Role</option>
          <option value="status">Status</option>
        </select>
        <input name="query" type="text" id="query" class="input" size="30" placeholder="pencarian..."/>
        <input name="cari" type="submit" id="cari" value="L"  class="look"/>
		<a href="tambahuser.php?idtambah=<? echo $data[id_user]; ?>" title="Tambah Data Anggota" class="overlay">
        <button class="button"><span class="sym-white3">+</span> Tambah</button></a>
	</form>
</div>
</td>
</tr>
</table>
</div>

<div id="main-table"> 
<div align="center" class="table-box-scroll-X">
<div align="center" class="table-container-1150">
<div class="table-header-scroll-Y">
  <table id="table-header" width="100%" border="0" height="25" cellpadding="2" cellspacing="0" bordercolor="E4E3E1">
	<tr>
    <td width="40" height="25" id="table-left"><div align="center" class="style21">No</div></td>
    <td width="100"><div align="left" class="style21">Username</div></td>
    <td width="140"><div align="left" class="style21">Nama Lengkap</div></td>
	<td width="140"><div align="left" class="style21">NIP</div></td>
	<td width="140"><div align="left" class="style21">Pangkat/Gol</div></td>
	<td width="140"><div align="left" class="style21">Jabatan</div></td>
	<td width="100"><div align="left" class="style21">Role</div></td>
	<td width="63"><div align="center" class="style21">Status</div></td>
	<td width="65" id="table-right"><div align="center" class="style21">Aksi</div></td>
   </tr>
    </table>
</div>

<div align="center" class="table-content-scroll-Y">
<div align="center" class="table-content-container">  
  <table width="100%" class="hovered" height="25" border="0" cellpadding="2" cellspacing="0">
  <?php
	$dataPerPage = 30;
	if(isset($_GET['pages']))
	{
	    $noPage = $_GET['pages'];
	} 
	else
	{
		$noPage = 1;
	}
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM user$wh");
	$row	= mysql_fetch_array($pag);
 
	$jumData = $row['jumData'];
 
	$jumPage = ceil($jumData/$dataPerPage);
 
	


	$offset = ($noPage - 1) * $dataPerPage;
  	
	$query	= mysql_query( "SELECT * FROM user $wh ORDER BY nm_lengkap ASC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	
	?>
<tr>
<td align="center" width="40" height="30" id="table-rec-left"><?= $i;?></td>
<td width="100" ><div class="style21x"><?= $data['username'];?></div></td>
<td width="140"><div class="style21x"><?= $data['nm_lengkap'];?></div></td>
<td width="140"><div class="style21x"><?= $data['nip'];?></div></td>
<td width="140"><div class="style21x"><?= $data['pangkat'];?></div></td>
<td width="140"><div class="style21x"><?= $data['jabatan'];?></div></td>
<td width="100"><div class="style21x"><?= $data['role'];?></div></td>
<td align="center" width="63">
<?php ini_set( "display_errors", 0);	  
	  $lvl = $data['role'];
	  $bag = $_SESSION['role'];
	  $acc = $data['status'];  
if ($acc == 'aktif' and $bag == 'admin' and $lvl != 'admin')
{ echo " <a href='disable_user.php?idubah=$data[id_user]' onClick=\"return confirm('Nonaktifkan account : $data[nm_lengkap] ?')\"><div class='aktif' >Aktif</div></a> "; }

else if ($acc == 'inaktif' and $bag == 'admin' and $lvl != 'admin')
{ echo " <div class='inaktif' ><a href='enable_user.php?idubah=$data[id_user]' onClick=\"return confirm('Aktifkan account : $data[nm_lengkap] ?')\"><span style='color:#eee;'>Inaktif</span></a></div> "; }

else if ($acc == 'aktif' and $bag != 'admin' )
{ echo " <div class='aktif2' >Aktif</div> "; }

else if ($acc == 'inaktif' and $bag != 'admin')
{ echo " <div class='none2' >Inaktif</div> "; }
else if ($lvl == 'admin')
{echo "<div class='aktif2' title='Status akun permanen!'>Aktif</div>";}
?>
	</td>
    <td id="table-rec-right" align="center" width="65" class="col-act">
    <?php ini_set( "display_errors", 0);
	  
	  $lvl = $data['role'];
	  $bag = $_SESSION['role'];
$q_adm = mysql_num_rows(mysql_query("select * from user WHERE role='admin'"));
$ada = $q_adm; 
if ($bag == 'admin' and $lvl == 'admin' and $ada > 1) { echo "
    <a href='edituser.php?idubah=$data[id_user]' title='Ubah Data Anggota' class='overlay' target='_self'>
	<button class='edit'><img src='images/edit.png' width='14' height='14' border='0' align='absmiddle' /></button></a>
     <a href='hapususer.php?idhapus=$data[id_user]' onClick=\"return confirm('Anda yakin untuk menghapus account : $data[username] ?')\">
	 <button class='delete'><img src='images/b_drop.png' width='14' height='14' border='0' align='absmiddle' /></button></a>";}
     
else if ($bag == 'admin' and $lvl == 'admin' and $ada = 1) {echo "
    <button class='dis'><img src='images/edit_dis.png' width='14 height='14' border='0' align='absmiddle' title='Akun tidak dapat diubah!'/></button>
    <button class='dis'><img src='images/b_drop_dis.png' width='14' height='14' border='0' align='absmiddle' title='Akun tidak dapat dihapus!'/></button> ";}

else if ($bag == 'admin' and $lvl != 'admin' and ($ada > 1 or $ada = 1)) { echo "
    <a href='edituser.php?idubah=$data[id_user]' title='Ubah Data Anggota' class='overlay' target='_self'>
	<button class='edit'><img src='images/edit.png' width='14' height='14' border='0' align='absmiddle' /></button></a>
     <a href='hapususer.php?idhapus=$data[id_user]' onClick=\"return confirm('Anda yakin untuk menghapus account : $data[username] ?')\">
	 <button class='delete'><img src='images/b_drop.png' width='14' height='14' border='0' align='absmiddle' /></button></a>";}     

else if ($bag != 'admin') {echo "
    <button class='dis'><img src='images/edit_dis.png' width='14 height='14' border='0' align='absmiddle' title='Akun tidak dapat diubah!'/></button>
    <button class='dis'><img src='images/b_drop_dis.png' width='14' height='14' border='0' align='absmiddle' title='Akun tidak dapat dihapus!'/></button> ";}?></td>
  </tr>
 
  <?php $i++; $z++;}?>
 </table>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</body>