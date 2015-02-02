<?
function int_filter ($nama){
//memfilter karakter alpa menjadi kosong
if (is_numeric ($nama)){
return (int)preg_replace ( '/\D/i', '', $nama);
}
else {
    $nama = ltrim($nama, ';');
    $nama = explode (';', $nama);
    return (int)preg_replace ( '/\D/i', '', $nama[0]);
}
}

function text_filter($message, $type="") {

    if (intval($type) == 2) {
        $message = htmlspecialchars(trim($message), ENT_QUOTES);
    } else {
        $message = strip_tags(urldecode($message));
        $message = htmlspecialchars(trim($message), ENT_QUOTES);
    }
   
    return $message;
}

function sentmail($fromname,$fromemail,$to,$subject,$message){
		$lt			= '<';
		$gt			= '>';
		$sp			= ' ';
		$from		= 'From:';
		$headers	= $from.$fromname.$sp.$lt.$fromemail.$gt;

		@mail($to,$subject,$message,$headers);
}

function is_valid_email($mail) {
	// checks email address for correct pattern
	// simple: 	"/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*\.[a-z]{2,6}$/i"
	$r = 0;
	if($mail) {
		$p  =	"/^[-_a-z0-9]+(\.[-_a-z0-9]+)*@[-a-z0-9]+(\.[-a-z0-9]+)*\.(";
		// TLD  (01-30-2004)
		$p .=	"com|edu|gov|int|mil|net|org|aero|biz|coop|info|museum|name|pro|arpa";
		// ccTLD (01-30-2004)
		$p .=	"ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|az|ba|bb|bd|";
		$p .=	"be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|";
		$p .=	"cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|";
		$p .=	"ec|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|ga|gd|ge|gf|gg|gh|gi|";
		$p .=	"gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|";
		$p .=	"im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|";
		$p .=	"ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|";
		$p .=	"mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|";
		$p .=	"nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|";
		$p .=	"py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|";
		$p .=	"sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|";
		$p .=	"tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|";
		$p .=	"za|zm|zw";
		$p .=	")$/i";

		$r = preg_match($p, $mail) ? 1 : 0;
	}
	return $r;
}

function gen_pass($m) {
    $m = intval($m);
    $pass = "";
    for ($i = 0; $i < $m; $i++) {
        $te = mt_rand(48, 122);
        if (($te > 57 && $te < 65) || ($te > 90 && $te < 97)) $te = $te - 9;
        $pass .= chr($te);
    }
    return $pass;
}

function linknama($id){
	global $koneksi_db;
	$q	= $koneksi_db->sql_query("SELECT nama FROM user WHERE id='$id'");
	$r	= $koneksi_db->sql_fetchrow($q);
	$s	= seo_title($r['nama']);
	$nama	= '<a href="user-1-'.$id.'-'.$s.'.html" class="leftmenu_div"><b>'.$r['nama'].'</b></a>';
	return $nama;
}

function linkphoto($id){
	//global $koneksi_db;
	//$q	= $koneksi_db->sql_query("SELECT photo FROM user WHERE id='$id'");
	//$r	= $koneksi_db->sql_fetchrow($q);
	if(file_exists('images/users/'.$id.'.jpg')){
		$photo	= '<img src="images/users/'.$id.'.jpg" width="80" border="1" align="left">';
	}else{
		$photo	= '<img src="images/users/nophoto.jpg" width="80" border="1" align="left">';
	}
	return $photo;
}

function totalfile(){
	global $koneksi_db;
	$q	= $koneksi_db->sql_query("SELECT COUNT(*) As jumlah FROM content");
	$r	= $koneksi_db->sql_fetchrow($q);
	
	$jumlah	= $r['jumlah'];
	$total	= number_format($jumlah, 0,',','.');

	return $total;
}

function format_nomor($bytes){
	/*$jumlah	= number_format($nomor, 0,',','.');
	return $jumlah;*/
	 if ($bytes < 1024) return $bytes.' B';
   elseif ($bytes < 1048576) return round($bytes / 1024, 2).' KB';
   elseif ($bytes < 1073741824) return round($bytes / 1048576, 2).' MB';
   elseif ($bytes < 1099511627776) return round($bytes / 1073741824, 2).' GB';
   else return round($bytes / 1099511627776, 2).' TB';
}

function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}

function linkview($id,$format=true){
	global $koneksi_db, $url;
	$qlv	= $koneksi_db->sql_query("SELECT judul, icon FROM content WHERE id='$id'");
	$rlv	= $koneksi_db->sql_fetchrow($qlv);
	$icon	= $rlv['icon'];
	if($icon==""){
		$icon	= "edoc.png";
	}else{
		$icon	= $icon;
	}
	
	if(!$format){
		$view	= '<a href="modul/view.php?id='.$id.'" class="local">'.$rlv['judul'].'</a>';
	}else{
		$view	= '<img src="images/icons/'.$icon.'" align="left" width="55" height="55" border="1" hspace="5" vspace="0"> <a href="'.$url.'/view-'.$id.'-'.seo_title($rlv['judul']).'.html" class="green">'.$rlv['judul'].'</a>
					
					';
	}
	return $view;
}

function tglindo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,6,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.'-'.$bulan.'-'.$tahun;		 
	}	

function tglindo2($tgl){
			$tanggal = substr($tgl,0,2);
			$bulan = getBulan(substr($tgl,3,2));
			$tahun = substr($tgl,6,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
}	

function getBulan($bln){
switch ($bln){
	case 1: 
		return "Januari";
	break;
	case 2:
		return "Februari";
	break;
	case 3:
		return "Maret";
	break;
	case 4:
		return "April";
	break;
	case 5:
		return "Mei";
	break;
	case 6:
		return "Juni";
	break;
	case 7:
		return "Juli";
	break;
	case 8:
		return "Agustus";
	break;
	case 9:
		return "September";
	break;
	case 10:
		return "Oktober";
	break;
	case 11:
		return "November";
	break;
	case 12:
		return "Desember";
	break;
	}
}

function autolink ($str){
  $str = eregi_replace("([[:space:]])((f|ht)tps?:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $str); //http
  $str = eregi_replace("([[:space:]])(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $str); // www.
  $str = eregi_replace("([[:space:]])([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})","\\1<a href=\"mailto:\\2\">\\2</a>", $str); // mail
  $str = eregi_replace("^((f|ht)tp:\/\/[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"\\1\" target=\"_blank\">\\1</a>", $str); //http
  $str = eregi_replace("^(www\.[a-z0-9~#%@\&:=?+\/\.,_-]+[a-z0-9~#%@\&=?+\/_.;-]+)", "<a href=\"http://\\1\" target=\"_blank\">\\1</a>", $str); // www.
  $str = eregi_replace("^([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})","<a href=\"mailto:\\1\">\\1</a>", $str); // mail
  return $str;
}

class Pagings{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[halaman])){
	$posisi=0;
	$_GET[halaman]=1;
}
else{
	$posisi = ($_GET[halaman]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=viewhal-$_GET[id]-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}

function navsatker($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=index.php?page=satker&act=list&halaman=$i>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}
?>