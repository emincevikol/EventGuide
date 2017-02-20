<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

$id=$_POST['id'];
$sql = "UPDATE `event` SET `status` = '0' WHERE `event`.`id`='".$id."' ";
$result=mysqli_query($con,$sql);
?>
