<?
session_start();
$sessionuser2=$_SESSION['login'];
$sessionuser2=$_SESSION['bgn'];
$sessionuser2=$_SESSION['nm_lkp'];
$session=$_SESSION['ac_st'];

if(empty($sessionuser2)){
header('location:../index.php');
}
?>