<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../../config.php");

$clubid=$_POST['clubid'];
$type= $_POST['type'];

if ($type==1) {
  $sql = "SELECT * FROM `club` where  id= '".$clubid."' ";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result))
  {
    while($inf = mysqli_fetch_assoc($result)) {
        $name=$inf['name'];
        $advisor=$inf['advisor'];
        $description=$inf['description'];
        $logo=$inf['logo'];
    }
  }

  $sql = "SELECT * FROM `president` where  type='club' and manages= '".$clubid."'";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result))
  {
    while($inf = mysqli_fetch_assoc($result)) {
        $fname=$inf['fname'];
        $lname=$inf['lname'];
    }
  }


}
else if ($type==2) {
  $sql = "SELECT * FROM `community` where  id= '".$clubid."' ";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result))
  {
    while($inf = mysqli_fetch_assoc($result)) {
        $name=$inf['name'];
        $advisor=$inf['advisor'];
        $description=$inf['description'];
        $logo=$inf['logo'];

    }
  }

  $sql = "SELECT * FROM `president` where  type='community' and manages= '".$clubid."'";
  $result = mysqli_query($con, $sql);
  if($row=mysqli_num_rows($result))
  {
    while($inf = mysqli_fetch_assoc($result)) {
        $fname=$inf['fname'];
        $lname=$inf['lname'];
    }
  }
}
?>


<div class="row">
  <button type="button" class="btn btn-danger pull-right" style="margin-right:30px; " data-toggle="modal" data-target="#delete" onclick="Javascript:Delete('<?=$clubid;?>','<?=$type;?>');">Klübü/Topluluğu Sil</button>
</div>
<div class="panel-body">
  <div class="row">
    <div class=" col-md-12 col-lg-12 ">
      <table class="table table-user-information">
        <tbody>
          <tr>
            <td>Klüp/Topuluk Adı:</td>
            <td><?=$name?></td>
          </tr>
          <tr>
            <td>Başkan Adı ve Soyadı:</td>
            <td><?=$fname;?> <?=$lname;?></td>
          </tr>
          <tr>
            <td>Danışman:</td>
            <td><?=$advisor;?></td>
          </tr>
          <tr>
            <td>Açıklama:</td>
            <td><?=$description;?></td>
          </tr>
         <tr>
           <td>Logo :</td>
           <td>
             <?php
              if ($logo==null) {
                echo "Logo bulunamadı";
              }
              else {
                ?><a href="include/<?=$logo;?>" rel="lightbox" title="my caption"><img src="include/<?=$logo;?>" width="100"/></a>
                <?php
              }
             ?>
           </td>
         </tr>
         <tr>
           <td>
            Logo Yükle:
           </td>
           <td>
             <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#uploadform"  onclick="Javascript:Uploadlogo('<?=$clubid;?>','<?=$type;?>');">Yükle</button>
           </td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
