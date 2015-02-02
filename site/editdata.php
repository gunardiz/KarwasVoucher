<?php 
ini_set( "display_errors", 0);
include"../login/session.php";
include "konfigurasi.php";
include "../includes/fungsi_indotgl.php";

# Baca variabel URL (If Register Global ON)
$idubah = $_REQUEST['idubah'];
$file2 = $_REQUEST['file2'];
# Penyimpanan
$sql = "SELECT * FROM data WHERE id_dokumen='$idubah'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
$tgl_diterima_petugas	= tgl_indo($data['tgl_diterima_petugas']);
$tgl_diterima_ppk		= tgl_indo($data['tgl_diterima_ppk']);
$tgl_diterima_bendahara  = tgl_indo($data['tgl_diterima_bendahara']);
$tgl_diterima_kasubag	= tgl_indo($data['tgl_diterima_kasubag']);
$tgl_transfer			= tgl_indo($data['tgl_transfer']);
$tgl_drpp				= tgl_indo($data['tgl_drpp']);

?>

<html>
<head>
<title>Edit Dokumen</title>
<link rel="shortcut icon" href="favicon.png" type="image/icon">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="../js/jquery-1.5.2.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../executive/js/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="../executive/js/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="../executive/js/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript">
$(function() {
	$( "#datepicker" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker2" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker3" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker4" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker5" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
	$( "#datepicker6" ).datepicker({
		showOn: 'button', 
		buttonImage: 'images/calendar.gif', 
		buttonImageOnly: false,
		changeMonth: true,
		changeYear: true,
		altField: "#alternate",
        altFormat: "DD, d MM, yy",
		dateFormat: 'yy-mm-dd'
	});
});
</script>
<script type="text/javascript">
 function checkFileExtension(elem) {
        var filePath = elem.value;
		
        if(filePath.indexOf('.') == -1)
            return (false);
        
        var validExtensions = new Array();
        var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    
        validExtensions[0] = 'pdf';
        validExtensions[1] = 'pdf';
    
        for(var i = 0; i < validExtensions.length; i++) {
            if(ext == validExtensions[i])
                return (true);
        }

        alert('file dengan ekstensi ' + ext.toUpperCase() + ' tidak dapat diupload! ulangi proses!');
		form.fupload1.focus();
        return (true);
    }
</script>
</head>
<body>
<div class="form-div">
<form id="form1" method="post" enctype="multipart/form-data" action="proses.editdata.php">

	<?php	 
	$allow = $_SESSION[role];
	if ($allow == 'petugas'){
	?>
	<div class="form-row">
    <span class="label"><b>Berkas diterima Petugas *</b></span>
    <input name="tgl_diterima_petugas" type="text" id="datepicker" required class="input" value="<?= $data['tgl_diterima_petugas']; ?>" size="20">
    </div>
    <div class="form-row">
    <span class="label"><b>Unit Layanan *</b></span>
    <select name="unit_layanan" class="input" id="unit_layanan" required>
  		<option selected="selected" value="<?= $data['unit_layanan']; ?>"><?= $data['unit_layanan']; ?></option>
		<option value="LPSE" >LPSE</option>
		<option value="ULPD" >ULPD</option>
	</select>
   	</div>
    <div class="form-row">
	<span class="label"><b>Wilayah *</b></span>
    <select name="id_wilayah" class="input" id="id_wilayah" required>
		<?php $q	= mysql_query( "SELECT * FROM wilayah WHERE id_wilayah=$data[id_wilayah]"); 
  		$d= mysql_fetch_array($q); ?>
  		<option selected="selected" value="<?php echo $d['id_wilayah'];?>"><?= $d['nm_wilayah']; ?></option>
		<?php $q1	= mysql_query( "SELECT * FROM wilayah"); 
		while($d1= mysql_fetch_array($q1)){ ?>
		<option value="<?php echo $d1['id_wilayah'];?>" ><?php echo $d1['nm_wilayah'];?></option><?php }?>
	</select>
	</div>
	<div class="form-row">
    <span class="label"><b>Jenis Dokumen *</b></span>
    <select name="jenis_dokumen" class="input" id="jenis_dokumen" required>
  		<option selected="selected" value="<?= $data['jenis_dokumen']; ?>"><?= $data['jenis_dokumen']; ?></option>
		<option value="Uang Muka" >Uang Muka</option>
		<option value="SPJ" >SPJ</option>
	</select>
	</div>    
    <div class="form-row">
    <span class="label"><b>Periode (Bulan) *</b></span>
    <select name="periode" class="input" id="periode" required>
  		<option selected="selected" value="<?= $data['periode']; ?>"><?= $data['periode']; ?></option>
		<option value="Januari" >Januari</option>
		<option value="Februari" >Februari</option>
		<option value="Maret" >Maret</option>
		<option value="April" >April</option>
		<option value="Mei" >Mei</option>
		<option value="Juni" >Juni</option>
		<option value="Juli" >Juli</option>
		<option value="Agustus" >Agustus</option>
		<option value="September" >September</option>
		<option value="Oktober" >Oktober</option>
		<option value="November" >November</option>
		<option value="Desember" >Desember</option>
	</select>
    </div>
    <div class="form-row">
    <span class="label"><b>Nilai Pengajuan *</b></span>
    <input name="nilai_pengajuan" type="number" class="input"  value="<?= $data['nilai_pengajuan']; ?>" size="20" required>
    </div>
    <div class="form-row">
    <span class="label"><b>Upload Dokumen(PDF) *</b></span>
    <input type="hidden" name="MAX_FILE_SIZE"   value="50000000">
    <input name="fupload1" type="file" id="fupload1" onChange="return checkFileExtension(this);" size="20"/> 
    </div>
    
    <?php }else {?>
    <div class="form-row">
    <span class="label"><b>Berkas diterima Petugas</b></span>
    <?php echo $tgl_diterima_petugas; ?>
    </div>
    <div class="form-row">
    <span class="label"><b>Unit Layanan</b></span>
    <?php echo $data['unit_layanan']; ?>
    </div>
    <div class="form-row">
    <span class="label"><b>Wilayah</b></span>
	<?php $q	= mysql_query( "SELECT * FROM wilayah WHERE id_wilayah=$data[id_wilayah]"); 
	$d= mysql_fetch_array($q); ?>
    <?= $d['nm_wilayah']; ?>
    </div>
    <div class="form-row">
    <span class="label"><b>Jenis Dokumen</b></span>
    <?php echo $data['jenis_dokumen']; ?>
    </div>
    <div class="form-row">
    <span class="label"><b>Periode(Bulan)</b></span>
    <?php echo $data['periode']; ?>
    </div>
    <div class="form-row">
    <span class="label"><b>Nilai Pengajuan</b></span>
    <?php echo $data['nilai_pengajuan']; ?>
    </div>
    <?php }?>
    
    
	<?php	 
	$allow = $_SESSION[role];
	if ($allow == 'kasubag'){
	?>
    <div class="form-row">
	<span class="label"><b>Diterima Kasubag RT *</b></span>
	<input type="text" size="20" required id="datepicker2" value="<?php echo $data['tgl_diterima_kasubag'];?>" class="input" name="tgl_diterima_kasubag">
	</div>
    <div class="form-row">
	<span class="label"><b>Status *</b></span>
    <select name="status1" class="input" id="status1" required>
  		<option selected="selected" value="<?= $data['status1']; ?>"><?= $data['status1']; ?></option>
		<option value="Disetujui" >Disetujui</option>
		<option value="Dikembalikan" >Dikembalikan</option>
	</select>
	</div>
    
    <?php }else {?>
    <div class="form-row">
    <span class="label"><b>Diterima Kasubag RT</b></span>
    <?php ini_set( "display_errors", 0);
	$tgl1 = $data['tgl_diterima_kasubag'];
	if 	 ($tgl1 == '0000-00-00'){ echo "-"; }
	else 						  { echo $tgl_diterima_kasubag; }
	?>
    </div>
    <div class="form-row">
    <span class="label"><b>Status</b></span>
    <?php if ((!empty ($data['status1']))){echo $data['status1']; }else{echo"-";};?>
    </div>
    <?php }?>
    
    
	<?php	 
	$allow = $_SESSION[role];
	if ($allow == 'ppk'){
	?>
    <div class="form-row">
	<span class="label"><b>Diterima PPK *</b></span>
	<input type="text" size="20" id="datepicker3" value="<?php echo $data['tgl_diterima_ppk'];?>" class="input" name="tgl_diterima_ppk" required>
	</div>
    <div class="form-row">
	<span class="label"><b>Status *</b></span>
    <select name="status2" style="width:200px;" class="input" id="status2" required>
  		<option selected="selected" value="<?= $data['status2']; ?>"><?= $data['status2']; ?></option>
		<option value="Disetujui" >Disetujui</option>
		<option value="Dikembalikan" >Dikembalikan</option>
	</select>
	</div>
    
    <?php }else {?>
    <div class="form-row">
    <span class="label"><b>Diterima PPK</b></span>
    <?php ini_set( "display_errors", 0);
	$tgl2 = $data['tgl_diterima_ppk'];
	if 	 ($tgl2 == '0000-00-00'){ echo "-"; }
	else 						  { echo $tgl_diterima_ppk; }
	?>
    </div>
    <div class="form-row">
    <span class="label"><b>Status</b></span>
    <?php if ((!empty ($data['status2']))){echo $data['status2']; }else{echo"-";};?>
    </div>
    <?php }?>
    
    
	<?php	 
	$allow = $_SESSION[role];
	if ($allow == 'bendahara'){
	?>
    <div class="form-row">
	<span class="label"><b>Diterima Bendahara</b></span>
	<input type="text" size="20" id="datepicker4" value="<?php echo $data['tgl_diterima_bendahara'];?>" class="input" name="tgl_diterima_bendahara">
	</div>
    <div class="form-row">
	<span class="label"><b>Tanggal Transfer</b></span>
	<input type="text" size="20" id="datepicker5" value="<?php echo $data['tgl_transfer'];?>" class="input" name="tgl_transfer">
	</div>
    <div class="form-row">
	<span class="label"><b>Nilai Transfer</b></span>
	<input type="number" size="20" value="<?php echo $data['nilai_transfer'];?>" class="input" name="nilai_transfer">
	</div>
    <div class="form-row">
    <span class="label"><b>Upload Bukti Transfer(PDF)</b></span>
    <input type="hidden" name="MAX_FILE_SIZE"   value="50000000">
    <input name="fupload2" type="file" id="fupload2" onChange="return checkFileExtension(this);" size="20"/> 
    </div>
    <div class="form-row">
	<span class="label"><b>Tanggal DRPP</b></span>
	<input type="text" size="20" id="datepicker6" value="<?php echo $data['tgl_drpp'];?>" class="input" name="tgl_drpp">
	</div>
    <div class="form-row">
	<span class="label"><b>Nomor DRPP</b></span>
	<input type="text" size="20" value="<?php echo $data['no_drpp'];?>" class="input" name="no_drpp">
	</div>
    
    <?php }else {?>   
    <div class="form-row">
    <span class="label"><b>Diterima Bendahara</b></span>
    <?php ini_set( "display_errors", 0);
	$tgl3 = $data['tgl_diterima_bendahara'];
	if 	 ($tgl3 == '0000-00-00'){ echo "-"; }
	else 						  { echo $tgl_diterima_bendahara; }
	?>
    </div>
    <div class="form-row">
    <span class="label"><b>Tanggal Transfer</b></span>
    <?php ini_set( "display_errors", 0);
	$tgl4 = $data['tgl_transfer'];
	if 	 ($tgl4 == '0000-00-00'){ echo "-"; }
	else 						  { echo $tgl_transfer; }
	?>
    </div>
    <div class="form-row">
    <span class="label"><b>Nilai Transfer</b></span>
    <?php if ((!empty ($data['nilai_transfer']))){echo "Rp $nilai_transfer"; }else{echo"-";};?>
    </div>
    <div class="form-row">
    <span class="label"><b>Tanggal DRPP</b></span>
    <?php ini_set( "display_errors", 0);
	$tgl5 = $data['tgl_drpp'];
	if 	 ($tgl5 == '0000-00-00'){ echo "-"; }
	else 						  { echo $tgl_drpp; }
	?>
    </div>
    <div class="form-row">
    <span class="label"><b>Nomor DRPP</b></span>
    <?php if ((!empty ($data['no_drpp']))){echo $data['no_drpp']; }else{echo"-";};?>
    </div>
    <?php }?>
    
    
    <div class="form-row">
	<span class="label"><b>Catatan</b></span>
	<textarea type="text" style="height:80px;" class="input" name="catatan"><?php echo $data['catatan'];?></textarea>
	</div>
    
	<div class="form-bgbutton">
  	<input type="submit" name="Submit" value="Simpan" class="submit">
  	<a href="index.php?index=data"><input name="Submit3" type="button" value="Batal" class="cancel"></a>      
  	<input type="reset" value="Reset" class="reset">       
  	<input name="id_dokumen" type="hidden" value="<?= $idubah; ?>">
  	<input name="name" type="hidden" value="<?php echo $data['name'];?>">
  	<input name="file2" type="hidden" value="<?php echo $file2;?>">
  	</div>
    </form>
</div>
</body>
</html>