<?php
error_reporting(E_ALL ^ E_NOTICE); include("config.php");

$sql = "SELECT * FROM `event` where status=1";
$result = mysqli_query($con, $sql);
?>
<div class="container">
    <div class="row">
      <?php
      $sayac=0;
      while($inf = mysqli_fetch_assoc($result)) {
        $sayac+=1;
      ?>
        <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="well well-sm">
              <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-12 col-xs-12">
                        <a href="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" rel="lightbox" title="my caption">
                          <img src="include/dashboard/include/<?php if($inf['image']!=""){ echo $inf['image']; }else { echo "uploads/default.jpg"; } ?>" alt="" class="img-rounded img-responsive"/>
                        </a>
                          <?php
                          if ($_SESSION['login']){
                            $flag=0;
                            $sql2 = "SELECT * FROM `enroll` where studentno='".$_SESSION['number']."' ";
                            $result2 = mysqli_query($con, $sql2);
                            while($inf2 = mysqli_fetch_assoc($result2)){
                              if($inf2['eventid']==$inf['id']){
                                $flag=1;
                              }
                            }
                            if($flag==0){
                              ?>
                              <form action="include/enroll.php"  method="post" enctype="multipart/form-data">
                              <input type="hidden" name="eventids" id="eventids" value="<?=$inf['id'];?>">
                              <button type="button-fluid" class="btn btn-primary btn-block" style=" margin-top: 5px;">Katıl</button>
                              </form>
                              <?php
                            }
                            else{
                              ?>
                              <form action="include/unenroll.php"  method="post" enctype="multipart/form-data">
                              <input type="hidden" name="eventids" id="eventids" value="<?=$inf['id'];?>">
                              <button type="button-fluid" class="btn btn-success btn-block glyphicon glyphicon-ok" style=" margin-top: 5px;"></button>
                              </form>
                              <?php
                            }
                          }
                          ?>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-4 col-xs-12">
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
       if($sayac%2==0){ echo "<div class='row'>&nbsp;</div>"; }
      }
        ?>

    </div>
</div>
