<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

$id=$_POST['id'];
$presidentId=$_POST['presidentId'];
$type=$_POST['type'];

if($type==1){
  $sql = "select * from `club` where id='".$id."' ";
  $result=mysqli_query($con,$sql);
  while($inf = mysqli_fetch_assoc($result)) {
    $clubId=$inf['id'];
    $name=$inf['name'];
    $description=$inf['description'];
  }
  $sql2 = "select * from `president` where id='".$presidentId."' ";
  $result2=mysqli_query($con,$sql2);
  while($inf2 = mysqli_fetch_assoc($result2)) {
    $presidentId=$inf2['id'];
    $fname=$inf2['fname'];
    $lname=$inf2['lname'];
    $number=$inf2['number'];
    $email=$inf2['email'];
    $mobile=$inf2['mobile'];
  }
$type="1";
}

else if ($type==2){
  $sql = "select * from `community` where id='".$id."' ";
  $result=mysqli_query($con,$sql);
  while($inf = mysqli_fetch_assoc($result)) {
    $clubId=$inf['id'];
    $name=$inf['name'];
    $description=$inf['description'];
  }
  $sql2 = "select * from `president` where id='".$presidentId."' ";
  $result2=mysqli_query($con,$sql2);
  while($inf2 = mysqli_fetch_assoc($result2)) {
    $presidentId=$inf2['id'];
    $fname=$inf2['fname'];
    $lname=$inf2['lname'];
    $number=$inf2['number'];
    $email=$inf2['email'];
    $mobile=$inf2['mobile'];
  }
 $type="2";
}
?>
<form  action="Javascript:UpdateClub('<?=$clubId;?>','<?=$presidentId;?>','<?=$type;?>');" role="form" method="post" role="form" style="display: block;" >
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input type="text" name="editclubname" id="editclubname" class="form-control input-sm" placeholder="Community Name" required value="<?=$name;?>" >
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="text" name="editfname" id="editfname" class="form-control input-sm" placeholder="President First Name" required value="<?=$fname;?>">
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="text" name="editlname" id="editlname" class="form-control input-sm" placeholder="President Last Name" required value="<?=$lname;?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="text" name="editmobile" id="editmobile"  class="form-control input-sm" placeholder="Mobile Phone" required value="<?=$mobile;?>">
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <input type="text" name="editnumber"  id="editnumber" class="form-control input-sm" placeholder="Student Number" required value="<?=$number;?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <input type="text" name="editemail" id="editemail" class="form-control input-sm" placeholder="E-Mail" required value="<?=$email;?>">
        </div>
      </div>
    </div>
<input type="submit" value="Register" class="btn btn-info btn-block" class="btn btn-info btn-block">

</form>
