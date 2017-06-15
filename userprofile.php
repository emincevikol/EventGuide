<?php
include("include/main/firstlines.php");

if(!$_SESSION['login'] || $_SESSION['admin']) {
    ?><script>alert("yetkiniz yok.."); window.top.location = '../../index.php';</script> <?php  exit;
}
      include("include/navbar.php");
      error_reporting(E_ALL ^ E_NOTICE);
      include("include/config.php");

include("include/main/lastlines.php");

$sql = "SELECT * FROM `student` WHERE studentno='".$_SESSION['number']."'  ";
$result = mysqli_query($con, $sql);
$row=mysqli_num_rows($result);

  while($inf = mysqli_fetch_assoc($result)){
    $studentno=$inf['studentno'];
    $fname=$inf['fname'];
    $lname=$inf['lname'];
    $email=$inf['email'];
  }

?>

<div class="col-lg-12 col-sm-12">

    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="profil" class="btn btn-default" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profil</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="gelecek" class="btn btn-primary" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                <div class="hidden-xs">Yaklaşan etkinliklerim</div>
            </button>
        </div>
        <div class="btn-group" role="geçmiş">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                <div class="hidden-xs">Geçmiş etkinliklerim</div>
            </button>
        </div>
    </div>

        <div class="well">
      <div class="tab-content">
        <div class="tab-pane fade in" id="tab1">
          <form  method="post" action="include/registerupdate.php">
            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">Öğrenci Numarası</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-tag" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name" value="<?=$studentno?>" required disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="name" class="cols-sm-2 control-label">İsim</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="name" id="name" value="<?=$fname?>" required disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Soyisim</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="surname" id="surname" value="<?=$lname?>" required disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">E-mail</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="email" id="email"  value="<?=$email?>" required disabled>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="chckbox" class="cols-sm-2 control-label">İlgilendiklerim</label>
              <div class="cols-sm-10">
                <div class="input-group" required>
                  <label class="checkbox-inline"><input type="checkbox" value="" id="all">Bütün Etkinlikelerden haberdar olmak istiyorum.</label>
                </div>
                <div class="input-group" required>
                  <label class="checkbox-inline"><input type="checkbox" value="Konferans" id="1" >Konferans</label>
                  <label class="checkbox-inline"><input type="checkbox" value="Seminer" id="2" >Seminer</label>
                  <label class="checkbox-inline"><input type="checkbox" value="Panel" id="3" >Panel</label>
                  <label class="checkbox-inline"><input type="checkbox" value="Sempozyum" id="4" >Sempozyum</label>
                </div>
              </div>
            </div>

          </form>
        </div>

        <div class="tab-pane fade in active" id="tab2">
          <div class="container">
              <div class="row">
                <?php
                $sql = "SELECT * FROM `event` where status=1";
                $result = mysqli_query($con, $sql);
                $durum=0;
                  while($inf = mysqli_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM `enroll` where studentno='".$_SESSION['number']."' ";
                    $result2 = mysqli_query($con, $sql2);
                    $num_rows = mysqli_num_rows($result2);
                    if ($num_rows>0) {
                    while($inf2 = mysqli_fetch_assoc($result2)) {
                      if($inf2['eventid']==$inf['id']){
                      ?>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" rel="lightbox" title="my caption">
                                          <img src="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" alt="" class="img-rounded img-responsive" />
                                        </a>
                                          <?php
                                          if ($_SESSION['login']){
                                            ?>
                                            <form action="include/unenroll.php"  method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="eventids" id="eventids" value="<?=$inf['id'];?>">
                                            <input type="hidden" name="fromprofile" id="fromprofile" value="true">
                                            <button type="button-fluid" class="btn btn-success btn-block glyphicon glyphicon-ok" style=" margin-top: 5px;"></button>
                                            </form>
                                            <?php
                                          }
                                          ?>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <p><h4><i class="glyphicon glyphicon-star"></i> <?=$inf['name'];?> </h4></p>
                                        <p><i class="glyphicon glyphicon-map-marker"></i><small> <?=$inf['location'];?></small></p>
                                        <?php
                                          $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                          $result2 = mysqli_query($con, $sql2);
                                              while($inf2 = mysqli_fetch_assoc($result2)) {
                                       ?>
                                       <p>
                                       <i class="glyphicon glyphicon-user"></i><a href="clubprofile.php?id=<?=$inf2['id'];?>&type=<?=$inf['type'];?>"> <?=$inf2['name'];?></a>
                                       </p>
                                       <?php
                                        }
                                        ?>
                                        <p><i class="glyphicon glyphicon-calendar"></i> <?=$inf['date'];?><i class="glyphicon glyphicon-hourglass"></i><?=$inf['hour'];?></p>
                                        <p><i class="glyphicon glyphicon-info-sign"></i> <?=$inf['description'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  if($sayac%2==0){ echo "<div class='row'>&nbsp;</div>"; }
                      }
                    }
                  }
                  else {
                    if ($durum==0) {
                      echo "<p style='color:red;text-align:center;'>Yaklaşan Etkinliğiniz Yok.</p>";
                      $durum=1;
                    }
                  }
                }

                  ?>
              </div>
          </div>


        </div>

        <div class="tab-pane fade in" id="tab3">
          <div class="container">
              <div class="row">
                <?php
                $sql = "SELECT * FROM `event` where status='-1'";
                $result = mysqli_query($con, $sql);
                $durum=0;
                  while($inf = mysqli_fetch_assoc($result)) {
                    $sql2 = "SELECT * FROM `enroll` where studentno='".$_SESSION['number']."' ";
                    $result2 = mysqli_query($con, $sql2);
                    $num_rows = mysqli_num_rows($result2);
                    if ($num_rows>0) {
                    while($inf2 = mysqli_fetch_assoc($result2)) {
                      if($inf2['eventid']==$inf['id']){
                      ?>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="well well-sm">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" rel="lightbox" title="my caption">
                                          <img src="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" alt="" class="img-rounded img-responsive" />
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-8">
                                        <p><h4><i class="glyphicon glyphicon-star"></i> <?=$inf['name'];?> </h4></p>
                                        <p><i class="glyphicon glyphicon-map-marker"></i><small> <?=$inf['location'];?></small></p>
                                        <?php
                                          $sql2 = "SELECT * FROM `".$inf["type"]."` WHERE  id='".$inf["ownerId"]."'  ";
                                          $result2 = mysqli_query($con, $sql2);
                                              while($inf2 = mysqli_fetch_assoc($result2)) {
                                       ?>
                                        <p>
                                        <i class="glyphicon glyphicon-user"></i><a href="clubprofile.php?id=<?=$inf2['id'];?>&type=<?=$inf['type'];?>"> <?=$inf2['name'];?></a>
                                        </p>
                                       <?php
                                        }
                                        ?>
                                        <p><i class="glyphicon glyphicon-calendar"></i> <?=$inf['date'];?><i class="glyphicon glyphicon-hourglass"></i><?=$inf['hour'];?></p>
                                        <p><i class="glyphicon glyphicon-info-sign"></i> <?=$inf['description'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                      }
                      else {
                        $durum=0;
                      }
                    }
                  }
                }
                if ($durum==0) {
                  echo "<p style='color:red;text-align:center;'>Geçmiş Etkinliğiniz Yok.</p>";
                  $durum=1;
                }
                ?>
              </div>
          </div>

        </div>
      </div>
    </div>

</div>

<script type="text/javascript">
$(document).ready(function() {
$(".btn-pref .btn").click(function () {
  $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
  // $(".tab").addClass("active"); // instead of this do the below
  $(this).removeClass("btn-default").addClass("btn-primary");
});
});
</script>


<style media="screen">
    /* USER PROFILE PAGE */
.card {
  margin-top: 20px;
  padding: 30px;
  background-color: rgba(214, 224, 226, 0.2);
  -webkit-border-top-left-radius:5px;
  -moz-border-top-left-radius:5px;
  border-top-left-radius:5px;
  -webkit-border-top-right-radius:5px;
  -moz-border-top-right-radius:5px;
  border-top-right-radius:5px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.card.hovercard {
  position: relative;
  padding-top: 0;
  overflow: hidden;
  text-align: left;
  background-color: #fff;
  background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
  height: 130px;
}
.card-background img {
  -webkit-filter: blur(25px);
  -moz-filter: blur(25px);
  -o-filter: blur(25px);
  -ms-filter: blur(25px);
  filter: blur(25px);
  margin-left: -100px;
  margin-top: -200px;
  min-width: 130%;
}
.card.hovercard .useravatar {

  padding-left: 20px;
  position: absolute;
  top: 15px;
  left: 0;
  right: 0;
}
.card.hovercard .useravatar img {
  width: 100px;
  height: 100px;
  max-width: 100px;
  max-height: 100px;
}
.card.hovercard .card-info {

  padding-left: 10px;
  position: absolute;
  bottom: 14px;
  left: 0;
  right: 0;
}
.card.hovercard .card-info .card-title {
  padding:0 5px;
  font-size: 20px;
  line-height: 1;
  color: #262626;
  background-color: rgba(255, 255, 255, 0.1);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.card.hovercard .card-info {
  overflow: hidden;
  font-size: 12px;
  line-height: 20px;
  color: #737373;
  text-overflow: ellipsis;
}
.card.hovercard .bottom {
  padding: 0 20px;
  margin-bottom: 17px;
}
.btn-pref .btn {
  -webkit-border-radius:0 !important;
}
</style>
