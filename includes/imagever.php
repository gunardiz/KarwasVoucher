<?php

include 'session.php';

$alphanum = "0123456789";

$rand = substr(str_shuffle($alphanum), 0, 5);

$_SESSION['code'] = md5($rand);

$a = substr($rand, 0, 1);
$b = substr($rand, 1, 1);
$c = substr($rand, 2, 1);
$d = substr($rand, 3, 1);
$e = substr($rand, 4, 1);

$number	= "$a $b $c $d $e";
$image = imagecreate(100, 25);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 12, 10, 5, $number, $textColor);

header("Expires: Mon, 26 Jul 1907 05:00:00 GMT");
header("Last-Modified:" . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache_Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: image/jpeg');

imagejpeg($image);

?>