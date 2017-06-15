<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

  echo $clubname = $_POST['clubname'];
  echo $advisor = $_POST['advisor'];

  echo $fname = $_POST['fname'];
  echo $lname = $_POST['lname'] ;
  echo $number = $_POST['number'] ;
  echo $email = $_POST['email'] ;
  echo $mobile = $_POST['mobile'];


  $sql = "INSERT INTO `community` (`name` , `advisor` , `status` ) VALUES ('".$clubname."', '".$advisor."' ,  1)";
  if (mysqli_query($con,$sql)) {
      $last_id = mysqli_insert_id($con);
      $sql2 = "INSERT INTO `president` (`id`, `fname`, `lname`, `number`, `email`, `mobile`, `manages`,`type`,`status` ) VALUES (NULL , '".$fname."', '".$lname."' , $number , '".$email."'  , '".$mobile."' , '".$last_id."', 'community','1' ) ";
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
