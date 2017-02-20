<?php
error_reporting(E_ALL ^ E_NOTICE);
$sunucu="localhost";
$kullanici="root";
$sifre="";
$veritabani="eventguide";
$con = mysqli_connect($sunucu,$kullanici,$sifre,$veritabani);
mysqli_query($con,"SET NAMES 'utf8'");
mysqli_query($con,"SET CHARACTER SET utf8_general_ci");

if (mysqli_connect_errno())
  {
  echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error(). "</h1>";
  }
?>
