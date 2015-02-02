<?php

session_start();

if (!isset($_SESSION['login']))
{
   echo "<h1>Maaf Anda belum login</h1>";
   exit;
}
?>