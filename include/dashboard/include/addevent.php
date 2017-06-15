<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");
$bayrak=$_POST['bayrak'];
//if(!$_SESSION["community"] && !$_SESSION["club"] &&  $_SESSION["admin"] && $bayrak){


  $eventname = $_POST['eventname'];
  $description = $_POST['description'];
  $date = $_POST['date'] ;
  $hour = $_POST['hour'] ;
  $location = $_POST['location'] ;
  $owner = $_POST['owner'];

  $sql = "SELECT * FROM `community` where  name= '".$owner."' ";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result))
  {
      while($inf = mysqli_fetch_assoc($result)) {
        if ($row!=0) {
          $sql2 = "INSERT INTO `event` (`id`, `name`, `description`, `date`, `hour`, `location`, `image` , `ownerId`,`type`,`status` ) VALUES (NULL , '".$eventname."', '".$description."' , '".$date."' , '".$hour."'  , '".$location."', '".$dosya."'  ,'".$inf["id"]."' , 'community','0' ) ";
              if(mysqli_query($con,$sql2)){
                echo "ok";
              }else{
                echo "error";
              }
        }else{
          echo "kayıt yok";
        }
      }
}else{

  $sql = "SELECT * FROM `club` where  name= '".$owner."' ";
  $result = mysqli_query($con, $sql);
  $row=mysqli_num_rows($result);
  if ($row) {
      while($inf = mysqli_fetch_assoc($result)) {
        if ($row!=0) {
          $sql2 = "INSERT INTO `event` (`id`, `name`, `description`, `date`, `hour`, `location`, `ownerId`,`type`,`status` ) VALUES (NULL , '".$eventname."', '".$description."' , $date , '".$hour."'  , '".$location."' , '".$inf["id"]."', 'club','0' ) ";
            if(mysqli_query($con,$sql2)){
              echo "ok";
            }else{
              echo "error";
            }
        }else{
          echo "kayıt yok";
        }
      }
  }
  else{
        echo "satır yok";
  }
}
 ?>
