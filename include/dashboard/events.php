<?php include("include/main/firstlines.php");  error_reporting(E_ALL ^ E_NOTICE); include("../config.php");?>


  <div id="wrapper">

        <?php include("include/navbar.php");  ?>
        <?php include("include/modal.php"); ?>

        <div id="page-wrapper">
            <?php if ($_SESSION['admin']){ ?>
              <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header"><i class="fa fa-fw fa-calendar"></i>
                              Events
                          </h1>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                              </li>
                              <li class="active">
                                  <i class="fa fa-fw fa-calendar"></i> Events
                              </li>
                          </ol>
                      </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-lg-12">
                    <div class="row">
                      <?php  $_SESSION["event"]=true;  $_SESSION["community"]=false; $_SESSION["club"]=false;?>
                      <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addevent">Add New Event</button>
                    </div>
                    <div class="row">
                      <div class="alert alert-info" style="margin-top:20px; margin-bottom:0px; "role="alert">Waiting for confirm</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=0";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <th scope="row"><?php echo $counter ?></th>
                                      <td><?php echo $inf["name"] ?></td>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                      ?>
                                            <td><?php echo $inf2["name"] ?></td>
                                          <?php
                                          }
                                          ?>
                                          <td><?php echo $inf["date"] ?></td>
                                          <td><?php echo $inf["location"] ?></td>
                                            <td><button type="button" class="btn btn-danger pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#delete" onclick="Javascript:Delete('<?=$inf["id"];?>', '0');">Delete</button>
                                                <?php if($inf[status]==0){  ?>
                                                  <button type="button" class="btn btn-primary pull-right" style=" margin-left: 10px;"  data-toggle="modal" data-target="#confirm" onclick="Javascript:Confirm('<?=$inf["id"];?>');">Confirm</button>
                                                <?php }  ?>
                                                <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editevent" onclick="Javascript:EditEvent('<?=$inf["id"];?>');">Edit</button>
                                                <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button>
                                            </td>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="alert alert-success" style="margin-top:20px; margin-bottom:0px; "role="alert">Approaching Events</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=1";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <th scope="row"><?php echo $counter ?></th>
                                      <td><?php echo $inf["name"] ?></td>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                      ?>
                                            <td><?php echo $inf2["name"] ?></td>
                                          <?php
                                          }
                                          ?>
                                          <td><?php echo $inf["date"] ?></td>
                                          <td><?php echo $inf["location"] ?></td>
                                            <td><button type="button" class="btn btn-danger pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#delete" onclick="Javascript:Delete('<?=$inf["id"];?>','0');">Delete</button>
                                                <?php if($inf[status]==1){  ?>
                                                  <button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;"  data-toggle="modal" data-target="#unconfirm" onclick="Javascript:Unconfirm('<?=$inf["id"];?>');">Unconfirm</button>
                                                <?php } ?>
                                                <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editevent" onclick="Javascript:EditEvent('<?=$inf["id"];?>');">Edit</button>
                                                <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button>
                                            </td>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="alert alert-danger" style="margin-top:20px; margin-bottom:0px; "role="alert">Past Events</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=-1";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <th scope="row"><?php echo $counter ?></th>
                                      <td><?php echo $inf["name"] ?></td>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                      ?>
                                            <td><?php echo $inf2["name"] ?></td>
                                          <?php
                                          }
                                          ?>
                                          <td><?php echo $inf["date"] ?></td>
                                          <td><?php echo $inf["location"] ?></td>
                                            <td><button type="button" class="btn btn-danger pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#delete" onclick="Javascript:Delete('<?=$inf["id"];?>','0');">Delete</button>
                                            <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button></td>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <!-- /.container-fluid -->
            <?php }
            else if($_SESSION['president']) {?>

              <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header"><i class="fa fa-fw fa-calendar"></i>
                              Events
                          </h1>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                              </li>
                              <li class="active">
                                  <i class="fa fa-fw fa-calendar"></i> Events
                              </li>
                          </ol>
                      </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-lg-12">
                    <div class="row">
                      <?php  $_SESSION["event"]=true;  $_SESSION["community"]=false; $_SESSION["club"]=false;?>
                      <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addevent">Add New Event</button>
                    </div>
                    <div class="row">
                      <div class="alert alert-info" style="margin-top:20px; margin-bottom:0px; "role="alert">Waiting for confirm</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=0 ";
                                  $result = mysqli_query($con, $sql);
                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                            $owner =  $inf2["name"];
                                          }
                                          ?>
                                          <?php if ($owner==$_SESSION['presidentOf']) { ?>
                                            <th scope="row"><?php echo $counter ?></th>
                                            <td><?php echo $inf["name"] ?></td>
                                            <td><?php echo $owner ?></td>
                                            <td><?php echo $inf["date"] ?></td>
                                            <td><?php echo $inf["location"] ?></td>
                                            <td>
                                              <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editevent" onclick="Javascript:EditEvent('<?=$inf["id"];?>');">Edit</button>
                                              <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button>
                                            </td>
                                          <?php } ?>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="alert alert-success" style="margin-top:20px; margin-bottom:0px; "role="alert">Approaching Events</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=1";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                            $owner =  $inf2["name"];
                                          }
                                          ?>
                                          <?php if ($owner==$_SESSION['presidentOf']) { ?>
                                            <th scope="row"><?php echo $counter ?></th>
                                            <td><?php echo $inf["name"] ?></td>
                                            <td><?php echo $owner ?></td>
                                            <td><?php echo $inf["date"] ?></td>
                                            <td><?php echo $inf["location"] ?></td>
                                            <td>
                                            <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editevent" onclick="Javascript:EditEvent('<?=$inf["id"];?>');">Edit</button>
                                            <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button>

                                            </td>
                                          <?php } ?>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="row">
                      <div class="alert alert-danger" style="margin-top:20px; margin-bottom:0px; "role="alert">Past Events</div>
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Event name</th>
                            <th>Owner</th>
                            <th>Date</th>
                            <th>Location</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `event` where status=-1";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <?php
                                      $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                            $owner =  $inf2["name"];
                                          }
                                          ?>
                                          <?php if ($owner==$_SESSION['presidentOf']) { ?>
                                            <th scope="row"><?php echo $counter ?></th>
                                            <td><?php echo $inf["name"] ?></td>
                                            <td><?php echo $owner ?></td>
                                            <td><?php echo $inf["date"] ?></td>
                                            <td><?php echo $inf["location"] ?></td>
                                            <td>
                                              <button type="button" class="btn btn-info pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#details" onclick="Javascript:Details('<?=$inf["id"];?>');">Details</button>
                                            </td>
                                          <?php } ?>
                                    </tr>
                                    <?php
                                    $counter++;
                                    }
                                  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
              <!-- /.container-fluid -->
            <?php }
            else {
                ?><script>alert("yetkiniz yok.."); window.top.location = '../../index.php';</script> <?php  exit;
            } ?>

        </div>
        <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->


<?php include("include/main/lastlines.php"); ?>
