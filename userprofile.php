<?php
include("include/main/firstlines.php");

if(!$_SESSION['login'] || $_SESSION['admin']) {
    ?><script>alert("yetkiniz yok.."); window.top.location = '../../index.php';</script> <?php  exit;
}
      include("include/navbar.php");
            echo "profile page";

include("include/main/lastlines.php");
?>
