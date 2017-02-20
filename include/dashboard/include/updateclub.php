<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

 $clubid=$_POST['id'];
 $presidentId=$_POST['presidentId'];
 $type=$_POST['type'];
 $clubname=$_POST['clubname'];
 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $number=$_POST['number'];
 $email=$_POST['email'];
 $mobile=$_POST['mobile'];
$flag=false;


if($type==1){
  $flag=true;
  $sql="select * from club where id=".$clubid."";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result)){
    $inf = mysqli_fetch_assoc($result);
    $manages=$inf['id'];
  }else {
    $flag=false;
  }

  if($flag){
    $sql1 = "UPDATE `president` SET `fname` = '".$fname."',  `lname` = '".$lname."', `number` = '".$number."', `email` = '".$email."', `mobile` = '".$mobile."', `manages` = '".$manages."', `type` = 'club' WHERE `president`.`id` = '".$presidentId."' ";
    $sql2 = "UPDATE `club` SET `name` = '".$clubname."', `description` = '".$description."' WHERE `club`.`id` = '".$clubid."' ";

    if (mysqli_query($con,$sql2) && mysqli_query($con,$sql1)) {
      echo "ok";
    }
    else {
      echo hata;
    }
  }
}

if ($type==2){
  $flag=true;
  $sql="select * from community where id=".$clubid."";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result)){
    $inf = mysqli_fetch_assoc($result);
    $manages=$inf['id'];
  }else {
    $flag=false;
  }
  if ($flag) {
    $sql1 = "UPDATE `president` SET `fname` = '".$fname."', `lname` = '".$lname."', `number` = '".$number."', `email` = '".$email."', `mobile` = '".$mobile."', `manages` = '".$manages."', `type` = 'community' WHERE `president`.`id` = '".$presidentId."' ";
    $sql2 = "UPDATE `community` SET `name` = '".$clubname."', `description` = '".$description."' WHERE `community`.`id` = '".$clubid."' ";

    if (mysqli_query($con,$sql2) && mysqli_query($con,$sql1)) {
      echo "ok";
    }
    else {
      echo hata;
    }
  }
}
?>
