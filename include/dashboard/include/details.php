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
    <div class="row">
      <button type="button" class="btn btn-danger pull-right" style="margin-right:30px; " data-toggle="modal" data-target="#delete" onclick="Javascript:Delete('<?=$inf["id"];?>','0');">Etkinliği Sil</button>
    </div>
      <div class="panel-body">
        <div class="row">
          <div class=" col-md-12 col-lg-12 ">
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>Sahibi:</td>
                  <td><?=$name?></td>
                </tr>
                <tr>
                  <td>Etkinlik Adı:</td>
                  <td><?=$inf['name'];?></td>
                </tr>
                <tr>
                  <td>Açılama:</td>
                  <td><?=$inf['description'];?></td>
                </tr>
                <tr>
                  <td>Tarih:</td>
                  <td><?=$inf['date'];?></td>
                </tr>
                <tr>
                  <td>Saat:</td>
                  <td><?=$inf['hour'];?></td>
                </tr>
                <tr>
                  <td>Yer:</td>
                  <td><?=$inf['location'];?></td>
                </tr>

               <tr>
                 <td>Afiş :</td>
                 <td>
                   <?php
                    if ($inf['image']==null) {
                      echo "Afiş bulunamadı";
                    }
                    else {
                      ?><a href="include/<?=$inf['image'];?>" rel="lightbox" title="my caption"><img src="include/<?=$inf['image'];?>" width="100"/></a>
                      <?php
                    }
                   ?>
                 </td>
               </tr>
               <tr>
                 <td>
                   Afiş Yükle:
                 </td>
                 <td>
                   <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#uploadform"  onclick="Javascript:UploadImage(<?=$eventid;?>);">Yükle</button>
                 </td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<?php
}
?>
