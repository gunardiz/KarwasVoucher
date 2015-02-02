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
		$(".tambahsaran_form").colorbox();
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
<td width="100%" height="26" align="center">
<div class="style27"><strong>Bantuan</strong></div>
</td>
</tr>
</table>
</div>

<div id="main-nobg2">
<div style="height:85%; width:100%;scroll-color:hidden;"> 

		<section id="wrapper" class="wrapper">
            <div id="v-nav">
                <ul>
                <?php $dataPerPage = 30;
				if(isset($_GET['pages'])){$noPage = $_GET['pages'];} 
				else{$noPage = 1;}
				$z		= 1;
				$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM bantuan");
				$row	= mysql_fetch_array($pag);
 				$jumData = $row['jumData'];
 				$jumPage = ceil($jumData/$dataPerPage);
 				$offset = ($noPage - 1) * $dataPerPage;
				$query	= mysql_query( "SELECT * FROM bantuan ORDER BY id_bantuan DESC LIMIT $offset, $dataPerPage");
				$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
				while($data	= mysql_fetch_array($query)){
	
				?>
                    <li tab="tab<?= $i;?>">
                    <table width="200" class="saran-table">
                    <tr>
					<td width="auto"><div class="style_saran_nama"><?php echo $data['judul_bantuan']; ?></div></td>
                    </tr>
                    </table>
                    </li>
				<?php $i++; $z++;}?>
                </ul>
				<?php $dataPerPage = 30;
				if(isset($_GET['pages'])){$noPage = $_GET['pages'];} 
				else{$noPage = 1;}
				$z		= 1;
				$pag	= mysql_query("SELECT COUNT(*) AS jumData FROM bantuan$wh");
				$row	= mysql_fetch_array($pag);
 				$jumData = $row['jumData'];
 				$jumPage = ceil($jumData/$dataPerPage);
 				$offset = ($noPage - 1) * $dataPerPage;
				$query	= mysql_query( "SELECT * FROM bantuan ORDER BY id_bantuan DESC LIMIT $offset, $dataPerPage");
				$i		= $noPage + ($noPage - 1) * ($dataPerPage - 1);
				while($data2	= mysql_fetch_array($query)){
				$tgl_input = tgl_indo($data['tgl_input']);
	
				?>
                <div class="tab-content border-saran effect8">
                
                <div class="content-container">
                <?php  ini_set( "display_errors", 0);	 
				$allow = $_SESSION[bgn];
	 
				if ($allow == 'admin05'){ echo "
				<div class='saran_hapus'>
				<a href='hapussaran.php?idhapus=$data2[id_saran]' title='Hapus Saran' onClick=\"return confirm('return confirm('Hapus saran?')\">
				<img src='../images/delete.png' width='10' height='10' border='0' align='absmiddle' /></a>
				</div>"; }
			
				else{ echo ""; }?>
				<?php echo $data2['isi_bantuan']; ?>
				</div>
                </div>
                <?php $i++; $z++;}?>
            </div>

		</section>
</div>
</div>
<?php }?>
</body>