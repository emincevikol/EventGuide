<?php include("include/main/firstlines.php"); ?>

    <?php include("include/navbar.php"); error_reporting(E_ALL ^ E_NOTICE); include("../config.php");?>
    <?php include("include/modal.php");  ?>


    <div id="wrapper">
          <!-- /#page-wrapper -->
          <div id="page-wrapper">
            <?php if ($_SESSION['admin']){ ?>
                <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                      <div class="col-lg-12">
                          <h1 class="page-header "><i class="fa fa-graduation-cap"></i>
                              Student Communities
                          </h1>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                              </li>
                              <li class="active">
                                  <i class="fa fa-graduation-cap"> </i> Student
                              </li>
                              <li class="active">
                                  <i class="fa fa-file"></i>  Communities
                              </li>
                          </ol>
                      </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-lg-12">
                    <div class="row">
                      <?php $type=2; ?>
                      <button id="communitybutton" type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addclub">Add New Community</button>
                    </div>
                    <div class="row">
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Community name</th>
                            <th>President</th>
                            <th>Student Number</th>
                            <th>Mobile</th>
                          </tr>
                        </thead>
                        <tbody>

                                <?php
                                  $counter=1;
                                  $sql = "SELECT * FROM `community` WHERE status=1 ";
                                  $result = mysqli_query($con, $sql);

                                  while($inf = mysqli_fetch_assoc($result)) {
                                  ?><tr>
                                      <th scope="row"><?php echo $counter ?></th>
                                      <td><?php echo $inf["name"] ?></td>
                                      <?php
                                      $sql2 = "SELECT * FROM `president` WHERE status=1  and type='community' and manages='".$inf["id"]."'  ";
                                      $result2 = mysqli_query($con, $sql2);
                                          while($inf2 = mysqli_fetch_assoc($result2)) {
                                            $presidentId=$inf2["id"];
                                            $email=$inf2["email"];
                                            ?>
                                            <td><?php echo $inf2["fname"]." ".$inf2["lname"] ?></td>
                                            <td><?php echo $inf2["number"] ?></td>
                                            <td><?php echo $inf2["mobile"] ?></td>

                                          <?php
                                          }
                                         ?>
                                            <td><button type="button" class="btn btn-danger pull-right" style=" margin-left: 10px;" data-target="#delete" onclick="Javascript:Delete('<?=$inf["id"];?>', 2);">Delete</button>
                                                <button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#mailform" onclick="Javascript:MailForm('<?=$email;?>');">Mail</button>
                                                <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editclubs"  onclick="Javascript:EditClub('<?=$inf["id"];?>','<?=$presidentId;?>', 2);">Edit</button>
                                            </td>
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
            else if($_SESSION['president']){?>
              <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header "><i class="fa fa-graduation-cap"></i>
                            Student Communities
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-graduation-cap"> </i> Student
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>  Communities
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-lg-12">              
                  <div class="row">
                    <table class="table table-striped">
                      <thead >
                        <tr>
                          <th>#</th>
                          <th>Community name</th>
                          <th>President</th>
                          <th>Student Number</th>
                          <th>Mobile</th>
                        </tr>
                      </thead>
                      <tbody>

                              <?php
                                $counter=1;
                                $sql = "SELECT * FROM `community` WHERE status=1 ";
                                $result = mysqli_query($con, $sql);

                                while($inf = mysqli_fetch_assoc($result)) {
                                ?><tr>
                                    <th scope="row"><?php echo $counter ?></th>
                                    <td><?php echo $inf["name"] ?></td>
                                    <?php
                                    $sql2 = "SELECT * FROM `president` WHERE status=1  and type='community' and manages='".$inf["id"]."'  ";
                                    $result2 = mysqli_query($con, $sql2);
                                        while($inf2 = mysqli_fetch_assoc($result2)) {
                                          $presidentId=$inf2["id"];
                                          $email=$inf2["email"];
                                          ?>
                                          <td><?php echo $inf2["fname"]." ".$inf2["lname"] ?></td>
                                          <td><?php echo $inf2["number"] ?></td>
                                          <td><?php echo $inf2["mobile"] ?></td>

                                        <?php
                                        }
                                       ?>
                                          <td><button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#mailform" onclick="Javascript:MailForm('<?=$email;?>');">Mail</button>
                                          </td>
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
              else{
                ?><script>alert("yetkiniz yok.."); window.top.location = '../../index.php';</script> <?php  exit;
              }?>
          </div>
    </div>
    <!-- /#wrapper -->
<?php include("include/main/lastlines.php"); ?>
