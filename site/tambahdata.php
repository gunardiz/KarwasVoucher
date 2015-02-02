<?php 
ini_set( "display_errors", 0);
include"../login/session.php";
include "konfigurasi.php";

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
<form id="form1" method="post" enctype="multipart/form-data" action="proses.tambahdata.php">
	<?php 
	$role 	= $_SESSION[role];
	if($role=='petugas'){
	?>
	<div class="form-row">
    <span class="label"><b>Berkas diterima Petugas *</b></span>
    <input name="tgl_diterima_petugas" type="text" id="datepicker" required class="input" size="20">
    </div>
    <div class="form-row">
    <span class="label"><b>Unit Layanan *</b></span>
    <select name="unit_layanan" class="input" id="unit_layanan" required>
  		<option selected="selected" value="">-pilih-</option>
		<option value="LPSE" >LPSE</option>
		<option value="ULPD" >ULPD</option>
	</select>
   	</div>
    <div class="form-row">
	<span class="label"><b>Wilayah *</b></span>
    <select name="id_wilayah" class="input" id="id_wilayah" required>
  		<option selected="selected" value="">-pilih-</option>
		<?php $q1	= mysql_query( "SELECT * FROM wilayah"); 
		while($d1= mysql_fetch_array($q1)){ ?>
		<option value="<?php echo $d1['id_wilayah'];?>" ><?php echo $d1['nm_wilayah'];?></option><?php }?>
	</select>
	</div>
	<div class="form-row">
    <span class="label"><b>Jenis Dokumen *</b></span>
    <select name="jenis_dokumen" class="input" id="jenis_dokumen" required>
  		<option selected="selected" value="">-pilih-</option>
		<option value="Uang Muka" >Uang Muka</option>
		<option value="SPJ" >SPJ</option>
	</select>
	</div>    
    <div class="form-row">
    <span class="label"><b>Periode (Bulan) *</b></span>
    <select name="periode" class="input" id="periode" required>
  		<option selected="selected" value="">-pilih-</option>
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
    <input name="nilai_pengajuan" type="number" class="input" size="20" required>
    </div>
    <div class="form-row">
    <span class="label"><b>Upload Dokumen(PDF) *</b></span>
    <input type="hidden" name="MAX_FILE_SIZE"   value="50000000">
    <input name="fupload1" type="file" id="fupload1" onChange="return checkFileExtension(this);" size="20"/> 
    </div>
    
    
    <div class="form-row">
	<span class="label"><b>Catatan</b></span>
	<textarea type="text" style="height:80px;" class="input" name="catatan"></textarea>
	</div>
    
	<div class="form-bgbutton">
  	<input type="submit" name="Submit" value="Simpan" class="submit">
    <?php } else {echo"Y U DO DIS ??";}?>
  	<a href="index.php?index=data"><input name="Submit3" type="button" value="Batal" class="cancel"></a>      
  	<input type="reset" value="Reset" class="reset">       
  	</div>
    </form>
</div>
</body>
</html>