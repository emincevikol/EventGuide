<?php include("include/main/firstlines.php"); error_reporting(E_ALL ^ E_NOTICE); include("../config.php");

if ($_SESSION['admin']) {
  $sql = "SELECT * FROM `event`  where status=-1 or status=-2";
  $result = mysqli_query($con, $sql);
  $past=mysqli_num_rows($result);

  $sql = "SELECT * FROM `event`  where status=0";
  $result = mysqli_query($con, $sql);
  $wait=mysqli_num_rows($result);

  $sql = "SELECT * FROM `event`  where status=1";
  $result = mysqli_query($con, $sql);
  $coming=mysqli_num_rows($result);

  $sql = "SELECT * FROM `community`  where status=1";
  $result = mysqli_query($con, $sql);
  $community=mysqli_num_rows($result);

  $sql = "SELECT * FROM `club`  where status=1";
  $result = mysqli_query($con, $sql);
  $club=mysqli_num_rows($result);

}

else if($_SESSION['president']){
  $sql = "SELECT * FROM `community`  where name='".$_SESSION['presidentOf']."' ";
  $result = mysqli_query($con, $sql);
  if ($row=mysqli_num_rows($result)) {
    $inf = mysqli_fetch_assoc($result);
    $ownerID=$inf["id"];
  }
  else {
    $sql = "SELECT * FROM `club`  where name='".$_SESSION['presidentOf']."' ";
    $result = mysqli_query($con, $sql);
    $inf = mysqli_fetch_assoc($result);
    $ownerID=$inf["id"];
  }

  $sql = "SELECT * FROM `event` where status=-1 or status=-2 and ownerId='".$ownerID."'";
  $result = mysqli_query($con, $sql);
  $past=mysqli_num_rows($result);

  $sql = "SELECT * FROM `event`  where status=0 and ownerId='".$ownerID."'";
  $result = mysqli_query($con, $sql);
  $wait=mysqli_num_rows($result);

  $sql = "SELECT * FROM `event`  where status=1 and ownerId='".$ownerID."' ";
  $result = mysqli_query($con, $sql);
  $coming=mysqli_num_rows($result);

}



?>
    <div id="wrapper">

        <?php include("include/navbar.php");  ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>İstatistik</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-lock fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $wait; ?></div>
                                        <div>Onay Bekleyen Etkinlikler!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="events.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Detaylar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-unlock-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $coming; ?></div>
                                        <div>Yaklaşan Etkinlikler !</div>
                                    </div>
                                </div>
                            </div>
                            <a href="events.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Detaylar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-unlock fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $past; ?></div>
                                        <div>Geçmiş Etkinlikler ! </div>
                                    </div>
                                </div>
                            </div>
                            <a href="events.php">
                                <div class="panel-footer">
                                    <span class="pull-left">Detaylar</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
<?php
                if ($_SESSION['admin']) {
                ?>
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="panel panel-info">
                          <div class="panel-heading">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-graduation-cap fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"><?php echo $community; ?></div>
                                      <div>Topluluklar</div>
                                  </div>
                              </div>
                          </div>
                          <a href="communities.php">
                              <div class="panel-footer">
                                  <span class="pull-left">Detaylar</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="panel panel-info">
                          <div class="panel-heading ">
                              <div class="row">
                                  <div class="col-xs-3">
                                      <i class="fa fa-university fa-5x"></i>
                                  </div>
                                  <div class="col-xs-9 text-right">
                                      <div class="huge"><?php echo $club; ?></div>
                                      <div>Klüpler</div>
                                  </div>
                              </div>
                          </div>
                          <a href="clubs.php">
                              <div class="panel-footer">
                                  <span class="pull-left">Detaylar</span>
                                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                  <div class="clearfix"></div>
                              </div>
                          </a>
                      </div>
                  </div>
                </div>
                <?php
                }

 ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/main/lastlines.php"); ?>
