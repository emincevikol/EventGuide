<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

  $clubname = $_POST['clubname'];
  $advisor = $_POST['advisor'];

  $fname = $_POST['fname'];
  $lname = $_POST['lname'] ;
  $number = $_POST['number'] ;
  $email = $_POST['email'] ;
  $mobile = $_POST['mobile'];

  $sql = "INSERT INTO `club` (`name` , `advisor` , `status` ) VALUES ('".$clubname."', '".$advisor."' ,  1)";
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

?>
