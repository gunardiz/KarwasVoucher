<?php 

include "../login/konfigurasi.php";

# Baca variabel URL (If Register Global ON)
$idubah = $_REQUEST['idubah'];

# Penyimpanan
$sql = "SELECT * FROM user WHERE id_anggota='$idubah'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);



?>
<html>
<head>
<title>Tambah Dokumen</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="css/val.css" type="text/css" />
  <link rel="stylesheet" href="../executive/js/themes/sunny/jquery-ui-1.8.14.custom.css">
  <link rel="stylesheet" href="css/valnews.css" type="text/css" />
  <link rel="stylesheet" href="js/demos.css">
  
  <script type="text/javascript" src="js/jquery-1.5.2.js"></script>
  <script type="text/javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" src="jscripts/tiny_mce/jquery.tinymce.js"></script>
	<script type="text/javascript" src="../executive/js/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../executive/js/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../executive/js/ui/jquery.ui.datepicker.js"></script>
	<script type="text/javascript">
	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: 'button', 
			buttonImage: 'images/calendar.gif', 
			buttonImageOnly: true,
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd MM yy'
		});
	});
	</script>
  <script type="text/javascript">
		$(document).ready(function() {
			$("#form1").validate({
				rules: {
				  judul: {
				  required: true
				  },
				  no_prosedur: {
  				  required: true
				  }
				},
			
      	messages: { 
				judul: {
				    required: '. NIK harus diisi'
			    },
			    no_prosedur: {
				    required: '. Pendidikan harus diisi'
			    }
			   }
			});
		});
	</script>
    
  
</head>
<link rel="shortcut icon" href="favicon.png" type="image/icon">
<body>
    <div class="form-div">
<form name="form1" method="post" action="proses.editprofil.php">
  <div class="form-row">
          <span class="label"><b>Username</b></span>
          <input name="username" type="text" id="alamat" value="<?= $data['username']; ?>" size="40">
      
      </div>
      <div class="form-row">
          <span class="label"><b>NIP</b></span>
          
        <input name="nip" type="text" id="nip" value="<?= $data['nip']; ?>" size="40">
      
      </div>
      <div class="form-row">
          <span class="label"><b>Nama Lengkap</b></span>
          
        <input name="nama_lengkap" type="text" id="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" size="40">
      
      
      </div>
      <div class="form-row">
          <span class="label"><b>Password</b></span>
        <input name="password" type="text" id="password" value="<?= $data['password']; ?>" size="40">
      </div>
      
      <div class="form-row">
          <span class="label"></span>
          <input type="submit" name="Submit" class="submit" value="Simpan Kembali">
        <input name="id_anggota" type="hidden" value="<?= $data['id_anggota']; ?>">
   </div> <br>
</form>
   </div></div>

</body>
</html>