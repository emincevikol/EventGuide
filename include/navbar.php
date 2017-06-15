<?php
if($_SESSION['login'] && !$_SESSION['admin'] ){
  $logout="location.href='include/logout.php';";
  $profile="location.href='userprofile.php';";
  $btn="btn btn-danger";
  $loginstatus=true;
}
else if ($_SESSION['login'] && $_SESSION['admin'] ){
  $logout="location.href='include/logout.php';";
  $profile="location.href='include/dashboard/index.php';";
  $btn="btn btn-danger";
  $loginstatus=true;
}
else {
  $logout="location.href='login.php';";
  $btn="btn btn-success";
  $loginstatus=false;
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="Index.php">Etkinlikler</a>
        <a class="navbar-brand" href="community.php">Öğrenci Toplulukları</a>
        <a class="navbar-brand" href="club.php">Öğrenci Klüpleri</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <form  class="navbar-form navbar-right">
          <?php if($loginstatus){?>
                <input type="button" class="btn btn-info " onclick=<?php echo $profile ?> value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>">
          <?php } ?>

          <?php if($_SESSION['president']){?>
                <input type="button" class="btn btn-success " onclick=<?php echo "location.href='include/dashboard/index.php';" ?> value="<?php echo $_SESSION['presidentOf'] ?>">
          <?php } ?>

          <input type="button" class="<?php echo $btn ?>" onclick=<?php echo $logout ?> value="<?php if($loginstatus){
                                            echo "Çıkış";
                                          }else {
                                            echo "Giriş";}
                                    ?>">

      </form>
      </div><!--/.navbar-collapse -->
    </div>
</nav>
