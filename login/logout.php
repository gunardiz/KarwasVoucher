<?php
session_start();
$session=$_SESSION['login'];
//include"session.php";
//include"../login/session.php";
/*$sesiku = $_SESSION['login'];
if(isset($sesiku))
{
unset($sesiku);
*/


/*}
else
{
echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}*/

session_destroy();
//echo $session;
header("location: ../index.php");
?>