<?php
session_start();
include"konek.php";
$username=$_POST['username'];
$password=$_POST['password'];
if ((!empty ($username))&&(!empty($password))){
$a="SELECT * FROM user where username='$username' && password='$password'";
$q=mysql_query($a);
$ar=mysql_fetch_array($q);

$user=$ar['username'];
$pass=$ar['password'];
$rol=$ar['role'];
$nma=$ar['nm_lengkap'];
$uid=$ar['id_user'];
$acc=$ar['status'];

	if(($username=$user) AND ($password=$pass)){
	$session=$_SESSION['login']=$user;
	$session=$_SESSION['role']=$rol;
	$session=$_SESSION['nm_lkp']=$nma;
	$session=$_SESSION['id_usr']=$uid;
	$session=$_SESSION['ac_st']=$acc;
	
					
		if($acc=="aktif" and ($rol=="petugas" or $rol=="kasubag" or $rol=="ppk" or $rol=="bendahara" or $rol=="user")){
		header("location:../site/index.php?index=home");
		}
		else if($acc=="aktif" and $rol=="admin"){
		header("location:../site/index.php?index=home");
		}		
		else if ($acc=="inaktif"){
		header("location:../login.php?id=2");
		}
	}
	else{
	header("location:../login.php?id=1");
	
	};
}
else{ 
header("location:../login.php");
};
?>