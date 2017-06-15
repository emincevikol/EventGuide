<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.php");

$number = $_SESSION['number'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];

$sql = "SELECT * FROM `student` WHERE studentno='".$number."'  ";
$result = mysqli_query($con, $sql);
$row=mysqli_num_rows($result);

if($row>0)
{
    $sql = "UPDATE `student` SET `fname` = '".$name."', `lname` = '".$surname."', `email` = '".$email."' WHERE `student`.`studentno` = '".$number."' ";
    $result = mysqli_query($con, $sql);
    ?><script>
      window.top.location = '../userprofile.php';
    </script>
    <?php
}
else{
  ?> <script>
    window.top.location = '../userprofile.php';
  </script>
  <?php
}
?>
