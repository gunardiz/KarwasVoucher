<?php
include "../login/konfigurasi.php";
include "../includes/fungsi_indotgl.php";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="../js/jquery.ba-hashchange.js"></script>       
<script type="text/javascript" src="../js/sidetabs.js"></script>
<script src="../js/animation.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jquery.colorbox.js"></script>
<script language="JavaScript" type="text/javascript">
function roll_over(img_name, img_src)
{
document[img_name].src = img_src;
};
</script>
 <script type="text/javascript">
		$(document).ready(function() {
		$(".tambahforum_form").colorbox();
		});
	</script>
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

<?php function lists(){
	if($_POST['cari']){ 
	$query	= $_POST['query'];
	$tipe	= $_POST['tipe'];
	$wh		= "and $tipe LIKE '%$query%' ";
}
?>
<?php include "konfigurasi.php";?>
</head>
<body>
<div id="main-search" align='center' style="max-width:100%;">
<table width="100%">
<tr>
<td width="80%">
<div class="style27">forum Perbaikan</div>
</td>
<td align="right" width="20%">
<div class="form-search">
<a href="tambahforum.php?idtambah=<? echo $data[id_tambah]; ?>" title="Tambah Komentar" class="tambahforum_form">
<button class="button">Tambah Komentar</button></a>
</div>
</td>
<td align="right" width="auto">
<div class="form-search">
<a href="../export/forum_ex.php" target="_blank"><button class="excel"><img src="../images/printer.png" align="absbottom" width="16" height="16" /></button></a>
</div>
</td>
</tr>
</table>
</div>

<div id="main-nobg2">
<div style="height:80%; width:100%;scroll-color:hidden;"> 

		<section id="wrapper" class="wrapper">
            <div id="v-nav">
                <ul>
                <?php $dataPerPage = 30;
				if(isset($_GET['pages'])){$noPage = $_GET['pages'];} 
				else{$noPage = 1;}
				$z		= 1;
				$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM forum$wh");
				$row	= mysql_fetch_array($pag);
 				$jumData = $row['jumData'];
 				$jumPage = ceil($jumData/$dataPerPage);
 				$offset = ($noPage - 1) * $dataPerPage;
				$query	= mysql_query( "SELECT * FROM forum, user WHERE user.id_user=forum.id_user $wh	ORDER BY id_forum DESC LIMIT $offset, $dataPerPage");
				$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
				while($data	= mysql_fetch_array($query)){
				$tgl_input = tgl_indo($data['tgl_input']);
	
				?>
                    <li tab="tab<?php echo $data['id_forum']; ?>">
                    <table width="200" class="forum-table">
                    <tr>
                    <td rowspan="2" width="40px" align="center" class="forum-table-tgl"><div class="style_forum_nomer"><?php echo $tgl_input; ?></div></td>
					<td width="auto"><div class="style_forum_nama"><?php echo $data['nm_lengkap']; ?></div></td>
                    </tr>
                    <tr>
                    <td><div class="style_forum_bidang"><?php echo $data['detail_bidang']; ?></div></td>
                    </tr>
                    </table>
                    </li>
				<?php $i++; $z++;}?>
                </ul>
				<?php $dataPerPage = 30;
				if(isset($_GET['pages'])){$noPage = $_GET['pages'];} 
				else{$noPage = 1;}
				$z		= 1;
				$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM forum$wh");
				$row	= mysql_fetch_array($pag);
 				$jumData = $row['jumData'];
 				$jumPage = ceil($jumData/$dataPerPage);
 				$offset = ($noPage - 1) * $dataPerPage;
				$query	= mysql_query( "SELECT * FROM forum, user WHERE user.id_user=forum.id_user $wh	ORDER BY id_forum DESC LIMIT $offset, $dataPerPage");
				$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
				while($data2	= mysql_fetch_array($query)){
				$tgl_input = tgl_indo($data['tgl_input']);
	
				?>
                <div class="tab-content border-forum effect8">
                
                <div class="content-container">
                <?php  ini_set( "display_errors", 0);	 
				$allow = $_SESSION[id_usr];
				$usr = $data2['id_user'];
	 
				if ($allow == $usr){ echo "
				<div class='saran_hapus'>
				<a href='hapusforum.php?idhapus=$data2[id_forum]' title='Hapus forum' onClick=\"return confirm('return confirm('Hapus forum?')\">
				<img src='../images/delete.png' width='10' height='10' border='0' align='absmiddle' /></a>
				</div>"; }
			
				else{ echo ""; }?>
				<?php echo $data2['isi_forum']; ?>
				</div>
                </div>
                <?php $i++; $z++;}?>
            </div>

		</section>
</div>
</div>
<?php }?>
</body>