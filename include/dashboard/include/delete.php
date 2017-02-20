<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

$id=$_POST['id'];
$type=$_POST['type'];

if($type==0){
  $sql = "UPDATE `event` SET `status` = '-2' WHERE `event`.`id`='".$id."' ";
  $result=mysqli_query($con,$sql);
}
else if($type==1){
  $sql = "UPDATE `club` SET `status` = '0' WHERE `club`.`id`='".$id."' ";
  $result=mysqli_query($con,$sql);
  $sql = "UPDATE `president` SET `status` = '0' WHERE `president`.`manages`='".$id."' ";
  $result=mysqli_query($con,$sql);
}
else if($type==2){
  $sql ="UPDATE `community` SET `status` = '0' WHERE `community`.`id`='".$id."'";
  $result=mysqli_query($con,$sql);
  $sql = "UPDATE `president` SET `status` = '0' WHERE `president`.`manages`='".$id."' ";
  $result=mysqli_query($con,$sql);

}


?>
