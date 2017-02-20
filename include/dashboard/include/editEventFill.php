<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");
$eventid=$_POST['eventid'];

$sql = "select * from event where id=".$eventid;
$result=mysqli_query($con,$sql);
  while($inf = mysqli_fetch_assoc($result)) {
    if ($inf['type']=='community') {
      $sql2="select * from community where id=".$inf['ownerId']."";
      $result2 = mysqli_query($con, $sql2);
      if($row=mysqli_num_rows($result2)){
        $inf2 = mysqli_fetch_assoc($result2);
        $name=$inf2['name'];
      }
    }
    else if ($inf['type']=='club') {
      $sql2="select * from club where id=".$inf['ownerId']."";
      $result2 = mysqli_query($con, $sql2);
      if($row=mysqli_num_rows($result2)){
        $inf2 = mysqli_fetch_assoc($result2);
        $name=$inf2['name'];
      }
    }
    $_SESSION["edit"]=true;?>
    <form  action="Javascript:UpdateEvent(<?=$inf["id"];?>);" role="form" method="post" style="display: block;">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="text" name="editeventname" id="editeventname" class="form-control input-sm" placeholder="Event Name" required value="<?=$inf['name'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <textarea  name="editdescription" id="editdescription" rows="5"  placeholder="Enter Address Here.." class="form-control" required><?=$inf['description'];?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="date"  name="editdate" id="editdate" class="form-control input-sm" placeholder="date" required value="<?=$inf['date'];?>">
            </div>
          </div>
          <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
              <input type="text" name="edithour" id="edithour" class="form-control input-sm" placeholder="Hour" required value="<?=$inf['hour'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="text" name="editlocation" id="editlocation" class="form-control input-sm" placeholder="location" required value="<?=$inf['location'];?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group ">
              <?php
              if ($_SESSION['admin']) {?>
              <select name="editowner" id="editowner" class="form-control input-sm" required>
                <option><?php echo $name ?></option><?php
                  $sql = "SELECT * FROM `community` ";
                  $result = mysqli_query($con, $sql);
                  if ($row=mysqli_num_rows($result)) {
                      while($inf = mysqli_fetch_assoc($result)) {
                         ?><option><?php echo $inf["name"] ?></option> <?php
                      }
                  }
                  $sql = "SELECT * FROM `club` ";
                  $result = mysqli_query($con, $sql);
                  if ($row=mysqli_num_rows($result)) {
                      while($inf = mysqli_fetch_assoc($result)) {
                         ?><option><?php echo $inf["name"] ?></option> <?php
                      }
                  }
                  ?></select><?php
              }
              else if ($_SESSION['president']) {
              ?>      <input type="text" name="editowner" id="editowner" class="form-control input-sm" placeholder="owner"  value="<?=$_SESSION['presidentOf'];?>" required disabled>
              <?php
              }
              else {
                echo "yetkiniz yok";
              } ?>
            </div>
          </div>
        </div>
      
    <input type="submit" value="Register" class="btn btn-info btn-block" id="editbayrak" name='editbayrak'>
    </form>
<?php
}
?>
