<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

$flag=false;
$eventid=$_POST['eventid'];
$eventname = $_POST['eventname'];
$description = $_POST['description'];
$date = $_POST['date'] ;
$hour = $_POST['hour'] ;
$location = $_POST['location'] ;
$owner = $_POST['owner'];

$sql = "SELECT * FROM `club` where  name= '".$owner."' ";
$result = mysqli_query($con, $sql);
if($row=mysqli_num_rows($result))
{
  $inf = mysqli_fetch_assoc($result);
  $clubid=$inf['id'];
  $type="club";
  $flag=true;
}else{
    $flag=false;
    $sql = "SELECT * FROM `community` where  name= '".$owner."' ";
    $result = mysqli_query($con, $sql);
    if($row=mysqli_num_rows($result))
    {
      $inf = mysqli_fetch_assoc($result);
      $clubid=$inf['id'];
      $type="community";
      $flag=true;
    }else{
        $flag=false;
    }
}

if($flag==true && $_SESSION['admin']){
  $sql5 = "UPDATE `event` SET `name` = '".$eventname."', `description` = '".$description."', `date` = '".$date."', `hour` = '".$hour."', `location` = '".$location."' , `ownerId` = '".$clubid."', `type` = '".$type."' WHERE id =".$eventid;
    if(mysqli_query($con,$sql5)){
      echo "ok";
  }else{
    echo "hata";
  }
}
else if($flag==true && $_SESSION['president']){
  $sql5 = "UPDATE `event` SET `name` = '".$eventname."', `description` = '".$description."', `date` = '".$date."', `hour` = '".$hour."', `location` = '".$location."' , `ownerId` = '".$clubid."', `type` = '".$type."' , `status` = '0' WHERE id =".$eventid;
    if(mysqli_query($con,$sql5)){
      echo "ok";
  }else{
    echo "hata";
  }
}
?>
