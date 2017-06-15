<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include("../config.php");

?>

<div class="modal fade" id="addclub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Klüp Ekle</h4>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-6 center ">
                	<div class="panel panel-default">
                  	<div class="panel-body" id="addclubcontents">
                      <form  action="Javascript:AddClub();" role="form" method="post" role="form" style="display: block;">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="clubname" id="clubname" class="form-control input-sm" placeholder="Klüp Adı" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="fname" id="fname" class="form-control input-sm" placeholder="Başkan Adı" required>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="lname" id="lname" class="form-control input-sm" placeholder="Başkan Soyadı" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="mobile" id="mobile" class="form-control input-sm" placeholder="Başkan Telefonu" required>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="number" id="number" class="form-control input-sm" placeholder="Başkan Öğrenci Numarası" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="advisor" id="advisor" class="form-control input-sm" placeholder="Danışman" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control input-sm" placeholder="E-Mail" required>
                              </div>
                            </div>
                          </div>
        			    		<input type="submit" value="Kaydet" class="btn btn-info btn-block" class="btn btn-info btn-block">
                    </form>
        	    		</div>
            		</div>
            	 </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addcommunity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel2">Topluluk Ekle</h4>
        </div>
        <div class="modal-body">
            <div class="container">
              <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-6 center ">
                	<div class="panel panel-default">
                  	<div class="panel-body" id="addcomcontents">
                      <form  action="Javascript:AddCommunity();" role="form" method="post" role="form" style="display: block;">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="clubname" id="clubname2" class="form-control input-sm" placeholder="Topluluk Adı" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="fname" id="fname2" class="form-control input-sm" placeholder="Başkan Adı" required>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="lname" id="lname2" class="form-control input-sm" placeholder="Başkan Soyadı" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="mobile" id="mobile2" class="form-control input-sm" placeholder="Başkan Telefonu" required>
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <input type="text" name="number" id="number2" class="form-control input-sm" placeholder="Başkan Öğrenci Numarası" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="advisor" id="advisor2" class="form-control input-sm" placeholder="Danışman" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <input type="text" name="email" id="email2" class="form-control input-sm" placeholder="E-Mail" required>
                              </div>
                            </div>
                          </div>
        			    		<input type="submit" value="Kaydet" class="btn btn-info btn-block" class="btn btn-info btn-block">
                    </form>
        	    		</div>
            		</div>
            	 </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editclubs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Düzenle</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-6 center ">
              <div class="panel panel-default">
                <div class="panel-body" id="editclubcontent">
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Etkinlik ekle</h4>
        </div>
        <div class="modal-body" >
          <div class="container"  >
            <div class="row centered-form">
              <div class="col-xs-12 col-sm-8 col-md-6 center ">
                <div class="panel panel-default">
                  <div class="panel-body" id="addeventcontent">
                    <form  action="Javascript:AddEvent();" role="form" method="post" style="display: block;" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <input type="text" name="eventname" id="eventname" class="form-control input-sm" placeholder="Etkinlik Adı" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <textarea  name="description" id="description" rows="5"  placeholder="Açıklama" class="form-control" required></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <input type="date"  name="date" id="date" class="form-control input-sm" placeholder="Tarih" required>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <input type="text" name="hour" id="hour" class="form-control input-sm" placeholder="Saat" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                              <input type="text" name="location" id="location" class="form-control input-sm" placeholder="Yer" required>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group ">
                              <?php
                              if ($_SESSION['admin']) {?>
                              <select name="owner" id="owner" class="form-control input-sm" required>
                                <option></option><?php
                                  $sql = "SELECT * FROM `community` ";
                                  $result = mysqli_query($con, $sql);
                                  if (true) {
                                      while($inf = mysqli_fetch_assoc($result)) {
                                         ?><option><?php echo $inf["name"] ?></option> <?php
                                      }

                                  }
                                  $sql = "SELECT * FROM `club` ";
                                  $result = mysqli_query($con, $sql);
                                  if (true) {
                                      while($inf = mysqli_fetch_assoc($result)) {
                                         ?><option><?php echo $inf["name"] ?></option> <?php
                                      }
                                  }
                                  ?></select><?php
                              }
                              else if ($_SESSION['president']) {
                              ?>      <input type="text" name="owner" id="owner" class="form-control input-sm" placeholder="owner"  value="<?=$_SESSION['presidentOf'];?>" required disabled>
                              <?php
                              }
                              else {
                                echo "yetkiniz yok";
                              } ?>
                            </div>
                          </div>
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block">
                    </form>
                  </div>
                </div>
              </div>
             </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="editevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Düzenle</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-6 center ">
              <div class="panel panel-default">
                <div class="panel-body" id="editeventcontent">
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Etkinlik Detayları</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-6 center ">
              <div class="panel panel-default">
                <div class="panel-body" id="detailscontent">
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="clubdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detay</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-6 center ">
              <div class="panel panel-default">
                <div class="panel-body" id="clubdetailscontent">
                </div>
              </div>
            </div>
           </div>
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
          <h4 class="modal-title" id="myModalLabel">Mail Gönder</h4>
        </div>
          <div class="modal-body">
            <div class="container">
              <div class="row centered-form">
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
</div>

<div class="modal fade" id="uploadform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Resim Yükle</h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-6 center ">
              <div class="panel panel-default">
                <div class="panel-body" id="uploadformcontent">
                </div>
              </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
