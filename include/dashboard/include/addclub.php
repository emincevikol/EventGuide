<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

if($_POST['type']==2){

  $comname = $_POST['clubname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'] ;
  $number = $_POST['number'] ;
  $email = $_POST['email'] ;
  $mobile = $_POST['mobile'];

  $sql = "INSERT INTO `community` (`name` ,  `status` ) VALUES ('".$comname."', 1)";
  if (mysqli_query($con,$sql)) {
    $last_id = mysqli_insert_id($con);
    $sql2 = "INSERT INTO `president` (`fname`, `lname`, `number`, `email`, `mobile`, `manages`,`type`,`status` ) VALUES ('".$fname."', '".$lname."' , $number , '".$email."'  , '".$mobile."' , '".$last_id."', 'community','1' ) ";
      if(mysqli_query($con,$sql2)){
        echo "ok";
      }
      else {
        echo "hata";
      }
    }
    else {
      echo "hata.";
    }
}
if($_POST['type']==1){
  $clubname = $_POST['clubname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'] ;
  $number = $_POST['number'] ;
  $email = $_POST['email'] ;
  $mobile = $_POST['mobile'];

  $sql = "INSERT INTO `club` (`id`, `name`, `status`  ) VALUES (NULL, '".$clubname."' , 1)";
  if (mysqli_query($con,$sql)) {
      $last_id = mysqli_insert_id($con);
      $sql2 = "INSERT INTO `president` (`id`, `fname`, `lname`, `number`, `email`, `mobile`, `manages`,`type`,`status` ) VALUES (NULL , '".$fname."', '".$lname."' , $number , '".$email."'  , '".$mobile."' , '".$last_id."', 'club','1' ) ";
      if(mysqli_query($con,$sql2)){
        echo "ok";
      }
      else {
        echo "hata";
      }
    }
    else {
      echo "hata";
    }
}
?>
