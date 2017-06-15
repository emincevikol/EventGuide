<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.php");

$number = $_SESSION['number'];
$eventids = $_POST['eventids'];

$sql = "SELECT * FROM `enroll` WHERE `eventid` = '".$eventids."' ";
$result = mysqli_query($con, $sql);
while($inf = mysqli_fetch_assoc($result)){
  $sql2 = "DELETE FROM `enroll` WHERE `enroll`.`id` = '".$inf['id']."' ";
  $result2 = mysqli_query($con, $sql2);
}

if($_POST['fromprofile']){
?>
<script>
  window.top.location = '../userprofile.php';
</script>
<?php
}
else{
?>
<script>
  window.top.location = '../index.php';
</script>
 <?php
}
