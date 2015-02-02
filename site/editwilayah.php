<?php 

include "../login/konfigurasi.php";

# Baca variabel URL (If Register Global ON)
$idubah = $_REQUEST['idubah'];

# Penyimpanan
$sql = "SELECT * FROM wilayah WHERE id_wilayah='$idubah'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
?>
<html>
<head>
<title>Tambah Dokumen</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script type="text/javascript" src="../js/jquery-1.5.2.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.js"></script>
	<script type="text/javascript" src="../executive/js/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="../executive/js/ui/jquery.ui.widget.js"></script>
</head>
<link rel="shortcut icon" href="favicon.png" type="image/icon">
<body>
<div class="form-div">
<form id="form1" method="post" action="proses.editwilayah.php">
  <div class="form-row">
  <span class="label"><b>Wilayah *</b></span>
  <input name="nm_wilayah" required type="text" id="nm_wilayah" value="<?= $data['nm_wilayah']; ?>" class="input" size="40">
  </div>

  <div class="form-bgbutton">
  <span class="label"></span>
  <input type="submit" name="Submit" class="submit" value="Simpan Kembali">
  <a href="index.php?index=wilayah"><input type="button" name="Button" class="cancel" value="Batal"></a>
  <input name="id_wilayah" type="hidden" value="<?= $data['id_wilayah']; ?>">
  </div>
</form>
</div>

</body>
</html>