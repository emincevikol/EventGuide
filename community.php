<?php
include("include/main/firstlines.php");

      include("include/navbar.php");

      error_reporting(E_ALL ^ E_NOTICE);
      include("include/config.php");

include("include/main/lastlines.php");
?>
<div id="wrapper">
      <div id="page-wrapper">
          <div class="container-fixed">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header "><i class="fa fa-graduation-cap"></i>
                        Öğrenci Toplulukları
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
              <div class="row">
                <table class="table table-striped">
                  <thead >
                    <tr>
                      <th>#</th>
                      <th>Topluluk adı</th>
                      <th>Başkan</th>
                      <th>Öğrenci Numarası</th>
                      <th>Telefon</th>
                      <th>E-mail</th>
                    </tr>
                  </thead>
                  <tbody>
                          <?php
                            $counter=1;
                            $sql = "SELECT * FROM `community` WHERE status=1 ";
                            $result = mysqli_query($con, $sql);
                            $type="community";
                            while($inf = mysqli_fetch_assoc($result)) {
                            ?><tr>
                                <th scope="row"><?php echo $counter ?></th>
                                <td>
                                  <p>
                                    <i class="glyphicon glyphicon-user"></i><a href="clubprofile.php?id=<?=$inf['id'];?>&type=<?=$type;?>"> <?=$inf['name'];?></a>
                                  </p>
                                </td>
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
                                      <?php  if (!$_SESSION['login']){
                                        ?>
                                          <td><?php echo $inf2["email"] ?></td>
                                        <?php
                                      }
                                    }
                                    if ($_SESSION['login']) {
                                   ?>
                                    <td>
                                      <button type="button" class="btn btn-warning pull-right" style=" margin-left: 10px;" data-toggle="modal" data-target="#mailform" onclick="Javascript:MailForm2('<?=$email;?>');">Mail</button>
                                    </td>
                                    <?php
                                  }
                                  ?>
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
      </div>
</div>

<div class="modal fade" id="mailform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Send mail</h4>
        </div>
          <div class="modal-body">
            <div class="container">

                <div class="col-xs-12 col-sm-8 col-md-6 center ">
                  <div class="panel panel-default">
                    <div class="panel-body" id="mailcontents">
                    </div>
                  </div>
                </div>

            </div>
          </div>
       </div>
    </div>
</div>

<?php include("include/main/lastlines.php"); ?>
