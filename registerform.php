<?php
include("include/main/firstlines.php");

if(!$_SESSION['login'] || $_SESSION['admin']) {
    ?><script>alert("yetkiniz yok.."); window.top.location = '../../index.php';</script> <?php  exit;
}
      include("include/navbar.php");



include("include/main/lastlines.php");
?>
<div class="col-xs-6 col-sm-6 col-md-6" style="margin-left:28%;">

  					<form  method="post" action="include/register.php">
  						<div class="form-group">
  							<label for="name" class="cols-sm-2 control-label">İsim</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="name" id="name" value="<?=$_SESSION['fname']?>" required>
  								</div>
  							</div>
  						</div>

              <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Soyisim</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="surname" id="surname" value="<?=$_SESSION['lname']?>" required>
                  </div>
                </div>
              </div>

  						<div class="form-group">
  							<label for="email" class="cols-sm-2 control-label">E-mail</label>
  							<div class="cols-sm-10">
  								<div class="input-group">
  									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
  									<input type="text" class="form-control" name="email" id="email"  value="<?=$_SESSION['email']?>" required>
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
  						<div class="form-group ">
                <input type="submit" value="Gönder" class="btn btn-primary btn-lg btn-block login-button">
  						</div>
  					</form>
</div>
