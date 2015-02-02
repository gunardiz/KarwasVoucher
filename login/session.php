<?
session_start();
$session=$_SESSION['login'];
$session=$_SESSION['role'];
$session=$_SESSION['nm_lkp'];
$session=$_SESSION['id_usr'];
$session=$_SESSION['ac_st'];

if(empty($session)){
header('location:../index.php');
}
?>