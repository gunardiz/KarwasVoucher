<?php 
ini_set( "display_errors", 0);
include"login/session.php";
include "konfigurasi.php";

# Penyimpanan
$idubah = $_REQUEST['idubah'];
$sql = "SELECT * FROM home WHERE id_home='$idubah'";
$qry = mysql_query($sql, $koneksi) 
	 or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);

# Baca variabel URL (If Register Global ON)

?>
<head>
<script type="text/javascript" src="../jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "silver",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : false,

		// Example word content CSS (should be your site CSS) this one removes paragraph margins
		content_css : "css/word.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php 
include "konfigurasi.php";
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<body>
<div id="main-search" align='center' style="max-width:100%;">
<span class="style228">Ubah Konten Home</span>
</div>

<div id="main-nobg2"> 
<div align="center" class="table-box-scroll-X2">
<div align="center" class="table-container-500">
<div align="center" class="table-content-scroll-Y2">
<div align="center" class="table-content-container-fixed">
 	<form name="form1" method="post" action="proses.edithome.php">
  	<table width="650" class="content-edit">
    <tr>
    <td align="justify">
    <textarea name="konten" type="text" id="konten" style="width: 100%; height:470;" class="tinymce"><?= $data['konten']; ?></textarea>
 	<input type="submit" name="Submit" class="content-edit-button" value="Simpan">
    </td>
    </tr>
    <tr>
    <td>
 	<input name="id_home" type="hidden" value="<?= $idubah; ?>">
    </td>
    </tr>
    </table> 	
    </form>
</div>
</div>
</div>
</div>
</div>
</body>