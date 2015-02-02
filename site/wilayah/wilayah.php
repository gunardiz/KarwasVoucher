<?php
include "../login/konfigurasi.php";
include "../includes/fungsi_indotgl.php";
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
<?php switch ($_GET['aksi']){
	default: lists(); break;
	case "list": lists(); break;
	case "dellist";	del(); lists(); break;
}
?>

<?php function lists(){
	if($_POST['cari']){ 
	$query	= $_POST['query'];
	$tipe	= $_POST['tipe'];
	$wh		= "WHERE $tipe LIKE '%$query%' ";
}
?>

<?php 
include "konfigurasi.php";
?>

<div id="main-search" align='center' style="max-width:100%;">
<table width="100%">
<tr>
<td width="40%">
<span class="style27">Daftar <b>Wilayah</b></span>
</td>
<td align="right" width="59%">
<div class="form-search">
	<form id="form1" name="form1" method="post" action="">
        <select name="tipe" id="tipe" class="input">
		  <option value="nm_wilayah" selected="selected">Nama Wilayah</option>
        </select>
        <input name="query" type="text"  class="input" placeholder="cari..." id="query" size="30" />
        <input name="cari" type="submit" id="cari" class="look" value="L" />
        
	  <?php 
	  $role 	= $_SESSION[role];
	  if($role=='admin'){
	  ?>
	  <a href="tambahwilayah.php" title="Tambah Wilayah" class="overlay">
	  <button class="button"><span class="sym-white3">+</span> Tambah</button>
	  </a>
      <?php } else {echo"";}?>
    </form>
    </div>
</td>
</tr>
</table>
</div>

<div id="main-table"> 
<div align="center" class="table-box-scroll-X">
<div align="center" class="table-container-950">
<div class="table-header-scroll-Y">
<table id="table-header" width="100%" border="0" height="30" cellpadding="1" cellspacing="0" bordercolor="E4E3E1">
	<tr align="center">
      <td width="50" id="table-left"><div align="center" class="style21">No</div></td>
      <td width="500" align="left"><div class="style21">Nama Wilayah</div></td>
      <td width="53" id="table-right"><div class="style21"><span class="sym-white2">+</span> Aksi</div></td>
    </tr>
</table>
</div>

<div align="center" class="table-content-scroll-Y">
<div align="center" class="table-content-container">   
<table width="100%" class="hovered" height="30" border="0" cellpadding="1" cellspacing="0" bordercolor="E4E3E1">
<?php $dataPerPage = 30;
	if(isset($_GET['pages'])) { $noPage = $_GET['pages']; } 
	else { $noPage = 1; }
	
	$z		= 1;
	$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM wilayah$wh");
	$row	= mysql_fetch_array($pag);
	$jumData = $row['jumData'];
	$jumPage = ceil($jumData/$dataPerPage);
	$offset = ($noPage - 1) * $dataPerPage;
	
	$query	= mysql_query( "SELECT * FROM wilayah $wh ORDER BY nm_wilayah ASC LIMIT $offset, $dataPerPage");
	//$noPage = $_GET['pages'];
	$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
	while($data	= mysql_fetch_array($query)){
	?>
    
    <tr id="zebra1" >
    <td id="table-rec-left" align="center" width="50" height="30"><?= $i;?></td>
    <td width="500" ><div style="margin-left:3px; margin-right:3px;"><?php echo $data['nm_wilayah']; ?></div></td>
     
    <td align="center" width="53" class="style21x col-act">
	<?php ini_set( "display_errors", 0);
	$allow   = $_SESSION[role];
	$bagian  = $data['role'];
	$qDoc	= mysql_query("SELECT COUNT(*) AS jumDoc FROM wilayah, data WHERE data.id_wilayah=$data[id_wilayah]");
	$rDoc	= mysql_fetch_array($qDoc);
	$jumDoc  = $rDoc['jumDoc'];
	 
	if ($allow == 'admin' and $jumDoc == '0'){ echo "
	<a href='editwilayah.php?idubah=$data[id_wilayah]' class='overlay' title='Ubah Data Wilayah : $data[nm_wilayah]'>
	<button class='edit'><img src='images/edit.png' width='14' height='14' border='0' align='absmiddle' /></button> </a>
	<a href='hapuswilayah.php?idhapus=$data[id_wilayah]' title='Hapus Data Wilayah : $data[nm_wilayah]' onClick=\"return confirm('Anda yakin untuk menghapus data ini?')\">
	<button class='delete'><img src='images/b_drop.png' width='14' height='14' border='0' align='absmiddle' /></button></a>"
	; }
	
	else if ($allow == 'admin' and $jumDoc >= '1'){ echo "
	<a href='editwilayah.php?idubah=$data[id_wilayah]' class='overlay' title='Ubah Data Wilayah : $data[nm_wilayah]'>
	<button class='edit'><img src='images/edit.png' width='14' height='14' border='0' align='absmiddle' /></button> </a>
	<button class='dis' title='Masih terdapat data yang menggunakan wilayah ini !'>
	<img src='images/b_drop_dis.png' width='14' height='14' border='0' align='absmiddle' />
	</button>"
	; }
					
	else { echo " 	
	<button class='dis' title='Disabled'><img src='images/edit_dis.png' width='14' height='14' border='0' align='absmiddle' /></button>
	<button class='dis' title='Disabled'><img src='images/b_drop_dis.png' width='14' height='14' border='0' align='absmiddle' /></button>" 
	; } ?>
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
</body>