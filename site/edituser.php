<?php 

include "../login/konfigurasi.php";

# Baca variabel URL (If Register Global ON)
$idubah = $_REQUEST['idubah'];

# Penyimpanan
$sql = "SELECT * FROM user WHERE id_user='$idubah'";
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
<form id="form1" method="post" action="proses.edituser.php">
  <div class="form-row">
  <span class="label"><b>Username *</b></span>
  <input name="username" required type="text" id="username" value="<?= $data['username']; ?>" class="input" size="40">
  </div>
  
  <div class="form-row">
  <span class="label"><b>Password *</b></span>
  <input name="password" required type="text" id="password" value="<?= $data['password']; ?>" class="input" size="40">
  </div>
  <div class="form-row">
  <span class="label"><b>Nama Lengkap *</b></span>
  <input name="nm_lengkap" required type="text" id="nm_lengkap" value="<?= $data['nm_lengkap']; ?>" class="input" size="40">
  </div>
  <div class="form-row">
  <span class="label"><b>Nip *</b></span>
  <input name="nip" type="text" required value="<?= $data['nip']; ?>" class="input" size="40">
  </div>
  <div class="form-row">
  <span class="label"><b>Pangkat *<b></span>
  <input name="pangkat" type="text" required id="pangkat" value="<?= $data['pangkat']; ?>" class="input" size="40">
  </select>
  </div>    
  <div class="form-row">
  <span class="label"><b>Jabatan *</b></span>
  <input name="jabatan" type="text" required id="jabatan" value="<?= $data['jabatan']; ?>" class="input" size="40">
  </select>
  </div>    
  <div class="form-row">
  <span class="label"><b>Role *</b></span>
  <select name="role" class="input" id="role" required>
  <option selected="selected" value="<?php echo $data['role'];?>"><?= $data['role']; ?></option>
  <option value="admin" >Admin</option>
  <option value="petugas" >Petugas</option>
  <option value="kasubag" >Kasubag RT</option>
  <option value="ppk" >PPK</option>
  <option value="bendahara" >Bendahara</option>
  </select>
  </div>
  <div class="form-row">
  <span class="label"><b>Status *</b></span>
  <select name="status" class="input" id="status" required>
  <option selected="selected" value="<?php echo $data['status'];?>"><?= $data['status']; ?></option>
  <option value="aktif" >Aktif</option>
  <option value="Inaktif" >Inaktif</option>
  </select>
  </div>

  <div class="form-bgbutton">
  <span class="label"></span>
  <input type="submit" name="Submit" class="submit" value="Simpan Kembali">
  <a href="index.php?index=data_user"><input type="button" name="Button" class="cancel" value="Batal"></a>
  <input name="id_user" type="hidden" value="<?= $data['id_user']; ?>">
  </div>
</form>
</div>

</body>
</html>