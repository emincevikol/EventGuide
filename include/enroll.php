<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("config.php");

$number = $_SESSION['number'];
$eventids = $_POST['eventids'];

$sql = "INSERT INTO `enroll` (`id`, `studentno`, `eventid`) VALUES (NULL, '".$number."', '".$eventids."');";
$result = mysqli_query($con, $sql);

?>
<script>
  window.top.location = '../index.php';
</script>
<?php

?>
