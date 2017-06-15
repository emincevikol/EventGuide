<?php include("include/main/firstlines.php"); ?>

    <?php include("include/navbar.php");  error_reporting(E_ALL ^ E_NOTICE); include("../config.php");?>
    <?php include("include/modal.php");
    ?>

    <div id="wrapper">
          <div id="page-wrapper">
            <?php if ($_SESSION['admin']){ ?>
              <div class="container-fluid">
                  <!-- Page Heading -->
                  <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-graduation-cap"></i>
                            Öğrenci Klüpleri
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-graduation-cap"> </i> Öğrenci
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Klüpler
                            </li>
                        </ol>
                    </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-lg-12">
                    <div class="row">
                      <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addclub" style="width: 200px;">Klüp Ekle</button>
                    </div>
                    <div class="row">
                      <table class="table table-striped">
                        <thead >
                          <tr>
                            <th>#</th>
                            <th>Topluluk Adı</th>
                            <th>Başkan</th>
                            <th>Öğrenci Numarası</th>
                            <th>Telefon</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $counter=1;
                          $sql = "SELECT * FROM `club` WHERE status=1 ";
                          $result = mysqli_query($con, $sql);
                          while($inf = mysqli_fetch_assoc($result)) {
                          ?><tr>
                              <th scope="row"><?php echo $counter ?></th>
                              <td><?php echo $inf["name"] ?></td>
                              <?php
                              $sql2 = "SELECT * FROM `president` WHERE status=1 and type='club' and manages='".$inf["id"]."' ";
                              $result2 = mysqli_query($con, $sql2);
                              $row=mysqli_num_rows($result2);
                              if($row>0)
                              {
                                    $inf2 = mysqli_fetch_assoc($result2);
                                    $presidentId=$inf2["id"];
                                    $email=$inf2["email"];
                                    ?>
                                    <td><?php echo $inf2["fname"]." ".$inf2["lname"] ?></td>
                                    <td><?php echo $inf2["number"] ?></td>
                                    <td><?php echo $inf2["mobile"] ?></td>
                                  <?php

                              }
                                 ?>
                                    <td>
                                        <button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#mailform" onclick="Javascript:MailForm('<?=$email;?>');">Mail</button>
                                        <button type="button" class="btn btn-success pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#editclubs"  onclick="Javascript:EditClub('<?=$inf["id"];?>','<?=$presidentId?>',1);">Düzele</button>
                                        <button type="button" class="btn btn-info pull-right" style=" margin-left:5px;" data-toggle="modal" data-target="#clubdetails" onclick="Javascript:ClubDetails('<?=$inf["id"];?>','1');">Detay</button>
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
                          <h1 class="page-header"><i class="fa fa-graduation-cap"></i>
                              Öğrenci Klüpleri
                          </h1>
                          <ol class="breadcrumb">
                              <li>
                                  <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                              </li>
                              <li class="active">
                                  <i class="fa fa-graduation-cap"> </i> Öğrenci
                              </li>
                              <li class="active">
                                  <i class="fa fa-file"></i> Klüpler
                              </li>
                          </ol>
                      </div>
                  </div>
                  <!-- /.row -->
                  <div class="col-lg-12">
                    <div class="row">
                      <table class="table table-striped">
                        <thead >
                          <th>#</th>
                          <th>Topluluk Adı</th>
                          <th>Başkan</th>
                          <th>Öğrenci Numarası</th>
                          <th>Telefon</th>
                        </thead>
                        <tbody>
                        <?php
                          $counter=1;
                          $sql = "SELECT * FROM `club` WHERE status=1 ";
                          $result = mysqli_query($con, $sql);

                          while($inf = mysqli_fetch_assoc($result)) {
                          ?><tr>
                              <th scope="row"><?php echo $counter ?></th>
                              <td><?php echo $inf["name"] ?></td>
                              <?php
                              $sql2 = "SELECT * FROM `president` WHERE status=1 and type='club' and manages='".$inf["id"]."' ";
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
                                    <td>
                                      <button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#mailform" onclick="Javascript:MailForm('<?=$email;?>');">Mail</button>
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
          <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("include/main/lastlines.php"); ?>
