<?php
session_start();
$sessionalumni=$_SESSION['login'];

session_destroy();

header("location: ../index.php");
?>

