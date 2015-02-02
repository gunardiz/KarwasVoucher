<?php
ini_set( "display_errors", 0);
include"../login/session.php";
include "konfigurasi.php";
# Baca variabel URL (If Register Global ON)
$idtambah = $_REQUEST['idtambah'];

# Penyimpanan
$sql = "SELECT * FROM forum WHERE id_forum ='$idtambah'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="../js/jquery-1.5.2.js"></script>
  <script type="text/javascript" src="../jscripts/tiny_mce/jquery.tinymce.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.js"></script>
  <script type="text/javascript">
	$().ready(function() {
		$('textarea.tinymce').tinymce({
			// Location of TinyMCE script
			script_url : '../jscripts/tiny_mce/tiny_mce.js',

			// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",
			// Theme options
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,styleselect,formatselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,insertdate,inserttime,preview,|,forecolor,backcolor",
			theme_advanced_buttons3 : "sub,sup,|,charmap,emotions,iespell,|,ltr,rtl",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "false",
			theme_advanced_resizing : false,

			// Example content CSS (should be your site CSS)
			content_css : "css/word.css",

			// Drop lists for link/image/media/template dialogs

			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});
	});
</script>
</head>
<link rel="shortcut icon" href="favicon.png" type="image/icon">
<body>
    <div class="form-div">
	<form id="form1" method="post" enctype="multipart/form-data"  action="proses.tambahforum.php" name="form1">
      <div class="form-mce">
      <textarea name="isi_forum" type="text" id="isi_forum" class="tinymce" style="width:500;height:300px;"></textarea>
	  </div>
      <div class="form-bgbutton">
      <input type="submit" name="submit" value="Simpan" class="submit">
      <a href="index.php?index=forum"><input name="Submit3" class="cancel" type="button" value="Batal" ></a>
      <input type="reset" name="submit2" value="Reset" class="reset"> 
      <input type="hidden" value="<?php echo"$_SESSION[id_usr]";?>" name="id_user">    
      </div>
	</form>
	</div>
</body>
</html>